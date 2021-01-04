<?php

namespace App\Service;

use App\Core\Connection\Connection;
use App\Entity\PossibleAnswer;


class PossibleAnswerManager
{

    public function persist(PossibleAnswer $possibleAnswer): PossibleAnswer
    {
        $connection = Connection::getInstance();

        $args = [
            $possibleAnswer->getQuestion(),
            $possibleAnswer->getLabel(),
            $possibleAnswer->getIsRight(),
        ];

        if ($possibleAnswer->getId()) {
            throw new \Exception('PossibleAnswer existe deja !');
        } else {
            $sql = 'INSERT INTO possibleanswer(`question`, `label`, `isRight`) VALUES(?, ?, ?)';
        }

        $statement = $connection->prepare($sql);
        $results = $statement->execute($args);

        if (true === $results) {
            if (!$possibleAnswer->getId()) {
                $possibleAnswer->setId($connection->lastInsertId());
            }
            return $possibleAnswer;
        }

        throw new \Exception('Une erreur est survenue');
    }

    public function answer(array $data, bool $isRight): void
    {
        $connection = Connection::getInstance();

        $args = [
            (int)$data['idQuestion'],
            (int)$data['user'],
            (int)$data['idQuiz'],
            ($isRight) ? 1 : 0
        ];

        $sql = 'INSERT INTO quizz_answers(`question_id`, `user_id`, `quizz_id`, `isRight`) VALUES(?,?,?,?)';

        $statement = $connection->prepare($sql);
        $result = $statement->execute($args);

        var_dump($result);
        if(true !== $result){
            throw new \Exception('Une erreur est survenue');
        }
    }


    public function findAnswersByQuestion(int $idQuestion): ?array
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM possibleanswer WHERE question=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$idQuestion]);

        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);



        if (!$data) {
            return null;
        }

        $possiblesAnswers = array();

        foreach ($data as $answer) {
            $possibleAnswer = new PossibleAnswer();
            $possibleAnswer->hydrate($answer);
            $possiblesAnswers[] = $possibleAnswer;
        }

        return $possiblesAnswers;
    }

    public function findRightAnswerByQuestion(int $idQuestion): ?PossibleAnswer
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM possibleanswer WHERE question=? and isRight=1';

        $statement = $connection->prepare($sql);
        $statement->execute([$idQuestion]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $possibleAnswer = new PossibleAnswer();
        $possibleAnswer->hydrate($data);

        return $possibleAnswer;
    }

    public function verifyAnswer(int $idQuestion, int $idAnswer): bool
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT isRight FROM possibleanswer WHERE question=? and id=?';
        $statement = $connection->prepare($sql);
        $statement->execute([$idQuestion,$idAnswer]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if($data['isRight']){
            return true;
        }
        return false;
    }
}
