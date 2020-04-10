<?php

namespace App\Services\Cms\Authentication;


use App\Models\User\User;
use App\Repositories\Cms\Contracts\AuthenticationRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key;

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

    public function createToken($user) {
        $signer = new Sha256();
        $time = time();
        $token = (new Builder())->issuedBy(config('token.issuedBy')) // Configures the issuer (iss claim)
        ->permittedFor($user->role) // Configures the audience (aud claim)
        ->identifiedBy(Str::random(40), true) // Configures the id (jti claim), replicating as a header item
        ->issuedAt($time) // Configures the time that the token was issue (iat claim)
        ->canOnlyBeUsedAfter($time) // Configures the time that the token can be used (nbf claim)
        ->expiresAt($time + 3600) // Configures the expiration time of the token (exp claim)
        ->withClaim('uid', $user->id) // Configures a new claim, called "uid"
        ->getToken($signer, new Key(config('token.tokenSign'))); // Retrieves the generated token

        return $token;
    }

}
