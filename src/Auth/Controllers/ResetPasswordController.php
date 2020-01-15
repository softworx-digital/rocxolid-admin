<?php

namespace Softworx\RocXolid\Admin\Auth\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;
// rocXolid utils
use Softworx\RocXolid\Http\Requests\CrudRequest;
use Softworx\RocXolid\Helpers\View as ViewHelper;
// rocXolid contracts
use Softworx\RocXolid\Contracts\Modellable;
// rocXolid repository contracts
use Softworx\RocXolid\Repositories\Contracts\Repository;
// rocXolid http contracts
use Softworx\RocXolid\Http\Responses\Contracts\AjaxResponse;
use Softworx\RocXolid\Http\Controllers\Contracts\Dashboardable;
use Softworx\RocXolid\Http\Controllers\Contracts\Repositoryable;
// rocXolid forms
use Softworx\RocXolid\Forms\AbstractCrudForm as AbstractCrudForm;
// rocXolid controllers
use Softworx\RocXolid\Http\Controllers\AbstractController;
// rocXolid traits
use Softworx\RocXolid\Traits\Modellable as ModellableTrait;
// rocXolid controller traits
use Softworx\RocXolid\Http\Controllers\Traits\Dashboardable as DashboardableTrait;
use Softworx\RocXolid\Http\Controllers\Traits\Repositoryable as RepositoryableTrait;
// rocXolid components
use Softworx\RocXolid\Components\General\Message;
use Softworx\RocXolid\Components\Forms\CrudForm as CrudFormComponent;
// rocXolid admin components
use Softworx\RocXolid\Admin\Components\Dashboard\ResetPassword as ResetPasswordDashboard;
// rocXolid user management repositories
use Softworx\RocXolid\UserManagement\Repositories\User\Repository as UserRepository;
// rocXolid user management models
use Softworx\RocXolid\UserManagement\Models\User;

/**
 * The controller is responsible for handling password reset requests.
 */
class ResetPasswordController extends AbstractController implements Dashboardable, Repositoryable, Modellable
{
    use DashboardableTrait;
    use RepositoryableTrait;
    use ModellableTrait;
    use ResetsPasswords;

    protected static $dashboard_class = ResetPasswordDashboard::class;

    protected static $model_class = User::class;

    protected static $repository_class = UserRepository::class;

    protected $translation_package = 'rocXolid:admin';

    protected $translation_param = 'reset-password';

    public function __construct(AjaxResponse $response)
    {
        $this->middleware('guest');

        $this->response = $response;
    }

    public function index(CrudRequest $request, string $token = null)
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

    public function passwordReset(CrudRequest $request)
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

    public function invalid(CrudRequest $request)
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
    protected function rules()
    {
        return []; // already validated
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
