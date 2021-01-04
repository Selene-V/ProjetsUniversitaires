<?php

namespace App\Action\Admin;

use App\Core\Controller\AbstractController;

class DeleteQuestion extends AbstractController
{
    public function __invoke(int $questionId)
    {
        if(isset($_SESSION['adminSession']) && $_SESSION['adminSession']->canAccess()) {
            $connection = $this->getConnection();

            $sql = 'select * from questions WHERE id=?';
            $statement = $connection->prepare($sql);
            $statement->execute([$questionId]);

            $question = $statement->fetch(\PDO::FETCH_ASSOC);

            if (false === $question) {
                throw new \Exception('Question non trouvée!', 404);
            }

            $sql = 'DELETE FROM questions WHERE id=:questionId';
            $statement = $connection->prepare($sql);
            $statement->bindParam('questionId', $questionId, \PDO::PARAM_INT);

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
