<?php

namespace App\Service;

use App\Core\Connection\Connection;
use App\Entity\Question;
use App\Entity\Quizz;
use App\Entity\User;
use App\Action\User\Mail;

class QuizzManager
{

    public function persist(Quizz $quizz): Quizz
    {
        $connection = Connection::getInstance();
        if (!is_null($quizz->getUser2())){
            $args = [
                $quizz->getMode(),
                $quizz->getUser1()->getId(),
                $quizz->getUser2()->getId(),
            ];
        } else {
            $args = [
                $quizz->getMode(),
                $quizz->getUser1()->getId(),
                null,
            ];
        }


        if ($quizz->getId()) {
            throw new \Exception('Quizz existe deja !');
        } else {
            $sql = 'INSERT INTO quizz(`mode`, `user1`, `user2`, `startAt`) VALUES(?, ?, ?, NOW())';
        }

        $statement = $connection->prepare($sql);
        $results = $statement->execute($args);

        if (true === $results) {
            if (!$quizz->getId()) {
                $quizz->setId($connection->lastInsertId());
            }
            return $quizz;
        }

        throw new \Exception('Une erreur est survenue');
    }


    public function findOneById(int $id): ?Quizz
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM quizz WHERE id=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$id]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);


        if (!$data) {
            return null;
        }

        $quizz = new Quizz();
        $quizz->hydrate($data);

        return $quizz;
    }
}
