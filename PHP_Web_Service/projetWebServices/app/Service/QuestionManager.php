<?php

namespace App\Service;

use App\Core\Connection\Connection;
use App\Entity\Question;

class QuestionManager
{

    public function persist(Question $question): Question
    {
        $connection = Connection::getInstance();

        $args = [
            $question->getLabel(),
            $question->getTheme(),
        ];

        if ($question->getId()) {
            throw new \Exception('Question existe deja !');
        } else {
            $sql = 'INSERT INTO questions(`label`, `theme`) VALUES(?, ?)';
        }

        $statement = $connection->prepare($sql);
        $results = $statement->execute($args);

        if (true === $results) {
            if (!$question->getId()) {
                $question->setId($connection->lastInsertId());
            }
            return $question;
        }

        throw new \Exception('Une erreur est survenue');
    }


    public function findOneById(int $id): ?Question
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM questions WHERE id=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$id]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $question = new Question();
        $question->hydrate($data);

        return $question;
    }

    public function findByTheme(int $idTheme): ?array
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM questions WHERE theme=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$idTheme]);

        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }
        return array_map(function (array $d) {
            $p = new Question();
            $themeManager = new ThemeManager();

            $p->setLabel($d['label']);
            $p->setTheme($themeManager->findOneById($d['theme']));
            $p->setId($d['id']);

            return $p;
        }, $data);
    }

    public function countNumberQuestionByTheme(int $idTheme): ?int
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT count(*) FROM questions WHERE theme=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$idTheme]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }
        return $data['count(*)'];
    }

    public function findOneRandomQuestionByTheme(int $idTheme, int $numligne): ?Question
    {
        $data = $this->findByTheme($idTheme);

        $data = $data[$numligne];
        return $data;
    }

    public function findRandomQuestionsByTheme(int $idTheme): ?array{
        $questions = [];
        $nbQuestions = 4;
        $countLine = $this->countNumberQuestionByTheme($idTheme);

        if ($countLine >= $nbQuestions){
            $numLignesRandom = [];
            $numLigneRandomCourante = rand(0, $countLine -1);

            for ($i = 0 ; $i < $nbQuestions ; $i++) {
                while (array_search($numLigneRandomCourante, $numLignesRandom) !== false) {
                    $numLigneRandomCourante = rand(0, $countLine - 1);
                }
                $numLignesRandom[] = $numLigneRandomCourante;

                $questions[] = $this->findOneRandomQuestionByTheme($idTheme, $numLigneRandomCourante);

            }
        }

        return $questions;
    }

    public function findAll(): array
    {
        $connection = Connection::getInstance();


        $sql = 'SELECT * FROM questions';

        $statement = $connection->query($sql);

        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(function (array $d) {
            $p = new Question();
            $themeManager = new ThemeManager();
            $p->setLabel($d['label']);
            $p->setTheme($themeManager->findOneById($d['theme']));
            $p->setId($d['id']);


            return $p;
        }, $data);
    }
}
