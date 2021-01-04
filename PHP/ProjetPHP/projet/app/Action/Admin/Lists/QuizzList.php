<?php

namespace App\Action\Admin\Lists;

use App\Core\Controller\AbstractController;
use App\Entity\Question;
use App\Entity\Theme;
use App\Entity\User;
use App\Entity\Quizz;

class QuizzList extends AbstractController
{
    public function __invoke()
    {
        if(isset($_SESSION['adminSession']) && $_SESSION['adminSession']->canAccess()) {
            $connection = $this->getConnection();

            $sql = 'select * from quizz';

            $statement = $connection->query($sql);

            $listQuizzbuffer = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $listQuizz = array();

            foreach ($listQuizzbuffer as $quizz){
                $sql = 'select * from question_quizz where id_quizz = '.$quizz['id'];

                $statement = $connection->query($sql);
                $listQuestionId = $statement->fetchAll(\PDO::FETCH_ASSOC);
                $listQuestion = array();

                foreach ($listQuestionId as $key=>$questionId){
                    $sql = 'select * from questions where id = '. $questionId['id_question'];
                    $statement = $connection->query($sql);
                    $question = $statement->fetch(\PDO::FETCH_ASSOC);

                    $sql = 'select * from themes where id = '.$question['theme'];
                    $statement = $connection->query($sql);
                    $theme = $statement->fetch(\PDO::FETCH_ASSOC);

                    $theme = new Theme($theme['id'], $theme['nom']);

                    array_push($listQuestion, new Question(
                        $question['id'],
                        $question['label'],
                        $theme
                    ));

                }



                if($quizz['user2'] !== null){
                    $sql = 'select * from users where id in ('.$quizz['user1'].','.$quizz['user2'].')';
                }else{
                    $sql = 'select * from users where id = '.$quizz['user1'];
                }

                $statement = $connection->query($sql);
                $users = $statement->fetchAll(\PDO::FETCH_ASSOC);


                $user1 = new User(
                    $users[0]['id'],
                    $users[0]['username'],
                    $users[0]['firstName'],
                    $users[0]['lastName'],
                    $users[0]['email'],
                    $users[0]['registerAt'],
                    $users[0]['point']
                );
                if($quizz['user2'] !== null){
                    $user2 = new User(
                        $users[1]['id'],
                        $users[1]['username'],
                        $users[1]['firstName'],
                        $users[1]['lastName'],
                        $users[1]['email'],
                        $users[1]['registerAt'],
                        $users[1]['point']
                    );
                }else{
                    $user2 = null;
                }

                $winner = ($quizz['winner'] == $user1->getId()) ? $user1 : $user2;
                array_push($listQuizz,new Quizz(
                    $quizz['id'],
                    $quizz['mode'],
                    $listQuestion,
                    $user1,
                    $quizz['startAt'],
                    $user2,
                    $winner
                ));
            }

            return $this->render('admins/list/quizzList.html.twig', ['listeQuizz' => $listQuizz]);
        }else {
            header('Location: /connexion-admin');
            exit(0);
        }
    }
}