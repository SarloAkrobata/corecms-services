<?php

namespace App\Repositories\Cms\Eloquent;

use App\Models\Cms\Menu\Menu;
use App\Repositories\EloquentRepository;
use App\Repositories\Cms\Contracts\MenuRepositoryInterface;

class MenuEloquentRepository extends EloquentRepository implements MenuRepositoryInterface
{
    /**
     * ChannelEloquentRepository constructor.
     * @param Menu $model
     */
    public function __construct(Menu $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function wherePaginate($param, $operator, $value, $amount)
    {
        // TODO: Implement wherePaginate() method.
    }
}
