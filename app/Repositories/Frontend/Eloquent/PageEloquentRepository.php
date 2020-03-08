<?php

namespace App\Repositories\Frontend\Eloquent;

use App\Models\Frontend\Page;
use App\Repositories\EloquentRepository;
use App\Repositories\Frontend\Contracts\PageRepositoryInterface;

class PageEloquentRepository extends EloquentRepository implements PageRepositoryInterface
{
    /**
     * ChannelEloquentRepository constructor.
     * @param Page $model
     */
    public function __construct(Page $model)
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
