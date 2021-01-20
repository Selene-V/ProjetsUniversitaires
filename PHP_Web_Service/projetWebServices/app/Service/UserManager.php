<?php

namespace App\Service;

use App\Core\Connection\Connection;
use App\Entity\Theme;
use App\Entity\User;
use App\Action\API\User\Mail;

class UserManager
{

    public function persist(User $user): User
    {
        $connection = Connection::getInstance();

        $args = [
            $user->getUsername(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEmail(),
            $user->getPoint(),
            password_hash($user->getPassword(), PASSWORD_DEFAULT),
        ];

        if ($user->getId()) {
            throw new \Exception('User existe deja !');
        } else {
            $sql = 'INSERT INTO users(`username`, `firstName`, `lastName`, `email`, `registerAt`, `point`, `password`) VALUES(?, ?, ?, ?, NOW(), ?, ?)';
        }

        $statement = $connection->prepare($sql);
        $results = $statement->execute($args);

        if (true === $results) {
            if (!$user->getId()) {
                $user->setId($connection->lastInsertId());
            }

            return $user;
        }

        throw new \Exception('Une erreur est survenue');
    }

    public function findOneByEmail(string $email): ?User
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM users WHERE email=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$email]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $user = new User();
        $user->hydrate($data);

        return $user;
    }

    public function findOneByUsername(string $username): ?User
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM users WHERE username=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$username]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $user = new User();
        $user->hydrate($data);

        return $user;
    }

    public function findOneById(int $id): ?User
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM users WHERE id=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$id]);

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        $user = new User();
        $user->hydrate($data);

        return $user;
    }

    public function findAll(): array
    {
        $connection = Connection::getInstance();

        $sql = 'SELECT * FROM users';

        $statement = $connection->query($sql);

        $data = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $users = array_map(function (array $d) {
            $p = new User();
            $p->hydrate($d);

            return $p;
        }, $data);

        return $users;
    }
}
