<?php

namespace App\Action\Admin\Lists;

use App\Core\Controller\AbstractController;
use App\Entity\Admin;

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

				    array_push($adminList, new Admin(
				        $admin['id'],
                        $admin['username'],
                        $admin['firstName'],
                        $admin['lastName'],
                        $admin['email'],
                        $admin['registerAt']
                    ));
				}


				return $this->render('admins/list/adminList.html.twig', ['admins' => $adminList]);
        }else{
            header('Location: /connexion-admin');
			exit(0);
        }
    }
}
