<?php

namespace Softworx\RocXolid\Admin\Components\Dashboard;

use Illuminate\Support\Collection;
// rocXolid component contracts
use Softworx\RocXolid\Components\Contracts\Tableable;
use Softworx\RocXolid\Components\Contracts\Componentable\Alert as AlertComponentable;
use Softworx\RocXolid\Components\Contracts\Componentable\Table as TableComponentable;
use Softworx\RocXolid\Components\Contracts\Componentable\ModelViewer as ModelViewerComponentable;
// rocXolid components
use Softworx\RocXolid\Components\General\Alert;
use Softworx\RocXolid\Components\ModelViewers\CrudModelViewer;
// rocXolid admin components
use Softworx\RocXolid\Admin\Components\AbstractActiveComponent;

/**
 * General dashboard component for CRUDable resources.
 *
 * @author softworx <hello@softworx.digital>
 * @package Softworx\RocXolid
 * @version 1.0.0
 */
class Crud extends AbstractActiveComponent implements AlertComponentable, TableComponentable, ModelViewerComponentable
{
    /**
     * @var array
     */
    protected $alert_components = [];

    /**
     * @var \Softworx\RocXolid\Components\Contracts\Tableable
     */
    protected $table_component;

    /**
     * @var \Softworx\RocXolid\Components\ModelViewers\CrudModelViewer
     */
    protected $model_viewer_component;

    /**
     * {@inheritDoc}
     */
    public function addAlertComponent(Alert $component): AlertComponentable
    {
        $this->alert_components[] = $component;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAlertComponents(): Collection
    {
        return collect($this->alert_components);
    }

    /**
     * {@inheritDoc}
     */
    public function setTableComponent(Tableable $component): TableComponentable
    {
        $this->table_component = $component;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTableComponent(): Tableable
    {
        if (!isset($this->table_component)) {
            throw new \RuntimeException(sprintf('CRUD table component not yet set to [%s]', get_class($this)));
        }

        return $this->table_component;
    }

    /**
     * {@inheritDoc}
     */
    public function setModelViewerComponent(CrudModelViewer $model_viewer_component): ModelViewerComponentable
    {
        $this->model_viewer_component = $model_viewer_component;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getModelViewerComponent(): CrudModelViewer
    {
        if (!isset($this->model_viewer_component)) {
            throw new \RuntimeException(sprintf('CRUD model_viewer_component not yet set to [%s]', get_class($this)));
        }

        return $this->model_viewer_component;
    }
}
