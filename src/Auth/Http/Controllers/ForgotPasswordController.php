<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
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
use Softworx\RocXolid\Admin\Components\Dashboard\ForgotPassword as ForgotPasswordDashboard;
// rocXolid user management model forms
use Softworx\RocXolid\UserManagement\Models\Forms\User\ForgotPassword as ForgotPasswordForm;

/**
 * Guest controller to handle password retrieval request.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
class ForgotPasswordController extends AbstractAuthController
{
    use SendsPasswordResetEmails;

    /**
     * Dashboard type definition.
     *
     * @var \Softworx\RocXolid\Admin\Components\Dashboard\ForgotPassword
     */
    protected static $dashboard_type = ForgotPasswordDashboard::class;

    /**
     * Form type mapping.
     *
     * @var array
     */
    protected static $form_type = [
        'forgot-password' => ForgotPasswordForm::class,
    ];

    /**
     * {@inheritDoc}
     */
    protected $translation_param = 'forgot-password';

    /**
     * Handle forgot password form submit.
     *
     * @param \Softworx\RocXolid\Http\Requests\CrudRequest $request
     */
    public function forgotPassword(CrudRequest $request)
    {
        $form = $this->getForm(
            $request,
            $this->getRepository()->getModel(),
            $this->getFormParam()
        )->submit();

        if ($form->isValid()) {
            return $this->sendResetLinkEmail($request);
        } else {
            return $this->errorResponse($request, $form, $this->getFormComponent($form));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function broker()
    {
        return Password::broker('rocXolid');
    }

    /**
     * {@inheritdoc}
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        $form = $this->getForm(
            $request,
            $this->getRepository()->getModel(),
            $this->getFormParam()
        );

        return $this->response
            ->replace(ViewHelper::domId($form, 'form'), Message::build($this, $this)->fetch('success', [ 'message' => $response ]))
            ->get();
    }

    /**
     * {@inheritdoc}
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
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
