<?php

namespace App\Action\API\Question;

use App\Core\Controller\AbstractController;
use App\Entity\Theme;
use App\Serializer\ObjectSerializer;
use App\Service\LoginTokenManager;
use App\Service\QuestionManager;
use App\Service\ThemeManager;
use App\Service\TokenManager;


class ListQuestions extends AbstractController
{
    public function __invoke(string $token,int $idTheme = null)
    {

        $verifyLogin = new LoginTokenManager();

        $isLoggedIn = isset($token)? $verifyLogin($token) : false;

        $idTheme = isset($data['themeID'])? (int)$data['themeID'] : null;

        $this->addHeader('Content-Type', 'application/json');

        if($isLoggedIn){
            $questionManager = new QuestionManager();

            $serializer = new ObjectSerializer();

            if ($idTheme === null) {
                $questions = $questionManager->findAll();

                $questions = array_map(function ($question) use ($serializer) {
                    return $serializer->toJson($question, false);
                }, $questions);

                return json_encode($questions);

            } else {
                $questions = $questionManager->findByTheme($idTheme);

                $questions = array_map(function ($question) use ($serializer) {
                    return $serializer->toJson($question, false);
                }, $questions);

                return json_encode($questions);
            }
        }else{
            return json_encode([
                'tokenValidity' => false
            ]);
        }
    }
}
