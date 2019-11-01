<?php

namespace Softworx\RocXolid\Admin\Components;

use Softworx\RocXolid\Components\AbstractActiveComponent as RocXolidAbstractActiveComponent;

abstract class AbstractActiveComponent extends RocXolidAbstractActiveComponent
{
    protected $translation_package = 'rocXolid:admin';

    protected $translation_param = 'admin';
}