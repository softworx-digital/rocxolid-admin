<?php

namespace Softworx\RocXolid\Admin\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
// rocXolid utils
use Softworx\RocXolid\Http\Responses\Contracts\AjaxResponse;
// rocXolid contracts
use Softworx\RocXolid\Contracts\Repositoryable;
use Softworx\RocXolid\Contracts\Modellable;
// rocXolid traits
use Softworx\RocXolid\Traits\Repositoryable as RepositoryableTrait;
use Softworx\RocXolid\Traits\Modellable as ModellableTrait;
// rocXolid controllers
use Softworx\RocXolid\Http\Controllers\AbstractController;
// rocXolid controller contracts
use Softworx\RocXolid\Http\Controllers\Contracts\Dashboardable;
// rocXolid controller traits
use Softworx\RocXolid\Http\Controllers\Traits\Dashboardable as DashboardableTrait;
// rocXolid repository contracts
use Softworx\RocXolid\Repositories\Contracts\Repository;
// rocXolid forms
use Softworx\RocXolid\Forms\AbstractCrudForm as AbstractCrudForm;
// rocXolid components
use Softworx\RocXolid\Components\General\Message;
use Softworx\RocXolid\Components\Forms\CrudForm as CrudFormComponent;
// rocXolid user management models
use Softworx\RocXolid\UserManagement\Models\User;

/**
 * Base abstract rocXolid controller for authentication related operations.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid
 * @version 1.0.0
 */
class AbstractAuthController extends AbstractController implements Dashboardable, Repositoryable, Modellable
{
    use DashboardableTrait;
    use RepositoryableTrait;
    use ModellableTrait;

    /**
     * Model type to work with.
     *
     * @var string
     */
    protected static $model_type = User::class;

    /**
     * {@inheritDoc}
     */
    protected $translation_package = 'rocXolid:admin';

    /**
     * Constructor.
     *
     * @param \Softworx\RocXolid\Http\Responses\Contracts\AjaxResponse $response
     * @param \Softworx\RocXolid\Repositories\Contracts\Repository $repository
     */
    public function __construct(AjaxResponse $response, Repository $repository)
    {
        $this->middleware('guest');

        $this->response = $response;
    }

    /**
     * {@inheritdoc}
     */
    public function broker()
    {
        return Password::broker('rocXolid');
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
     * @param \Illuminate\Http\Request $request
     * @param Repository $repository
     * @param AbstractCrudForm $form
     * @param [type] $action
     * @return void
     */
    protected function errorResponse(Request $request, AbstractCrudForm $form, $action)
    {
        $form_component = CrudFormComponent::build($this, $this)
            ->setForm($form)
            ->setRepository($this->getRepository());

        $assignments = [
            'errors' => $form->getErrors()
        ];

        return $this->response
            ->replace($form_component->getDomId('fieldset'), $form_component->fetch('include.fieldset'))
            ->get();
    }
}
