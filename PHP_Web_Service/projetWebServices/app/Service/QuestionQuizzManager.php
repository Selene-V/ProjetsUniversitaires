<?php

namespace App\Service;

use App\Core\Connection\Connection;
use App\Entity\PossibleAnswer;
use App\Entity\Question;
use App\Entity\QuestionQuizz;
use App\Serializer\ObjectSerializer;
use http\QueryString;

class QuestionQuizzManager
{

    public function persist(int $idQuizz, $question, $newTheme = false, $i = 0): QuestionQuizz
    {
        $connection = Connection::getInstance();
        $questionquizz = new QuestionQuizz();

        $questionquizz->setIdQuizz($idQuizz);
        $questionquizz->setIdQuestion($question->getId());

        $args = [
            $questionquizz->getIdQuizz(),
            $questionquizz->getIdQuestion(),
        ];

        if(!$newTheme){
            if ($questionquizz->getId()) {
                throw new \Exception('QuestionQuizz existe deja !');
            } else {
                $sql = 'INSERT INTO question_quizz(`id_quizz`, `id_question`) VALUES(?, ?)';
            }

            $statement = $connection->prepare($sql);
            $results = $statement->execute($args);

            if (true === $results) {
                if (!$questionquizz->getId()) {
                    $questionquizz->setId($connection->lastInsertId());
                }
                return $questionquizz;
            }
        }else{
            if($i === 0) {
                $sql = 'DELETE FROM question_quizz WHERE `id_quizz`=' . $questionquizz->getIdQuizz();
                $statement = $connection->prepare($sql);
                $results = $statement->execute($args);
                if (false === $results) {
                    throw new \Exception('Une erreur est survenue');
                }
            }
            $sql = 'INSERT INTO question_quizz(`id_quizz`, `id_question`) VALUES(?, ?)';

            $statement = $connection->prepare($sql);
            $results = $statement->execute($args);

            if (true === $results) {

                if (!$questionquizz->getId()) {
                    $questionquizz->setId($connection->lastInsertId());
                }

                return $questionquizz;
            }
        }


        throw new \Exception('Une erreur est survenue');
    }


    public function findIdQuestionsByQuizz(int $idQuizz): ?array
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM question_quizz WHERE id_quizz=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$idQuizz]);

        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return array_map(function (array $d) {
            $p = new QuestionQuizz();
            $p->hydrate($d);

            return $p;
        }, $data);
    }

    function findQuestionsByQuizz(int $idQuizz){
        $serializer = new ObjectSerializer();
        $questionManager = new QuestionManager();
        $answerManager = new PossibleAnswerManager();

        $listeIdQuestions = $this->findIdQuestionsByQuizz($idQuizz);
        $listeQuestions = array();
        foreach ($listeIdQuestions as $question){
            $idQuestion = $question->getIdQuestion();

            $listeAnswers = $answerManager->findAnswersByQuestion($idQuestion);
            $listeAnswers = array_map(function ($answer) use ($serializer) {
                $answer = $serializer->toJson($answer, false);
                unset($answer['isRight']);
                return $answer;
            }, $listeAnswers);

            $labelQuestion = $questionManager->findOneById($idQuestion)->getLabel();

            $questionCourante =
                [
                    'idQuestion' => $idQuestion,
                    'labelQuestion' => $labelQuestion,
                    'listeReponses' => $listeAnswers
                ]
            ;
            array_push($listeQuestions, $questionCourante);
        }

        return $listeQuestions;
    }
}