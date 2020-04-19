<?php

namespace App\Repositories\Cms\Eloquent;

use App\Models\Cms\Image\Album;
use App\Repositories\EloquentRepository;
use App\Repositories\Cms\Contracts\AlbumRepositoryInterface;

class AlbumEloquentRepository extends EloquentRepository implements AlbumRepositoryInterface
{
    /**
     * ChannelEloquentRepository constructor.
     * @param Album $model
     */
    public function __construct(Album $model)
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
