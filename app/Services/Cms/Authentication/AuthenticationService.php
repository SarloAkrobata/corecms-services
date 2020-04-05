<?php

namespace App\Services\Cms\Authentication;


use App\Repositories\Cms\Contracts\AuthenticationRepositoryInterface;

class AuthenticationService
{
    private $repository;
    private const DEFAULT_ROLE = 'MEMBER';

    public function __construct(AuthenticationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function signup($data)
    {
        $data['role'] = self::DEFAULT_ROLE;
        $this->repository->create($data);
    }

}
