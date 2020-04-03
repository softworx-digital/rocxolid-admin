<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Controllers;

use Validator;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
// rocXolid utils
use Softworx\RocXolid\Http\Requests\CrudRequest;
use Softworx\RocXolid\Http\Responses\Contracts\AjaxResponse;
// rocXolid contracts
use Softworx\RocXolid\Contracts\Modellable;
use Softworx\RocXolid\Contracts\Repositoryable;
// rocXolid repository contracts
use Softworx\RocXolid\Repositories\Contracts\Repository;
// rocXolid http contracts
use Softworx\RocXolid\Http\Controllers\Contracts\Dashboardable;
// rocXolid form contracts
use Softworx\RocXolid\Forms\Contracts\FormField;
// rocXolid forms
use Softworx\RocXolid\Forms\AbstractCrudForm as AbstractCrudForm;
// rocXolid controllers
use Softworx\RocXolid\Http\Controllers\AbstractController;
// rocXolid traits
use Softworx\RocXolid\Traits\Modellable as ModellableTrait;
use Softworx\RocXolid\Traits\Repositoryable as RepositoryableTrait;
// rocXolid controller traits
use Softworx\RocXolid\Http\Controllers\Traits\Dashboardable as DashboardableTrait;
// rocXolid components
use Softworx\RocXolid\Components\Forms\CrudForm as CrudFormComponent;
// rocXolid admin components
use Softworx\RocXolid\Admin\Components\Dashboard\Registration as RegistrationDashboard;
// rocXolid user management models
use Softworx\RocXolid\UserManagement\Models\User;
use Softworx\RocXolid\UserManagement\Models\UserProfile;
// rocXolid admin events
use Softworx\RocXolid\Admin\Auth\Events\UserRegistered;

/**
 *
 */
class RegistrationController extends AbstractController implements Dashboardable, Repositoryable, Modellable
{
    use DashboardableTrait;
    use RepositoryableTrait;
    use ModellableTrait;
    use RegistersUsers;

    protected static $dashboard_class = RegistrationDashboard::class;

    protected static $model_type = User::class;

    protected $translation_package = 'rocXolid:admin';

    protected $translation_param = 'registration';

    public function __construct(AjaxResponse $response, Repository $repository)
    {
        $this->middleware('guest');

        $this
            ->setResponse($response)
            ->setRepository($repository->init(static::getModelType()))
            ->bindServices()
            ->init();
    }

    public function index(CrudRequest $request)
    {
        $repository = $this->getRepository();

        $this->setModel($repository->getModel());

        $form = $repository->getForm('registration');
        $form
            ->adjustCreate($request);

        $form_component = CrudFormComponent::build($this, $this)
            ->setForm($form)
            ->setRepository($repository);

        return $this
            ->getDashboard()
            ->setFormComponent($form_component)
            ->render();
    }

    public function register(CrudRequest $request)
    {
        $repository = $this->getRepository();

        $this->setModel($repository->getModel());

        $form = $repository->getForm('registration');
        $form
            ->adjustCreateBeforeSubmit($request)
            ->submit();

        if ($form->isValid()) {
            return $this->successResponse($request, $repository, $form, 'create');
        } else {
            return $this->errorResponse($request, $repository, $form, 'create');
        }
    }

    protected function successResponse(CrudRequest $request, Repository $repository, AbstractCrudForm $form, string $action)
    {
        $user = $this->create($request->get(FormField::SINGLE_DATA_PARAM));

        event(new UserRegistered($user));

        $this->guard()->login($user);

        return $this->response->redirect($this->redirectPath())->get();
    }

    public function redirectPath()
    {
        return route(config('rocXolid.admin.auth.registration_redirect', 'rocXolid.admin.index'));
    }

    public function getModelType(): string
    {
        return static::$model_type;
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => '',
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        $user_profile = UserProfile::create([
            'user_id' => $user->getKey(),
            'language_id' => $data['language_id'],
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'birthdate' => \Carbon\Carbon::parse($data['birthdate'])->format('Y-m-d'), // @todo: "hotfixed"
        ]);

        $user->fill([
            'name' => $user_profile->getTitle(),
        ])->save();

        return $user;
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
