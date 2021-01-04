<?php

namespace App\Service;

use App\Core\Connection\Connection;
use App\Entity\Quizz;
use App\Entity\User;

class VictoryManager
{

    public function endQuizz(array $users, int $quizzId, int $mode): array
    {
        $user1Points = 0;
        $user1Id = 0;

        $user2Points = 0;
        $user2Id = 0;

        $connection = Connection::getInstance();

        if($mode === 0){
            $sql = 'SELECT COUNT(*) FROM `quizz_answers` WHERE `user_id`=? and `quizz_id`=? and `isRight`=1';
            $statement = $connection->prepare($sql);
            $statement->execute([$users[0]->getId(), $quizzId]);
            $user1Points = $statement->fetch(\PDO::FETCH_NUM);
            $user1Points = (int) $user1Points[0];

            return [
                "score" => $user1Points
            ];
        }else{

            foreach ($users as $key => $user){
                $userId = $user->getId();

                $sql = 'SELECT COUNT(*) FROM `quizz_answers` WHERE `user_id`=? and `quizz_id`=? and `isRight`=1';
                $statement = $connection->prepare($sql);
                $statement->execute([$userId, $quizzId]);
                if($key === 0){
                    $user1Points = $statement->fetch(\PDO::FETCH_NUM);
                    $user1Points = (int) $user1Points[0];

                    $user1Id = $userId;
                }else{

                    $user2Points = $statement->fetch(\PDO::FETCH_NUM);

                    $user2Points = (int) $user2Points[0];
                    $user2Id = $userId;
                }
            }


            if($user1Points > $user2Points){
                $this->setWinner($connection, 10,$user1Id, $quizzId);

            }elseif($user2Points > $user1Points){
                $this->setWinner($connection, 10,$user2Id, $quizzId);
            }elseif($user1Points === $user2Points){
                $this->setWinner($connection, 5,$user1Id);
                $this->setWinner($connection, 5,$user2Id);
            }

            return [
                "scoreUser1" => $user1Points,
                "scoreUser2" => $user2Points
            ];
        }

    }

    protected function setWinner(\PDO $connection,int $prize, int $userId, int $quizzId = null)
    {
        $sql = 'SELECT point FROM users where id=?';
        $statement = $connection->prepare($sql);
        $statement->execute([$userId]);
        $userPoints = $statement->fetch(\PDO::FETCH_NUM);
        $userPoints = (int) $userPoints[0] + $prize;

        $sql = 'UPDATE users SET `point`=? where id=?';
        $statement = $connection->prepare($sql);
        $statement->execute([$userPoints,$userId]);

        if($quizzId !== null){
            $sql = 'UPDATE quizz SET winner=? WHERE id=?';
            $statement = $connection->prepare($sql);
            $statement->execute([$userId,$quizzId]);
        }
    }
}