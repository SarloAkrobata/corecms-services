<?php

namespace App\Http\Middleware;

use Closure;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\ValidationData;

class ValidateToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        if (!empty($token)) {
            $token = (new Parser())->parse((string) $token);
            try {
                $token = (new Parser())->parse((string) $token);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Unauthorized!'], 401);
            }

            $data = new ValidationData(); // It will use the current time to validate (iat, nbf and exp)
            $data->setIssuer($token->getClaim('iss'));
            $data->setAudience($token->getClaim('aud'));
            $data->setId($token->getHeader('jti'));

            $signer = new Sha256();

            if ($token->validate($data) && $token->verify($signer, 'kljuc')) {
                return $next($request);
            }
        }

        return response()->json(['message' => 'Unauthorized!'], 401);
    }
}
