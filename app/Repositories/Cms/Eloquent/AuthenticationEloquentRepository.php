<?php

namespace App\Repositories\Cms\Eloquent;

use App\Models\User\User;
use App\Repositories\EloquentRepository;
use App\Repositories\Cms\Contracts\AuthenticationRepositoryInterface;

class AuthenticationEloquentRepository extends EloquentRepository implements AuthenticationRepositoryInterface
{
    /**
     * ChannelEloquentRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
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
