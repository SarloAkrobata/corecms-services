<?php

namespace App\Repositories\Frontend\Eloquent;

use App\Models\Frontend\Route;
use App\Repositories\EloquentRepository;
use App\Repositories\Frontend\Contracts\RouteRepositoryInterface;

class RouteEloquentRepository extends EloquentRepository implements RouteRepositoryInterface
{
    /**
     * @param Route $model
     */
    public function __construct(Route $model)
    {
        parent::__construct($model);
    }

    public function firstOrFail($value)
    {
        return $this->model->where('route_path', $value)->firstOrFail();
    }

    public function all()
    {
        return $this->model->all()->sortBy('order_number');
    }

    public function reOrderMenuItems($id)
    {

    }
}
