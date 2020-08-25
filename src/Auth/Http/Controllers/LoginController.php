<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\View\View as IlluminateView;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// rocXolid contracts
use Softworx\RocXolid\Http\Controllers\Contracts\Dashboardable;
// rocXolid controllers
use Softworx\RocXolid\Http\Controllers\AbstractController;
// rocXolid traits
use Softworx\RocXolid\Http\Controllers\Traits\Dashboardable as DashboardableTrait;
// rocXolid admin components
use Softworx\RocXolid\Admin\Components\Dashboard\Login as LoginDashboard;
// rocXolid admin auth services
use Softworx\RocXolid\Admin\Auth\Services\UserActivityService;
// rocXolid admin auth data holders
use Softworx\RocXolid\Admin\Auth\DataHolders\LogoutUserActivity;

/**
 * Controller for login actions.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class LoginController extends AbstractController implements Dashboardable
{
    use DashboardableTrait;
    use ValidatesRequests;
    use AuthenticatesUsers {
        login as parentLogin;
        logout as parentlogout;
        sendLoginResponse as parentSendLoginResponse;
    }

    protected static $dashboard_type = LoginDashboard::class;

    protected $translation_param = 'login';

    /**
     * @var \Softworx\RocXolid\Admin\Auth\Services\UserActivityService
     */
    private $user_activity_service;

    /**
     * Create a new middleware instance.
     *
     * @param \Illuminate\Contracts\Auth\Factory $auth
     * @return void
     */
    public function __construct(UserActivityService $user_activity_service)
    {
        $this->user_activity_service = $user_activity_service;
    }

    /**
     * Base action.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'modalClose' => [ '#login-modal' ],
                'modal' => view('rocXolid::auth.login-modal', [
                    'component' => $this->getDashboard()
                ])->render()
            ]);
        }

        return $this->getDashboard()->render();
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request): Response
    {
        try {
            return $this->parentLogin($request);
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'modalClose' => [ '#login-modal' ],
                    'modal' => [ view('rocXolid::auth.login-modal', [
                            'request' => $request,
                            'errors' => $e->validator->getMessageBag(),
                            'component' => $this->getDashboard()
                        ])->render()
                    ]
                ]);
            } else {
                throw ValidationException::withMessages([
                    $this->username() => $this->getDashboard()->translate('auth.invalid'),
                ]);
            }
        }
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function sendLoginResponse(Request $request): Response
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($request->ajax()) {
            return response()->json([
                'modalClose' => [ '#login-modal' ],
                'reload' => true,
            ]);
        }

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function logout(Request $request): Response
    {
        $user = $this->guard()->user();

        $this->guard()->logout();

        $request->session()->invalidate();

        $this->user_activity_service->logUserActivity($request, $user, LogoutUserActivity::class);

        return redirect()->route('rocXolid.auth.login');
    }

    /**
     * Ping authenticated user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ping(Request $request): Response
    {
        app('debugbar')->disable();

        return response()->json([ 'ping' => (time() + config('rocXolid.admin.auth.ping_timeout', 0)) ]);
    }

    /**
     * Get route where to redirect logged in user.
     *
     * @return string
     */
    public function redirectPath(): string
    {
        return route(config('rocXolid.admin.auth.login_redirect', 'rocXolid.admin.index'));
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard(): StatefulGuard
    {
        return auth('rocXolid');
    }
}
