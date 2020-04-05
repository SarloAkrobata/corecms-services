<?php

namespace App\Http\Controllers\Cms\Authentication;

use App\Http\Requests\User\UserRequest;
use App\Services\Cms\Authentication\AuthenticationService;

class Authentication
{
    private $service;

    public function __construct(AuthenticationService $service)
    {
        $this->service = $service;
    }

    public function signup(UserRequest $request)
    {
        $this->service->signup($request->all());

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
}
