<?php


namespace App\Action\API\User;


use App\Core\Controller\AbstractController;
use App\Serializer\ObjectSerializer;
use App\Service\LoginTokenManager;
use App\Service\UserManager;

class User extends AbstractController
{
    public function __invoke()
    {
        $request = $this->getRequest();
        $data = $request->getQueryParams();

        $usernameUser = isset($data['usernameUser']) ? (string)$data['usernameUser'] : null;
        $emailUser = isset($data['emailUser']) ? (string)$data['emailUser'] : null;


        $this->addHeader('Content-Type', 'application/json');

        $userManager = new UserManager();
        $serializer = new ObjectSerializer();

        if ($usernameUser === null) {

            if ($emailUser !== null) {
                $user = $userManager->findOneByEmail($emailUser);
                if ($user === null){
                    return json_encode([
                        'userExist' => false
                    ]);
                } else {
                    $user = $serializer->toJson($user);
                    return json_encode(
                        array_merge(
                            ['userExist' => true],
                        json_decode($user, true)));
                }

            }
        } else {
            $user = $userManager->findOneByUsername($usernameUser);
            if ($user === null){
                return json_encode([
                    'userExist' => false
                ]);
            }
        }
        $user = $serializer->toJson($user);
        return json_encode(
            array_merge(
                ['userExist' => true],
                json_decode($user, true)));
    }
}