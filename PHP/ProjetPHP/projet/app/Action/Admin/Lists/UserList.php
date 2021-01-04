<?php

namespace App\Action\Admin\Lists;

use App\Core\Controller\AbstractController;

class UserList extends AbstractController
{
    public function __invoke()
    {
        if(isset($_SESSION['adminSession']) && $_SESSION['adminSession']->canAccess()) {

            $connection = $this->getConnection();

            $sql = 'select * from users';
            $statement = $connection->query($sql);

            $users = $statement->fetchAll(\PDO::FETCH_ASSOC);


            return $this->render('admins/list/userList.html.twig', ['users' => $users]);
        } else {
            header('Location: /connexion-admin');
            exit(0);
        }
    }
}
