<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
// rocXolid admin auth controllers
use Softworx\RocXolid\Admin\Auth\Http\Controllers\AbstractAuthController;
// rocXolid utils
use Softworx\RocXolid\Helpers\View as ViewHelper;
// rocXolid components
use Softworx\RocXolid\Components\General\Message;
use Softworx\RocXolid\Components\Forms\CrudForm as CrudFormComponent;
// rocXolid admin components
use Softworx\RocXolid\Admin\Components\Dashboard\ResetPassword as ResetPasswordDashboard;

/**
 * The controller is responsible for handling password reset requests.
 */
class ResetPasswordController extends AbstractAuthController
{
    use ResetsPasswords;

    protected static $dashboard_class = ResetPasswordDashboard::class;

    protected $translation_param = 'reset-password';

    public function index(Request $request, string $token = null)
    {
        $repository = $this->getRepository();

        $this->setModel($repository->getModel());

        $form = $repository->getForm('reset-password');
        $form->getFormField('token')->setValue($token);

        $form_component = CrudFormComponent::build($this, $this)
            ->setForm($form)
            ->setRepository($repository);

        return $this
            ->getDashboard()
            ->setFormComponent($form_component)
            ->render();
    }

    public function passwordReset(Request $request)
    {
        $repository = $this->getRepository();

        $this->setModel($repository->getModel());

        $form = $repository->getForm('reset-password');
        $form->submit();

        if ($form->isValid()) {
            return $this->reset($request);
        } else {
            return $this->errorResponse($request, $repository, $form, 'passwordReset');
        }
    }

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
        $form = $this->getRepository()->getForm('reset-password');

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
