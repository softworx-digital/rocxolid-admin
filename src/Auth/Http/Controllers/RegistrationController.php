<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
// rocXolid utils
use Softworx\RocXolid\Http\Requests\CrudRequest;
// rocXolid admin auth controllers
use Softworx\RocXolid\Admin\Auth\Http\Controllers\AbstractAuthController;
// rocXolid forms
use Softworx\RocXolid\Forms\AbstractCrudForm as AbstractCrudForm;
// rocXolid admin components
use Softworx\RocXolid\Admin\Components\Dashboard\Registration as RegistrationDashboard;
// rocXolid user management model forms
use Softworx\RocXolid\UserManagement\Models\Forms\User\Registration as RegistrationForm;
// rocXolid auth services
use Softworx\RocXolid\Admin\Auth\Services\UserAuthService;

/**
 * Guest controller to handle platform user registration.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid
 * @version 1.0.0
 */
class RegistrationController extends AbstractAuthController
{
    use RegistersUsers;

    /**
     * Dashboard type definition.
     *
     * @var \Softworx\RocXolid\Admin\Components\Dashboard\Registration
     */
    protected static $dashboard_class = RegistrationDashboard::class;

    /**
     * Form type mapping.
     *
     * @var array
     */
    protected static $form_type = [
        'registration' => RegistrationForm::class,
    ];

    /**
     * Extra services used by this controller.
     *
     * @var array
     */
    protected $extra_services = [
        UserAuthService::class,
    ];

    /**
     * {@inheritDoc}
     */
    protected $translation_param = 'registration';

    /**
     * Handle registration form submit.
     *
     * @param \Softworx\RocXolid\Http\Requests\CrudRequest $request
     */
    public function register(CrudRequest $request)
    {
        $form = $this->getForm(
            $request,
            $this->getRepository()->getModel(),
            $this->getFormParam()
        )->submit();

        if ($form->isValid()) {
            return $this->onRegistration($request, $form);
        } else {
            return $this->errorResponse($request, $form, $this->getFormComponent($form));
        }
    }

    /**
     * Handle valid registration request.
     *
     * @param \Softworx\RocXolid\Http\Requests\CrudRequest $request
     */
    protected function onRegistration(CrudRequest $request, AbstractCrudForm $form)
    {
        $user = $this->userAuthService()->registerUser($request);

        $this->guard()->login($user);

        return $this->response->redirect($this->redirectPath())->get();
    }

    /**
     * Path to redirect user after successful registration
     *
     * @return string
     */
    public function redirectPath(): string
    {
        return route(config('rocXolid.admin.auth.registration_redirect', 'rocXolid.admin.index'));
    }
}
