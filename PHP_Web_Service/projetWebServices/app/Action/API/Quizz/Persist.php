<?php

namespace App\Action\API\Quizz;

use App\Core\Controller\AbstractController;
use App\Serializer\ObjectSerializer;
use App\Service\LoginTokenManager;
use App\Service\QuestionManager;
use App\Service\QuestionQuizzManager;
use App\Service\QuizzManager;
use App\Entity\Quizz;

class Persist extends AbstractController
{
    public function __invoke(string $token)
    {
        $verifyLogin = new LoginTokenManager();

        $request = $this->getRequest();

        $data = $request->getBody()->getContents();

        $lserver = $request->getServerParams();

        $contentType = explode(';', $lserver['CONTENT_TYPE'])[0];

        $isLoggedIn = isset($token)? $verifyLogin($token) : false;

        if($isLoggedIn){
            $quizzManager = new QuizzManager();
            $questionquizzManager = new QuestionQuizzManager();

            $quizz = new Quizz();
            $serializer = new ObjectSerializer();

            if ($contentType === "application/xml"){
                $xml   = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
                $data = json_decode(json_encode((array)$xml), TRUE);

                $quizz->hydrate($data);
                $quizzManager->persist($quizz);


                $questionManager = new QuestionManager();
                $questions = $questionManager->findRandomQuestionsByTheme($data['idTheme']);

                for ($i = 0 ; $i < count($questions) ; $i++){
                    $questionquizzManager->persist($quizz->getId(), $questions[$i]);
                }

                $quizz->setQuestions($questions);

                $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><data></data>');
                $serializer->toXml($data,$xml);

                $this->addHeader('Content-Type', 'application/xml');

                return $xml->asXML();

            } else{
                $data = (array)json_decode($data);
                $quizzId = null;

                if(isset($data['quizzId'])){
                    $quizzId = $data['quizzId'];
                    unset($data['quizzId']);
                }

                $quizz->hydrate($data);
                $quizz = $quizzManager->persist($quizz, $quizzId);

                $questionManager = new QuestionManager();
                $questions = $questionManager->findRandomQuestionsByTheme($data['idTheme']);

                for ($i = 0 ; $i < count($questions) ; $i++){
                    $questionquizzManager->persist($quizz->getId(), $questions[$i]);
                }

                $quizz->setQuestions($questions);

                $this->addHeader('Content-Type', 'application/json');

                return $serializer->toJson($quizz);
            }
        }else{
            $this->addHeader('Content-Type', 'application/json');

            return json_encode([
                'tokenValidity' => false
            ]);
        }
    }
}
