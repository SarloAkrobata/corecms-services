<?php

namespace App\Services\Cms\Authentication;


use App\Models\User\User;
use App\Repositories\Cms\Contracts\AuthenticationRepositoryInterface;
use Illuminate\Support\Facades\Hash;

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
        $data['password'] = Hash::make(($data['password']));
        $this->repository->create($data);
    }

    public function login($credentials)
    {
        $user = $this->repository->findUserByEmail($credentials['email']);

        if (Hash::check($credentials['password'], $user->password)) {
            return $user;
        }

        return false;
    }

}
