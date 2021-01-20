<?php

namespace App\Action\API\Question;

use App\Core\Controller\AbstractController;
use App\Entity\Theme;
use App\Serializer\ObjectSerializer;
use App\Service\LoginTokenManager;
use App\Service\QuestionManager;
use App\Service\QuestionQuizzManager;
use App\Service\ThemeManager;
use App\Service\TokenManager;
use mysql_xdevapi\TableSelect;


class ListQuestions extends AbstractController
{
    public function __invoke(string $token)
    {

        $verifyLogin = new LoginTokenManager();

        $isLoggedIn = isset($token)? $verifyLogin($token) : false;

        $request= $this->getRequest();
        $data = $request->getQueryParams();

        $idTheme = isset($data['themeID'])? (int)$data['themeID'] : null;
        $idQuizz = isset($data['quizzID'])? (int)$data['quizzID'] : null;

        $this->addHeader('Content-Type', 'application/json');

        if($isLoggedIn){
            $questionManager = new QuestionManager();
            $questionQuizzManager = new QuestionQuizzManager();

            $serializer = new ObjectSerializer();

            if ($idTheme === null) {
                if($idQuizz === null){
                    $questions = $questionManager->findAll();

                    $questions = array_map(function ($question) use ($serializer) {
                        return $serializer->toJson($question, false);
                    }, $questions);

                    return json_encode($questions);
                } else {
                    $questions = $questionQuizzManager->findQuestionsByQuizz($idQuizz);

                    return json_encode(['listQuestions' => $questions]);
                }
            } else {
                if($idQuizz === null){
                    $questions = $questionManager->findByTheme($idTheme);

                    $questions = array_map(function ($question) use ($serializer) {
                        return $serializer->toJson($question, false);
                    }, $questions);

                    return json_encode(['listQuestions' => $questions]);
                }else{

                    $questionManager = new QuestionManager();
                    $questions = $questionManager->findRandomQuestionsByTheme($idTheme);

                    $questionquizzManager = new QuestionQuizzManager();

                    for ($i = 0 ; $i < count($questions) ; $i++){
                        $questionquizzManager->persist($idQuizz, $questions[$i], true , $i);
                    }
                    $questions = array_map(function ($question) use ($serializer) {
                        return $serializer->toJson($question, false);
                    }, $questions);
                    $questions = $questionQuizzManager->findQuestionsByQuizz($idQuizz);
                    return json_encode(['listQuestions' => $questions]);
                }
            }
        }else{
            return json_encode([
                'tokenValidity' => false
            ]);
        }
    }
}
