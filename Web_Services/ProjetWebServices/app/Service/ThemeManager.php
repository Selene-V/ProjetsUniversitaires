<?php

namespace App\Service;

use App\Core\Connection\Connection;
use App\Entity\Theme;

class ThemeManager
{

    public function persist(Theme $theme): Theme
    {
        $connection = Connection::getInstance();

        $args = [
            $theme->getName(),
        ];

        if ($theme->getId()) {
            throw new \Exception('Theme existe deja !');
        } else {
            $sql = 'INSERT INTO themes(`nom`) VALUES(?)';
        }

        $statement = $connection->prepare($sql);
        $results = $statement->execute($args);

        if (true === $results) {
            if (!$theme->getId()) {
                $theme->setId($connection->lastInsertId());
            }
            return $theme;
        }

        throw new \Exception('Une erreur est survenue');
    }


    public function findOneById(int $id): ?Theme
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM themes WHERE id=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$id]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $theme = new Theme();
        $theme->hydrate($data);

        return $theme;
    }

    public function findOneByName(string $nom): ?Theme
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM themes WHERE nom=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$nom]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $theme = new Theme();
        $theme->hydrate($data);

        return $theme;
    }

    public function findAll(): array
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM themes';

        $statement = $connection->query($sql);

        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(function (array $d) {
            $p = new Theme();
            $p->hydrate($d);

            return $p;
        }, $data);
    }
}
