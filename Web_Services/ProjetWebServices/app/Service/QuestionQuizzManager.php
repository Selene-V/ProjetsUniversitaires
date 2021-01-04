<?php

namespace App\Service;

use App\Core\Connection\Connection;
use App\Entity\QuestionQuizz;
use http\QueryString;

class QuestionQuizzManager
{

    public function persist(int $idQuizz, $question): QuestionQuizz
    {
        $connection = Connection::getInstance();
        $questionquizz = new QuestionQuizz();

        $questionquizz->setIdQuizz($idQuizz);
        $questionquizz->setIdQuestion($question->getId());

        $args = [
            $questionquizz->getIdQuizz(),
            $questionquizz->getIdQuestion(),
        ];

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

        throw new \Exception('Une erreur est survenue');
    }


    public function findQuestionsByQuizz(int $idQuizz): ?array
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM question_quizz WHERE id_quizz=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$idQuizz]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $questionquizz = new QuestionQuizz();
        $questionquizz->hydrate($data);


        $questionsquizz = array();

        foreach ($data as $answer) {
            $questionquizz = new QuestionQuizz();
            $questionquizz->hydrate($answer);
            $questionsquizz[] = $questionquizz;
        }

        return $questionsquizz;
    }
}
