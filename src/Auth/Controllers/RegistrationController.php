<?php

namespace Softworx\RocXolid\Admin\Auth\Controllers;

use Validator;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
// rocXolid utils
use Softworx\RocXolid\Http\Requests\CrudRequest;
// rocXolid contracts
use Softworx\RocXolid\Contracts\Modellable;
use Softworx\RocXolid\Repositories\Contracts\Repositoryable;
use Softworx\RocXolid\Http\Controllers\Contracts\Dashboardable;
use Softworx\RocXolid\Models\Contracts\Crudable as CrudableModel;
use Softworx\RocXolid\Repositories\Contracts\Repository;
use Softworx\RocXolid\Communication\Contracts\AjaxResponse;
use Softworx\RocXolid\Forms\Contracts\FormField;
// rocXolid forms
use Softworx\RocXolid\Forms\AbstractCrudForm as AbstractCrudForm;
// rocXolid controllers
use Softworx\RocXolid\Http\Controllers\AbstractController;
// rocXolid traits
use Softworx\RocXolid\Traits\Modellable as ModellableTrait;
use Softworx\RocXolid\Repositories\Traits\Repositoryable as RepositoryableTrait;
use Softworx\RocXolid\Http\Controllers\Traits\Dashboardable as DashboardableTrait;
// rocXolid components
use Softworx\RocXolid\Admin\Components\Dashboard\Registration as RegistrationDashboard;
use Softworx\RocXolid\Components\Forms\CrudForm as CrudFormComponent;
// user management repositories
use Softworx\RocXolid\UserManagement\Repositories\User\Repository as UserRepository;
// user management models
use Softworx\RocXolid\UserManagement\Models\User;
use Softworx\RocXolid\UserManagement\Models\UserProfile;

class RegistrationController extends AbstractController implements Dashboardable, Repositoryable, Modellable
{
    use DashboardableTrait;
    use RepositoryableTrait;
    use ModellableTrait;
    use RegistersUsers;

    protected static $dashboard_class = RegistrationDashboard::class;

    protected static $model_class = User::class;

    protected static $repository_class = UserRepository::class;

    protected $translation_package = 'rocXolid:admin';

    protected $translation_param = 'registration';

    public function __construct(AjaxResponse $response)
    {
        $this->middleware('guest');

        $this->response = $response;
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
            return $this->success($request, $repository, $form, 'create');
        } else {
            return $this->errorResponse($request, $repository, $form, 'create');
        }
    }

    protected function success(CrudRequest $request, Repository $repository, AbstractCrudForm $form, $action)
    {
        $user = $this->create($request->get(FormField::SINGLE_DATA_PARAM));
        // $this->registered($request, $user);
        // event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->response->redirect($this->redirectPath())->get();
    }

    public function redirectPath()
    {
        return route(config('rocXolid.admin.auth.registration_redirect', 'rocXolid.admin.index'));
    }

    public function getModelClass(): string
    {
        return static::$model_class;
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => '',
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        $user_profile = UserProfile::create([
            'user_id' => $user->id,
            'language_id' => $data['language_id'],
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'birthdate' => \Carbon\Carbon::parse($data['birthdate'])->format('Y-m-d'),
        ]);

        $user->fill([
            'name' => $user_profile->getTitle(),
        ])->save();

        return $user;
    }

    protected function registered(Request $request, User $user)
    {
        $user->syncRoles([ RoleMiddleware::USER ]);

        $email = Email::findOrFail(Email::WELCOME);

        $data = [
            'body' => $email->parseBody([
                '[first-name]' => $user->first_name,
                '[email]' => $user->email,
                '[password]' => $request->input('password'),
            ]),
        ];

        Mail::send('notifications.email-custom', $data, function ($message) use ($email, $user, $data) {
            $message->from($email->sender);
            $message->subject($email->subject);
            $message->to($user->email);
        });
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
