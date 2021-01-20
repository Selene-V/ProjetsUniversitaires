<?php

namespace App\Service;

class LoginTokenManager
{
    public function __invoke(string $token) : bool
    {

        $tokenManager = new TokenManager();

        $token = $tokenManager->decode($token);

        if($token === null){
            return false;
        }

        return true;

    }
}