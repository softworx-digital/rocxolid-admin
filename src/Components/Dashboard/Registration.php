<?php

namespace Softworx\RocXolid\Admin\Components\Dashboard;

// rocXolid component contracts
use Softworx\RocXolid\Components\Contracts\Formable;
use Softworx\RocXolid\Components\Contracts\FormComponentable;
// admin components
use Softworx\RocXolid\Admin\Components\AbstractActiveComponent;

class Registration extends AbstractActiveComponent implements FormComponentable
{
    protected $translation_param = 'registration';

    protected $model_form_component = null;

    public function setFormComponent(Formable $model_form_component): FormComponentable
    {
        $this->model_form_component = $model_form_component;

        return $this;
    }

    public function getFormComponent(): Formable
    {
        if (is_null($this->model_form_component)) {
            throw new \RuntimeException(sprintf('CRUD model_form_component not yet set to [%s]', get_class($this)));
        }

        return $this->model_form_component;
    }
}
