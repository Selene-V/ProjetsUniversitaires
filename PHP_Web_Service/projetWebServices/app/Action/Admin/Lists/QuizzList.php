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



                    $questionH = new Question();
                    $questionH->hydrate([
                        'id' => $question['id'],
                        'label' => $question['label'],
                        'theme' => $theme['id']
                    ]);
                    array_push($listQuestion, $questionH);

                }



                if($quizz['user2'] !== null){
                    $sql = 'select * from users where id in ('.$quizz['user1'].','.$quizz['user2'].')';
                }else{
                    $sql = 'select * from users where id = '.$quizz['user1'];
                }

                $statement = $connection->query($sql);
                $users = $statement->fetchAll(\PDO::FETCH_ASSOC);


                $user1 = new User();
                $user1->hydrate($users[0]);
                if($quizz['user2'] !== null){
                    $user2 = new User();
                    $user2->hydrate($users[1]);
                    $user2 = $user2->getId();
                }else{
                    $user2 = null;
                }

                $winner = ($quizz['winner'] == $user1->getId()) ? $user1 : $user2;
                $quizzH = new Quizz();

                array_push($listQuizz, $quizzH->hydrate([
                        'id' => $quizz['id'],
                        'mode' => $quizz['mode'],
                        'questions' => $listQuestion,
                        'user1' => $user1->getId(),
                        'startAt' => $quizz['startAt'],
                        'user2' => $user2,
                        'winner' => $winner
                ]));
            }

            return $this->render('admins/list/quizzList.html.twig', ['listeQuizz' => $listQuizz]);
        }else {
            header('Location: /connexion-admin');
            exit(0);
        }
    }
}