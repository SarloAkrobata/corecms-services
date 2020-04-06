<?php

namespace App\Services\Cms\Authentication;


use App\Repositories\Cms\Contracts\AuthenticationRepositoryInterface;

class AuthenticationService
{
    private $repository;
    private const DEFAULT_ROLE = 'MEMBER';

    /**
     * AuthenticationService constructor.
     * @param AuthenticationRepositoryInterface $repository
     */
    public function __construct(AuthenticationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $data
     */
    public function signup($data)
    {
        $data['role'] = self::DEFAULT_ROLE;
        $this->repository->create($data);
    }

}
