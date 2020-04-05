<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
// rocXolid admin auth controllers
use Softworx\RocXolid\Admin\Auth\Http\Controllers\AbstractAuthController;
// rocXolid utils
use Softworx\RocXolid\Helpers\View as ViewHelper;
// rocXolid components
use Softworx\RocXolid\Components\General\Message;
use Softworx\RocXolid\Components\Forms\CrudForm as CrudFormComponent;
// rocXolid admin components
use Softworx\RocXolid\Admin\Components\Dashboard\ForgotPassword as ForgotPasswordDashboard;

/**
 *
 */
class ForgotPasswordController extends AbstractAuthController
{
    use SendsPasswordResetEmails;

    protected static $dashboard_class = ForgotPasswordDashboard::class;

    protected $translation_param = 'forgot-password';

    public function index(Request $request)
    {
        $repository = $this->getRepository();

        $this->setModel($repository->getModel());

        $form = $repository->getForm('forgot-password');

        $form_component = CrudFormComponent::build($this, $this)
            ->setForm($form)
            ->setRepository($repository);

        return $this
            ->getDashboard()
            ->setFormComponent($form_component)
            ->render();
    }

    public function forgotPassword(Request $request)
    {
        $repository = $this->getRepository();

        $this->setModel($repository->getModel());

        $form = $repository->getForm('forgot-password');
        $form->submit();

        if ($form->isValid()) {
            return $this->sendResetLinkEmail($request);
        } else {
            return $this->errorResponse($request, $repository, $form, 'forgotPassword');
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        $form = $this->getRepository()->getForm('forgot-password');

        return $this->response
            ->replace(ViewHelper::domId($form, 'form'), Message::build($this, $this)->fetch('success', [ 'message' => $response ]))
            ->get();
    }

    /**
     * {@inheritdoc}
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        $form = $this->getRepository()->getForm('forgot-password');

        return $this->response
            ->replace(ViewHelper::domId($form, 'form'), Message::build($this, $this)->fetch('error', [ 'message' => $response ]))
            ->get();
    }

    /**
     * {@inheritdoc}
     */
    protected function validateEmail(Request $request)
    {
        // nothing, email already validated
    }

    /**
     * {@inheritdoc}
     */
    protected function credentials(Request $request)
    {
        return [
            'email' => $request->input('_data.email')
        ];
    }
}
