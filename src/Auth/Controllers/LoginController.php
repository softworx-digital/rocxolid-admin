<?php

namespace Softworx\RocXolid\Admin\Auth\Controllers;

use Auth;
use View;
use Carbon\Carbon;
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
// rocXolid components
use Softworx\RocXolid\Admin\Components\Dashboard\Login as LoginDashboard;

/**
 * Controller for login actions.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class LoginController extends AbstractController implements Dashboardable
{
    protected static $dashboard_class = LoginDashboard::class;

    protected static $translation_param = 'login';

    use DashboardableTrait;
    use ValidatesRequests;
    use AuthenticatesUsers {
        login as parentLogin;
        logout as parentlogout;
        sendLoginResponse as parentSendLoginResponse;
    }

    /**
     * Base action.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): IlluminateView
    {
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
            if ($request->has('modal')) {
                return response()->json([
                    'modalClose' => [ '#login-modal' ],
                    'modal' => [ View::make('rocXolid:admin::auth.login-modal', [
                            'request' => $request,
                            'error' => true,
                        ])->render()
                    ]
                ]);
            } else {
                throw ValidationException::withMessages([
                    $this->username() => $this->getDashboard()->translate('auth.invalid', false),
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

        if ($request->has('modal')) {
            return response()->json(['modalClose' => [ '#login-modal' ]]);
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

        /*
        $user->logged_out = Carbon::now()->toDateTimeString();
        $user->save();
        */

        $this->guard()->logout();

        $request->session()->invalidate();

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
        return response()->json(['ping' => time()]);
    }

    /**
     * Get route where to redirect logged in user.
     * 
     * @return string
     */
    public function redirectPath(): string
    {
        return route('rocXolid.admin.index');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard(): StatefulGuard
    {
        return Auth::guard('rocXolid');
    }
}
