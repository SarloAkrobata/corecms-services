<?php

namespace App\Repositories\Cms\Eloquent;

use App\Models\Cms\Page\Page;
use App\Repositories\EloquentRepository;
use App\Repositories\Cms\Contracts\PageRepositoryInterface;

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
