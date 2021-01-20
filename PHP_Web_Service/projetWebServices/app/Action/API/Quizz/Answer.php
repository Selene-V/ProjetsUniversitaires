<?php

namespace App\Action\API\Quizz;

use App\Core\Controller\AbstractController;
use App\Service\LoginTokenManager;
use App\Service\PossibleAnswerManager;

class Answer extends AbstractController
{
    public function __invoke(string $token)
    {
        $verifyLogin = new LoginTokenManager();
        $isLoggedIn = isset($token)? $verifyLogin($token) : false;

        $request = $this->getRequest();
        $data = $request->getBody()->getContents();
        $data = (array)json_decode($data);

        $this->addHeader('Content-Type', 'application/json');

        if($isLoggedIn){
            $answerManager = new PossibleAnswerManager();

            $answer = $answerManager->verifyAnswer($data['idQuestion'],$data['selectedAnswer']);

            $answerManager->answer($data, $answer);

            $this->addHeader('Content-Type', 'application/json');

            return json_encode(['isRight'=>$answer]);
        }else{
            return json_encode([
                'tokenValidity' => false
            ]);
        }


    }
}