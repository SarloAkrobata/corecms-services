<?php

namespace App\Repositories\Frontend\Contracts;

use App\Repositories\RepositoryInterface;

interface RouteRepositoryInterface extends RepositoryInterface
{
    public function firstOrFail($slug);
}
