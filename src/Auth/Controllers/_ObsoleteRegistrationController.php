<?php

namespace Softworx\RocXolid\Admin\Auth\Controllers;

use App;
use Validator;
use Mail;
//use App\User;
//use App\Model\Email;
//use App\Http\Middleware\Admin\Role as RoleMiddleware;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
// rocXolid utils
use Softworx\RocXolid\Http\Requests\CrudRequest;
// rocXolid contracts
use Softworx\RocXolid\Contracts\Modellable;
use Softworx\RocXolid\Repositories\Contracts\Repositoryable;
use Softworx\RocXolid\Http\Controllers\Contracts\Dashboardable;
use Softworx\RocXolid\Models\Contracts\Crudable as CrudableModel;
// rocXolid controllers
use Softworx\RocXolid\Http\Controllers\AbstractController;
// rocXolid traits
use Softworx\RocXolid\Traits\Modellable as ModellableTrait;
use Softworx\RocXolid\Repositories\Traits\Repositoryable as RepositoryableTrait;
use Softworx\RocXolid\Http\Controllers\Traits\Dashboardable as DashboardableTrait;
use Softworx\RocXolid\Http\Controllers\Traits\RepositoryAutocompleteable as RepositoryAutocompleteableTrait;
// rocXolid components
use Softworx\RocXolid\Admin\Components\Dashboard\Registration as RegistrationDashboard;
use Softworx\RocXolid\Components\Forms\CrudForm as CrudFormComponent;
// common repositories
use Softworx\RocXolid\Common\Repositories\Address\Repository as AddressRepository;
// common models
use Softworx\RocXolid\Common\Models\Address;
// user management repositories
use Softworx\RocXolid\UserManagement\Repositories\User\Repository as UserRepository;
// user management models
use Softworx\RocXolid\UserManagement\Models\User;

class RegistrationController extends AbstractController implements Dashboardable, Repositoryable, Modellable
{
    use DashboardableTrait;
    use RepositoryableTrait;
    use ModellableTrait;
    use RegistersUsers;
    use RepositoryAutocompleteableTrait;

    protected static $dashboard_class = RegistrationDashboard::class;

    protected static $model_class = User::class;

    protected static $repository_param_class = [
        'address' => AddressRepository::class,
    ];

    protected static $repository_class = UserRepository::class;

    protected $translation_package = 'rocXolid:admin';

    protected $translation_param = 'registration';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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

    /**
     * Reload Create/Update form to dynamically load related field values.
     */
    public function formReload(CrudRequest $request)
    {
        $repository = $this->getRepository();

        $this->setModel($repository->getModel());

        $form = $repository->getForm('registration');
        $form
            ->adjustCreate($request);

        $form = $repository
            ->getForm($this->getFormParam($request, 'registration'))
                ->setFieldsRequestInput($request->input())
                ->adjustCreateBeforeSubmit($request);

        $form_component = CrudFormComponent::build($this, $this)
                ->setForm($form)
                ->setRepository($repository);

        return $this->response
                ->replace($form_component->getDomId('fieldset'), $form_component->fetch('include.fieldset'))
                ->get();
    }

    public function register()
    {
dd(__METHOD__);
        return route('frontpage.user.dashboard');
    }

    public function redirectPath()
    {
        return route('frontpage.user.dashboard');
    }

    public function getModelClass(): string
    {
        return static::$model_class;
    }

    // @todo: ASAP really hotfixed, fix appropriately
    public function getRepositoryAutocompleteModel($repository, CrudRequest $request, $id = null)//: Model
    {
        if ($request->has('f') && ($request->get('f') === 'city_id')) {
            return App::make(Address::class);
        }

        return parent::getRepositoryAutocompleteModel($repository, $request, $id);
    }

    protected function getRepositoryParam(CrudRequest $request, $default = Repositoryable::REPOSITORY_PARAM)
    {
        if ($request->has('f') && ($request->get('f') === 'city_id')) {
            return 'address';
        }

        return 'registration';
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone_number' => '',
            'street_address' => '',
            'postal_code' => '',
            'city' => '',
            'activation_code' => '',
        ]);

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
}
