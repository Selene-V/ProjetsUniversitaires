<?php

namespace App\Action\Admin;

use App\Core\Controller\AbstractController;

class DeleteTheme extends AbstractController
{
    public function __invoke(int $themeId)
    {
        if(isset($_SESSION['adminSession']) && $_SESSION['adminSession']->canAccess()) {
            $connection = $this->getConnection();

            $sql = 'select * from themes WHERE id=?';
            $statement = $connection->prepare($sql);
            $statement->execute([$themeId]);

            $theme = $statement->fetch(\PDO::FETCH_ASSOC);

            if (false === $theme) {
                throw new \Exception('Thème non trouvé!', 404);
            }

            $sql = 'DELETE FROM themes WHERE id=:themeId';
            $statement = $connection->prepare($sql);
            $statement->bindParam('themeId', $themeId, \PDO::PARAM_INT);

            if ($statement->execute()) {
                if ($this->getRequest()->getMethod() === 'GET') {
                    header('Location: /admins');
                    exit(0);
                }

                exit(0);
            }

            throw new \Exception('Une erreur est survenue!');
        }else{
            header('Location: /connexion-admin');
			exit(0);
        }
		exit(0);
    }

}
