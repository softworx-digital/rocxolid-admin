<?php

namespace Softworx\RocXolid\Admin\Components\Dashboard;

use Illuminate\Support\Collection;
// rocXolid component contracts
use Softworx\RocXolid\Components\Contracts\Tableable;
use Softworx\RocXolid\Components\Contracts\Componentable\Alert as AlertComponentable;
use Softworx\RocXolid\Components\Contracts\Componentable\Table as TableComponentable;
use Softworx\RocXolid\Components\Contracts\Componentable\ModelViewer as ModelViewerComponentable;
use Softworx\RocXolid\Components\Traits\HasModelViewerComponent;
// rocXolid components
use Softworx\RocXolid\Components\General\Alert;
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
    use HasModelViewerComponent;

    /**
     * @var array
     */
    protected $alert_components = [];

    /**
     * @var \Softworx\RocXolid\Components\Contracts\Tableable
     */
    protected $table_component;

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
}
