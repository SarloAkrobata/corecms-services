<?php

namespace App\Repositories\Cms\Eloquent;

use App\Models\Cms\Menu\Route;
use App\Repositories\EloquentRepository;
use App\Repositories\Cms\Contracts\RouteRepositoryInterface;

class RouteEloquentRepository extends EloquentRepository implements RouteRepositoryInterface
{
    /**
     * @param Route $model
     */
    public function __construct(Route $model)
    {
        parent::__construct($model);
    }

    public function firstOrFail($slug)
    {
        // TODO: Implement firstOrFail() method.
    }
}
