<?php

namespace App\Action\Admin\Lists;

use App\Core\Controller\AbstractController;

class QuestionList extends AbstractController
{
    public function __invoke(int $themeId = null)
    {
        if(isset($_SESSION['adminSession']) && $_SESSION['adminSession']->canAccess()) {

            $connection = $this->getConnection();

            if ($themeId !== null){

                $sql = 'SELECT questions.id, themes.nom, questions.label from questions inner join themes on themes.id = questions.theme where questions.theme =?';
                $statement = $connection->prepare($sql);
                $statement->execute([$themeId]);

                $questionsParTheme = $statement->fetchAll(\PDO::FETCH_ASSOC);
                $themeName = $questionsParTheme[0]['nom'];

                return $this->render('admins/list/questionList.html.twig',
                    [
                        'questions' => $questionsParTheme,
                        'theme' => ['nom' => $themeName]
                    ]
                );
            }else{
                $connection = $this->getConnection();

                $sql = 'SELECT questions.id, themes.nom, questions.label from questions inner join themes on themes.id = questions.theme';
                $statement = $connection->query($sql);

                $questions = $statement->fetchAll(\PDO::FETCH_ASSOC);


                return $this->render('admins/list/questionList.html.twig', ['questions' => $questions]);

            }

        }else {
            header('Location: /connexion-admin');
            exit(0);
        }
    }
}
