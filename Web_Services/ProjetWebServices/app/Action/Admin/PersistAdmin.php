<?php

namespace App\Action\Admin;

use App\Core\Controller\AbstractController;
use App\Entity\Admin;
use App\Validator\Validator;

class PersistAdmin extends AbstractController
{
    public function __invoke(int $adminId = null)
    {
        if(isset($_SESSION['adminSession']) && $_SESSION['adminSession']->canAccess()) {
            $connection = $this->getConnection();

            // if i have an admin in the params, i should get him
            $errors = null;
            $admin = null;
            $isCreation = true;
            $validator = new Validator();

            $request = $this->getRequest();
            if ($adminId !== null ) {
                $isCreation = false;
                if($request->getMethod() !== 'POST') {
                    $sql = 'select * from admins WHERE id=?';
                    $statement = $connection->prepare($sql);
                    $statement->execute([$adminId]);

                    $admin = $statement->fetch(\PDO::FETCH_ASSOC);
                    if (false === $admin) {
                        throw new \Exception('Administrateur non trouvé!', 404);
                    }
                    $admin = new Admin(
                        $admin['id'],
                        $admin['username'],
                        $admin['firstName'],
                        $admin['lastName'],
                        $admin['email'],
                        $admin['registerAt']
                    );
                }
            }

            if ($request->getMethod() === 'POST') {
                $formParams = $request->getParsedBody();

                $validPass['valid'] = true;

                if($isCreation){
                    $validPass = $validator->validPassword($formParams['password']);
                }

                $isTaken = $validator->nameTaken(strtolower($formParams['username']),$connection);


                if ($adminId !== null) {
                    $admin = new Admin(
                        0,
                        $formParams['username'],
                        $formParams['firstName'],
                        $formParams['lastName'],
                        $formParams['email'],
                        date("Y-m-d H:i:s")
                    );
                }

                if ($isCreation && !$isTaken) {
                    $admin = new Admin(
                        0,
                        $formParams['username'],
                        $formParams['firstName'],
                        $formParams['lastName'],
                        $formParams['email'],
                        date("Y-m-d H:i:s"),
                        $formParams['password']
                    );

                    if(!$validator->validate($admin)){
                        $errors = $validator->getErrors();
                        return $this->render('admins/persistAdmin.html.twig', [
                            'alert' => $errors,
                            'saveParams' => [
                                'username' => $formParams['username'],
                                'firstName' => $formParams['firstName'],
                                'lastName' => $formParams['lastName'],
                                'email' => $formParams['email'],
                                'password' => $formParams['password']
                            ]]);
                    }else{

                        $mdpCrypte = password_hash($formParams['password'], PASSWORD_DEFAULT);
                        $sql = 'INSERT INTO admins(username, firstName, lastName, email, registerAt, password) VALUES(?, ?, ?, ?, NOW(), ?)';
                        $args = [strtolower($formParams['username']), strtolower($formParams['firstName']), strtolower($formParams['lastName']), strtolower($formParams['email']), $mdpCrypte];
                    }
                } else if(!$isCreation){
                    if(!$validator->validate($admin)){
                        $errors = $validator->getErrors();
                        return $this->render('admins/persistAdmin.html.twig', [
                            'alert' => $errors,
                            'admin' => $admin,
                            'saveParams' => [
                                'username' => $formParams['username'],
                                'firstName' => $formParams['firstName'],
                                'lastName' => $formParams['lastName'],
                                'email' => $formParams['email']
                            ]]);
                    }else {
                        $sql = 'UPDATE admins SET username=?, firstName=?, lastName=?, email=? WHERE id=?';
                        $args = [strtolower($formParams['username']), strtolower($formParams['firstName']), strtolower($formParams['lastName']), strtolower($formParams['email']), $adminId];
                    }
                } else if($isTaken && $isCreation){
                    return $this->render('admins/persistAdmin.html.twig', [
                        'alert' => ['username'=>'nom d\'utilisateur déjà utilisé'],
                        'saveParams' => [
                            'username' => $formParams['username'],
                            'firstName' => $formParams['firstName'],
                            'lastName' => $formParams['lastName'],
                            'email' => $formParams['email'],
                            'password' => $formParams['password']
                    ]]);
                }else if(!$validPass['valid'] && $isCreation) {
                    return $this->render('admins/persistAdmin.html.twig', [
                        'alert' => ['password' => $validPass['alert']],
                        'saveParams' => [
                            'username' => $formParams['username'],
                            'firstName' => $formParams['firstName'],
                            'lastName' => $formParams['lastName'],
                            'email' => $formParams['email'],
                            'password' => $formParams['password']
                        ]]);
                }

                if($isTaken  && $isCreation){
                    exit(0);
                }elseif (!$validPass['valid'] && $isCreation){

                    exit(0);
                }

                if($errors !== null){

                    exit(0);
                }

                $statement = $connection->prepare($sql);


                if ($statement->execute($args)) {
                    header('Location: /admins');
                    exit(0);
                }

                throw new \Exception('Une erreur est survenue!');
            }

            return $this->render('admins/persistAdmin.html.twig', [
                'admin' => $admin,
                'saveParams' => null
            ]);
        }else{
            header('Location: /connexion-admin');
			exit(0);
        }
    }
}
