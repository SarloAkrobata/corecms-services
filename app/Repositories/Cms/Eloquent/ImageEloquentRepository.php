<?php

namespace App\Repositories\Cms\Eloquent;

use App\Models\Cms\Image\Image;
use App\Repositories\EloquentRepository;
use App\Repositories\Cms\Contracts\ImageRepositoryInterface;

class ImageEloquentRepository extends EloquentRepository implements ImageRepositoryInterface
{
    /**
     * ChannelEloquentRepository constructor.
     * @param Image $model
     */
    public function __construct(Image $model)
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

    public function getImagesByAlbumID($id)
    {
        return $this->model->join('albums', 'albums.id', '=', 'images.album_id')
            ->select('images.*')
            ->where('album_id', $id)
            ->get();
    }
}
