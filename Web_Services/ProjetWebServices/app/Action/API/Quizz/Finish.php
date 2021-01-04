<?php

namespace App\Action\API\Quizz;

use App\Core\Controller\AbstractController;
use App\Entity\Quizz;
use App\Entity\User;
use App\Service\LoginTokenManager;
use App\Service\QuizzManager;
use App\Service\UserManager;
use App\Service\VictoryManager;

class Finish extends AbstractController
{
    public function __invoke(string $token)
    {
        $verifyLogin = new LoginTokenManager();

        $isLoggedIn = isset($token)? $verifyLogin($token) : false;

        $this->addHeader('Content-Type', 'application/json');

        if($isLoggedIn){
            $userManager = new UserManager();
            $victoryManager = new VictoryManager();

            $users = [];

            $request = $this->getRequest();
            $data = $request->getParsedBody();

            array_push($users, $userManager->findOneById($data['user1']));

            if(isset($data['user2'])){
                array_push($users, $userManager->findOneById($data['user2']));
            }

            $scores = $victoryManager->endQuizz($users, $data['quizz'], $data['mode']);

            return json_encode($scores);
        }else{
            return json_encode([
                'tokenValidity' => false
            ]);
        }


    }
}