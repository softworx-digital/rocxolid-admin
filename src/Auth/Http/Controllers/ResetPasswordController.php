<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
// rocXolid admin auth controllers
use Softworx\RocXolid\Admin\Auth\Http\Controllers\AbstractAuthController;
// rocXolid utils
use Softworx\RocXolid\Helpers\View as ViewHelper;
use Softworx\RocXolid\Http\Requests\CrudRequest;
// rocXolid forms
use Softworx\RocXolid\Forms\AbstractCrudForm as AbstractCrudForm;
// rocXolid components
use Softworx\RocXolid\Components\General\Message;
// rocXolid admin components
use Softworx\RocXolid\Admin\Components\Dashboard\ResetPassword as ResetPasswordDashboard;
// rocXolid user management model forms
use Softworx\RocXolid\UserManagement\Models\Forms\User\ResetPassword as ResetPasswordForm;

/**
 * Guest controller to handle password reset request.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid
 * @version 1.0.0
 */
class ResetPasswordController extends AbstractAuthController
{
    use ResetsPasswords;

    /**
     * Dashboard type definition.
     *
     * @var \Softworx\RocXolid\Admin\Components\Dashboard\ResetPasswordDashboard
     */
    protected static $dashboard_type = ResetPasswordDashboard::class;

    /**
     * Form type mapping.
     *
     * @var array
     */
    protected static $form_type = [
        'reset-password' => ResetPasswordForm::class,
    ];

    /**
     * {@inheritDoc}
     */
    protected $translation_param = 'reset-password';

    /**
     * Show reset password form.
     *
     * @param \Softworx\RocXolid\Http\Requests\CrudRequest $request
     * @param string $token
     */
    public function index(CrudRequest $request, string $token = null)
    {
        $form = $this->getForm(
            $request,
            $this->getRepository()->getModel(),
            $this->getFormParam()
        );

        $form->getFormField('token')->setValue($token);

        $form_component = $this->getFormComponent($form);

        return $this
            ->getDashboard()
            ->setFormComponent($form_component)
            ->render();
    }

    /**
     * Handle reset password form submit.
     *
     * @param \Softworx\RocXolid\Http\Requests\CrudRequest $request
     */
    public function passwordReset(CrudRequest $request)
    {
        $form = $this->getForm(
            $request,
            $this->getRepository()->getModel(),
            $this->getFormParam()
        )->submit();

        if ($form->isValid()) {
            return $this->reset($request);
        } else {
            return $this->errorResponse($request, $form, $this->getFormComponent($form));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function invalid(Request $request)
    {
        abort(404);
    }

    /**
     * {@inheritdoc}
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return $this->response
            ->notifySuccess(Message::build($this, $this)->translate('text.reset-password-success'))
            ->redirect($this->redirectPath())
            ->get();
    }

    /**
     * {@inheritdoc}
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        $form = $this->getForm(
            $request,
            $this->getRepository()->getModel(),
            $this->getFormParam()
        );

        return $this->response
            ->replace(ViewHelper::domId($form, 'form'), Message::build($this, $this)->fetch('error', [ 'message' => $response ]))
            ->get();
    }

    /**
     * {@inheritdoc}
     */
    public function redirectPath()
    {
        return route('rocXolid.auth.login');
    }

    /**
     * {@inheritdoc}
     */
    protected function credentials(Request $request)
    {
        return [
            'email' => $request->input('_data.email'),
            'password' => $request->input('_data.password'),
            'password_confirmation' => $request->input('_data.password_confirmation'),
            'token' => $request->input('_data.token'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function setUserPassword($user, $password)
    {
        $user->password = $password;
    }

    /**
     * {@inheritdoc}
     */
    protected function rules()
    {
        return []; // already validated
    }
}
