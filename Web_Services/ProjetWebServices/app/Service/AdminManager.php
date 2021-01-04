<?php

namespace App\Service;

use App\Core\Connection\Connection;
use App\Entity\Admin;

class AdminManager
{

    public function persist(Admin $admin): Admin
    {
        $connection = Connection::getInstance();

        $args = [
            $admin->getUsername(),
            $admin->getFirstName(),
            $admin->getLastName(),
            $admin->getEmail(),
            password_hash($admin->getPassword(), PASSWORD_DEFAULT),
        ];

        if ($admin->getId()) {
            throw new \Exception('Admin existe deja !');
        } else {
            $sql = 'INSERT INTO admins(`username`, `firstName`, `lastName`, `email`, `registerAt`, `password`) VALUES(?, ?, ?, ?, NOW(), ?)';
        }

        $statement = $connection->prepare($sql);
        $results = $statement->execute($args);

        if (true === $results) {
            if (!$admin->getId()) {
                $admin->setId($connection->lastInsertId());
            }

            return $admin;
        }

        throw new \Exception('Une erreur est survenue');
    }

    public function findOneByEmail(string $email): ?Admin
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM admins WHERE email=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$email]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $admin = new Admin();
        $admin->hydrate($data);

        return $admin;
    }

    public function findOneById(int $id): ?Admin
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM admins WHERE id=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$id]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $admin = new Admin();
        $admin->hydrate($data);

        return $admin;
    }
}
