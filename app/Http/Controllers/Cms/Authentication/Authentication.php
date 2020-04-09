<?php

namespace App\Http\Controllers\Cms\Authentication;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\SignupRequest;
use App\Services\Cms\Authentication\AuthenticationService;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Signer\Hmac\Sha256;

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

        $token = $this->createToken($user->role);

        return response()->json([
            'token' => $token->__toString()
        ], 200);
    }


    private function createToken($aud) {
        $signer = new Sha256();
        $time = time();
        $token = (new Builder())->issuedBy('http://corecms.com') // Configures the issuer (iss claim)
        ->permittedFor($aud) // Configures the audience (aud claim)
        ->identifiedBy('4f1g23a12aa', true) // Configures the id (jti claim), replicating as a header item
        ->issuedAt($time) // Configures the time that the token was issue (iat claim)
        ->canOnlyBeUsedAfter($time + 60) // Configures the time that the token can be used (nbf claim)
        ->expiresAt($time + 3600) // Configures the expiration time of the token (exp claim)
        ->withClaim('uid', 1) // Configures a new claim, called "uid"
        ->getToken($signer, new Key('kljuc')); // Retrieves the generated token

        return $token;
    }
}
