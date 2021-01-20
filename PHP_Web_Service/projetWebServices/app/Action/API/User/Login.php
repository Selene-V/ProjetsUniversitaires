<?php

namespace App\Action\API\User;

use App\Core\Controller\AbstractController;
use App\Serializer\ObjectSerializer;
use App\Service\TokenManager;
use App\Service\UserManager;

class Login extends AbstractController
{
    public function __invoke()
    {
        $tokenManager = new TokenManager();
        $userManager = new UserManager();
        $serializer = new ObjectSerializer();

        $request = $this->getRequest();
        $data = $request->getParsedBody();

        $user = $userManager->findOneByEmail($data['email']);


        if (!$user || !password_verify($data['password'], $user->getPassword())) {
            return json_encode([
                'errorCode' => 404,
                'message' => 'Identifiants incorectes'
            ]);
        }
        $user = $serializer->toJson($user, false);

        unset(
            $user['registerAt'],
            $user['password']
        );

        $token = $tokenManager->encode([
            "iss" => "http://projetquizz:8181",
            "aud" => "http://projetquizz:8181",
            "iat" => time(),
            "exp" => time() + 86400,
            'email' => $data['email']
        ]);

        $this->addHeader('Content-Type', 'application/json');

        return json_encode([
            "currentUser" => $user,
            'token' => $token
        ]);
    }
}
