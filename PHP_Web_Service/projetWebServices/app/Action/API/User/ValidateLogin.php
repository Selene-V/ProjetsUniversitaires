<?php

namespace App\Action\API\User;

use App\Core\Controller\AbstractController;
use App\Serializer\ObjectSerializer;
use App\Service\TokenManager;
use App\Service\UserManager;

class ValidateLogin extends AbstractController
{
    public function __invoke(string $token){
        $tokenManager = new TokenManager();
        $userManager = new UserManager();
        $serializer = new ObjectSerializer();
        $user = null;

        $verify = true;

        $token = $tokenManager->decode($token);

        if($token['exp'] <= time()){
            $verify = false;
        }

        if(isset($token['email'])){
            $user = $userManager->findOneByEmail($token['email']);

            $user = $serializer->toJson($user, false);

            unset($user['password']);

        }

        $this->addHeader('Content-Type', 'application/json');

        if($verify && $user !== null){
            return json_encode([
                'user' => $user,
                'tokenValidity' => $verify
            ]);
        }
        return json_encode([
            'user' => null,
            'tokenValidity' => $verify
        ]);
    }
}