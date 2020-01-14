<?php

namespace Softworx\RocXolid\Admin\Auth\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
// rocXolid utils
use Softworx\RocXolid\Http\Requests\CrudRequest;
use Softworx\RocXolid\Helpers\View as ViewHelper;
// rocXolid contracts
use Softworx\RocXolid\Contracts\Modellable;
// rocXolid repository contracts
use Softworx\RocXolid\Repositories\Contracts\Repository;
use Softworx\RocXolid\Repositories\Contracts\Repositoryable;
// rocXolid http contracts
use Softworx\RocXolid\Http\Controllers\Contracts\Dashboardable;
use Softworx\RocXolid\Http\Responses\Contracts\AjaxResponse;
// rocXolid forms
use Softworx\RocXolid\Forms\AbstractCrudForm as AbstractCrudForm;
// rocXolid controllers
use Softworx\RocXolid\Http\Controllers\AbstractController;
// rocXolid traits
use Softworx\RocXolid\Traits\Modellable as ModellableTrait;
// rocXolid controller traits
use Softworx\RocXolid\Http\Controllers\Traits\Dashboardable as DashboardableTrait;
// rocXolid repository traits
use Softworx\RocXolid\Repositories\Traits\Repositoryable as RepositoryableTrait;
// rocXolid components
use Softworx\RocXolid\Components\General\Message;
use Softworx\RocXolid\Components\Forms\CrudForm as CrudFormComponent;
// rocXolid admin components
use Softworx\RocXolid\Admin\Components\Dashboard\ForgotPassword as ForgotPasswordDashboard;
// rocXolid user management repositories
use Softworx\RocXolid\UserManagement\Repositories\User\Repository as UserRepository;
// rocXolid user management models
use Softworx\RocXolid\UserManagement\Models\User;

/**
 *
 */
class ForgotPasswordController extends AbstractController implements Dashboardable, Repositoryable, Modellable
{
    use DashboardableTrait;
    use RepositoryableTrait;
    use ModellableTrait;
    use SendsPasswordResetEmails;

    protected static $dashboard_class = ForgotPasswordDashboard::class;

    protected static $model_class = User::class;

    protected static $repository_class = UserRepository::class;

    protected $translation_package = 'rocXolid:admin';

    protected $translation_param = 'forgot-password';

    public function __construct(AjaxResponse $response)
    {
        $this->middleware('guest');

        $this->response = $response;
    }

    public function index(CrudRequest $request)
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

    public function forgotPassword(CrudRequest $request)
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

    /**
     * {@inheritdoc}
     */
    public function broker()
    {
        return Password::broker('rocXolid');
    }

    public function getModelClass(): string
    {
        return static::$model_class;
    }

    protected function errorResponse(CrudRequest $request, Repository $repository, AbstractCrudForm $form, $action)
    {
        $form_component = CrudFormComponent::build($this, $this)
            ->setForm($form)
            ->setRepository($repository);

        $assignments = [
            'errors' => $form->getErrors()
        ];

        return $this->response
            ->replace($form_component->getDomId('fieldset'), $form_component->fetch('include.fieldset'))
            ->get();
    }
}
