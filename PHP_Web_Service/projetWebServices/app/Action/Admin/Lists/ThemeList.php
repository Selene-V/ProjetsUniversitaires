<?php

namespace App\Action\Admin\Lists;

use App\Core\Controller\AbstractController;

class ThemeList extends AbstractController
{
    public function __invoke()
    {
        if(isset($_SESSION['adminSession']) && $_SESSION['adminSession']->canAccess()) {

            $connection = $this->getConnection();

            $sql = 'select * from themes';
            $statement = $connection->query($sql);

            $themes = $statement->fetchAll(\PDO::FETCH_ASSOC);

            return $this->render('admins/list/themeList.html.twig', ['themes' => $themes]);
        }else {
            header('Location: /connexion-admin');
            exit(0);
        }
    }
}
