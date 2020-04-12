<?php

namespace App\Http\Controllers\Cms\Authentication;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\SignupRequest;
use App\Services\Cms\Authentication\AuthenticationService;

class Authentication
{
    private $service;

    public function __construct(AuthenticationService $service)
    {
        $this->service = $service;
    }

    public function signup(SignupRequest $request)
    {
        $this->service->signup($request->all());

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $user = $this->service->login($credentials);

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $token = $this->service->createToken($user);

        return response()->json([
            'token' => $token->__toString()
        ], 200);
    }

    public function ping()
    {
        return [
            'status' => 'success',
            'message' => 'pong'
        ];
    }
}
