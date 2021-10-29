<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Controllers;

use Illuminate\Support\Str;
// rocXolid utils
use Softworx\RocXolid\Http\Responses\Contracts\AjaxResponse;
use Softworx\RocXolid\Http\Requests\CrudRequest;
// rocXolid contracts
use Softworx\RocXolid\Contracts\Repositoryable;
use Softworx\RocXolid\Contracts\Modellable;
// rocXolid traits
use Softworx\RocXolid\Traits;
// rocXolid controllers
use Softworx\RocXolid\Http\Controllers\AbstractController;
// rocXolid controller contracts
use Softworx\RocXolid\Http\Controllers\Contracts\Dashboardable;
// rocXolid controller traits
use Softworx\RocXolid\Http\Controllers\Traits as ControllerTraits;
// rocXolid form contracts
use Softworx\RocXolid\Forms\Contracts\Formable;
// rocXolid form services
use Softworx\RocXolid\Forms\Services\Contracts\FormService;
// rocXolid repository contracts
use Softworx\RocXolid\Repositories\Contracts\Repository;
// rocXolid forms
use Softworx\RocXolid\Forms\AbstractCrudForm as AbstractCrudForm;
// rocXolid components
use Softworx\RocXolid\Components\Forms\CrudForm as CrudFormComponent;
// rocXolid user management models
use Softworx\RocXolid\UserManagement\Models\User;

/**
 * Base abstract rocXolid controller for authentication related operations.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid\Admin
 * @version 1.0.0
 */
abstract class AbstractAuthController extends AbstractController implements Dashboardable, Repositoryable, Formable, Modellable
{
    use Traits\Repositoryable;
    use Traits\Modellable;
    use ControllerTraits\Dashboardable;
    use ControllerTraits\Forms\HasForms;
    use ControllerTraits\Components\FormComponentable;

    /**
     * {@inheritDoc}
     */
    protected $default_services = [
        FormService::class,
    ];

    /**
     * Model type to work with.
     *
     * @var string
     */
    protected static $model_type = User::class;

    /**
     * {@inheritDoc}
     */
    protected $translation_package = 'rocXolid-admin';

    /**
     * Constructor.
     *
     * @param \Softworx\RocXolid\Http\Responses\Contracts\AjaxResponse $response
     * @param \Softworx\RocXolid\Repositories\Contracts\Repository $repository
     */
    public function __construct(AjaxResponse $response, Repository $repository)
    {
        $this->middleware('guest');

        $this
            ->setResponse($response)
            ->setRepository($repository->init(static::getModelType()))
            ->bindServices()
            ->init();
    }

    /**
     * Default view.
     *
     * @param \Softworx\RocXolid\Http\Requests\CrudRequest $request
     * @return void
     */
    public function index(CrudRequest $request)
    {
        $form = $this->getForm(
            $request,
            $this->getRepository()->getModel(),
            $this->getFormParam()
        );

        $form_component = $this->getFormComponent($form);

        return $this
            ->getDashboard()
            ->setFormComponent($form_component)
            ->render();
    }

    /**
     * Retrieve model type to work with.
     *
     * @return string
     */
    public function getModelType(): string
    {
        return static::$model_type;
    }

    /**
     * Send error response in case of invalid user input.
     *
     * @param \Softworx\RocXolid\Http\Requests\CrudRequest $request
     * @param \Softworx\RocXolid\Repositories\Contracts\Repository $repository
     * @param \Softworx\RocXolid\Forms\AbstractCrudForm $form
     * @param \Softworx\RocXolid\Components\Forms\CrudForm $form_component
     * @return void
     */
    protected function errorResponse(CrudRequest $request, AbstractCrudForm $form, CrudFormComponent $form_component)
    {
        return $this->response
            ->replace($form_component->getDomId('fieldset'), $form_component->fetch('include.fieldset'))
            ->get();
    }

    /**
     * Return form parameter based on controller name.
     *
     * @return string
     */
    protected function getFormParam(): string
    {
        return Str::kebab(str_replace('Controller', '', (new \ReflectionClass($this))->getShortName()));
    }
}
