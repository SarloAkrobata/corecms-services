<?php

namespace App\Repositories\Cms\Contracts;

use App\Repositories\RepositoryInterface;

interface RouteRepositoryInterface extends RepositoryInterface
{
    public function firstOrFail($slug);
}
