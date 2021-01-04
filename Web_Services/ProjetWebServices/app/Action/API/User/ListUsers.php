<?php


namespace App\Action\API\User;


use App\Core\Controller\AbstractController;
use App\Serializer\ObjectSerializer;
use App\Service\LoginTokenManager;
use App\Service\UserManager;

class ListUsers extends AbstractController
{
    public function __invoke(string $token)
    {
        $verifyLogin = new LoginTokenManager();

        $isLoggedIn = isset($token)? $verifyLogin($token) : false;

        $this->addHeader('Content-Type', 'application/json');

        if($isLoggedIn){
            $userManager = new UserManager();
            $serializer = new ObjectSerializer();

            $users = $userManager->findAll();

            $users = array_map(function ($user) use ($serializer) {
                $user = $serializer->toJson($user, false);
                unset(
                    $user['firstName'],
                    $user['lastName'],
                    $user['email'],
                    $user['registerAt'],
                    $user['password']
                );
                return $user;
                }, $users);
            return json_encode([
                'userList' => $users,
                'tokenValidity' => false
            ]);

        }else{
            return json_encode([
                'userList' => null,
                'tokenValidity' => false
            ]);
        }

    }

}