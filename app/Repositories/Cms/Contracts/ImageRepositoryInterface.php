<?php

namespace App\Repositories\Cms\Contracts;

use App\Repositories\RepositoryInterface;

interface ImageRepositoryInterface extends RepositoryInterface
{
    /**
     * Get results with pagination
     * @param $param
     * @param $operator
     * @param $value
     * @param $amount
     */
    public function wherePaginate($param, $operator, $value, $amount);

    public function getImagesByAlbumID($id);

}
