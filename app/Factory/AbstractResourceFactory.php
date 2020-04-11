<?php

namespace App\Factory;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractResourceFactory
{
    abstract function makeResourceCollection(Collection $model);
    abstract function makeResource(Model $model);
}
