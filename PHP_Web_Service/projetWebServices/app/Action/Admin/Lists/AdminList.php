<?php

namespace App\Action\Admin\Lists;

use App\Core\Controller\AbstractController;
use App\Entity\Admin;
use App\Entity\Admin as AdminEntity;

class AdminList extends AbstractController
{
    public function __invoke()
    {
        if(isset($_SESSION['adminSession']) && $_SESSION['adminSession']->canAccess()){
			
				$connection = $this->getConnection();

				$sql = 'select * from admins';
				$statement = $connection->query($sql);

				$admins = $statement->fetchAll(\PDO::FETCH_ASSOC);


				$adminList = array();

				foreach ($admins as $admin){
                    $adminE = new AdminEntity();
                    $adminE->hydrate($admin);
				    array_push($adminList, $adminE);
				}

				return $this->render('admins/list/adminList.html.twig', ['admins' => $adminList]);
        }else{
            header('Location: /connexion-admin');
			exit(0);
        }
    }
}
