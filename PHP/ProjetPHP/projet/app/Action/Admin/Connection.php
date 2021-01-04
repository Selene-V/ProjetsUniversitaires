<?php

namespace App\Action\Admin;

use App\Core\Controller\AbstractController;
use App\Entity\Admin as AdminEntity;

class Connection extends AbstractController{
    public function __invoke()
    {

        if(!isset($_SESSION['adminSession'])){

            $connection = $this->getConnection();
            $sql = 'select * from admins where username=? LIMIT 1';

            $request = $this->getRequest();
            if($request->getMethod() === 'POST'){
                $formParams = $request->getParsedBody();
                if($formParams['username'] !== '' && $formParams['password'] !== 'password'){
                    $mdp = $formParams['password'];

                    $statement = $connection->prepare($sql);
                    $args = [strtolower($formParams['username'])];
                    $statement->execute($args);
                    $response = $statement->fetchAll(\PDO::FETCH_ASSOC);
					

                    if(!empty($response)){
                        $response = $response[0];
                        if(password_verify($mdp, $response['password'])){
							$_SESSION['adminSession'] = new AdminEntity(
                                $response['id'],
                                $response['username'],
                                $response['firstName'],
                                $response['lastName'],
                                $response['email'],
                                $response['registerAt']
                            );
							
                            header('Location: /admins');
                        }
                    }

                }
            }
        }else{
			if(isset($_SESSION['adminSession'])){
				unset($_SESSION['adminSession']);
			}
		}

        return $this->render('admins/connection.html.twig');
    }

}


