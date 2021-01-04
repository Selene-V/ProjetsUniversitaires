<?php

namespace App\Action\Admin;

use App\Core\Controller\AbstractController;

class PersistTheme extends AbstractController
{
    public function __invoke(int $themeId = null)
    {
        if(isset($_SESSION['adminSession']) && $_SESSION['adminSession']->canAccess()) {
            $connection = $this->getConnection();

            // if i have a theme in the params, i should get him
            $theme = null;
            $isCreation = true;

            if ($themeId !== null) {
                $isCreation = false;

                $sql = 'select * from themes WHERE id=?';
                $statement = $connection->prepare($sql);
                $statement->execute([$themeId]);

                $theme = $statement->fetch(\PDO::FETCH_ASSOC);
                if (false === $theme) {
                    throw new \Exception('Thème non trouvé!', 404);
                }
            }

            $request = $this->getRequest();
            if ($request->getMethod() === 'POST') {
                $formParams = $request->getParsedBody();
                $isTaken = $this->nameTaken(strtolower($formParams['nom']),$connection);
				
                if ($isCreation && !$isTaken) {
                    $sql = 'INSERT INTO themes (nom) VALUES(?)';
                    $args = [strtolower($formParams['nom'])];
                } else if(!$isCreation){
                    $sql = 'UPDATE themes SET nom=? WHERE id=?';
                    $args = [strtolower($formParams['nom']), $themeId];
                } else if($isTaken){
                    return $this->render('admins/persistTheme.html.twig', [
                        'alert' => ['nom'=>'Ce thème existe déjà !'],
                        'saveParams' => [
                            'nom' => $formParams['nom']
                    ]]);
                }

                if($isTaken && $isCreation){
                    exit(0);
                }

                $statement = $connection->prepare($sql);


                if ($statement->execute($args)) {
                    header('Location: /themes');
                    exit(0);
                }

                throw new \Exception('Une erreur est survenue!');
            }

            return $this->render('admins/persistTheme.html.twig', [
                'theme' => $theme
            ]);
        }else{
            header('Location: /connexion-admin');
			exit(0);
        }
    }

	private function nameTaken(string $nom, $connection){
		$sql = 'select * from themes WHERE nom=?';

		$statement = $connection->prepare($sql);
        $statement->execute([$nom]);

        $theme = $statement->fetch(\PDO::FETCH_ASSOC);

		if(!$theme){
			return false;
		}

		return true;
	}
}
