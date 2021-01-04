<?php

namespace App\Action\Admin;

use App\Core\Controller\AbstractController;

class PersistQuestion extends AbstractController
{
    public function __invoke(int $questionId = null)
    {
        if(isset($_SESSION['adminSession']) && $_SESSION['adminSession']->canAccess()) {
            $connection = $this->getConnection();

            // if i have a question in the params, i should get him
            $question = null;
            $answers = null;
            $themes = null;
            $isCreation = true;

            $sqlThemes = 'select id,nom from themes';
            $statement = $connection->prepare($sqlThemes);
            $statement->execute();
            $themes = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if ($questionId !== null) {
                $isCreation = false;

                $sqlQuestion = 'select * from questions WHERE id=?';
                $statement = $connection->prepare($sqlQuestion);
                $statement->execute([$questionId]);

                $question = $statement->fetch(\PDO::FETCH_ASSOC);

                $sqlReponses = 'select * from possibleanswer where question=?';
                $statement = $connection->prepare($sqlReponses);

                $statement->execute([$questionId]);

                $answers = $statement->fetchAll(\PDO::FETCH_ASSOC);
                if (false === $question) {
                    throw new \Exception('Question non trouvée!', 404);
                }
            }

            $request = $this->getRequest();
            if ($request->getMethod() === 'POST') {
                $formParams = $request->getParsedBody();

                $isTaken = $this->nameTaken(strtolower($formParams['label']),(int)strtolower($formParams['theme']),$connection);
                $emptyAnswer = false;

                for($i =0; $i<4; $i++){
                    if($formParams['answer'.(string)($i+1)] === ''){
                        $emptyAnswer = true;
                    }
                }

                if ($isCreation && (!$isTaken || !$emptyAnswer)) {
                    $sqlQuestion = 'INSERT INTO questions (label, theme) VALUES(?, ?)';
                    $argsQuestion = [strtolower($formParams['label']), strtolower($formParams['theme'])];

                    $sqlReponses = 'INSERT INTO possibleanswer (question,label,isRight) VALUES(?,?,?)';
                    $argsReponses = [];
                } else if(!$isCreation && !$emptyAnswer){
                    $sqlQuestion = 'UPDATE questions SET label=?, theme=? WHERE id=?';
                    $argsQuestion = [strtolower($formParams['label']), strtolower($formParams['theme']), $questionId];

                    $sqlReponses = 'UPDATE possibleanswer SET label=?, isRight=? WHERE id=?';
                    $argsReponses = [];


                    for($i =0; $i<4; $i++){
                        if($i == $formParams['isCorrect']){
                            array_push($argsReponses,[strtolower($formParams['answer'.(string)($i+1)]),1,$answers[$i]['id']]);

                        }else{
                            array_push($argsReponses,[strtolower($formParams['answer'.(string)($i+1)]),0,$answers[$i]['id']]);
                        }
                    }
                }else if($isTaken && $isCreation){
                    return $this->render('admins/persistQuestion.html.twig', [
                        'alert' => ['label'=>'Cette question existe déjà dans la catégorie !'],
                        'saveParams' => [
                            'label' => $formParams['label'],
                            'theme' => $formParams['theme']
                        ]]);
                }else if($emptyAnswer && ($isCreation || !$isCreation)){

                    return $this->render('admins/persistQuestion.html.twig', [
                        'alert' => ['question' => 'Les questions ne doivent pas être vide !'],
                        'question' => $question,
                        'reponses' => $answers,
                        'themes' => $themes,
                        'saveParams' => [
                            'label' => $formParams['label'],
                            'theme' => $formParams['theme']
                        ]]);
                }

                if($isTaken && $isCreation){
                    exit(0);
                }else if($emptyAnswer){
                    exit(0);
                }
                $statementQuestion = $connection->prepare($sqlQuestion);
                $statementResponse = $connection->prepare($sqlReponses);



                if ($statementQuestion->execute($argsQuestion)) {
                    if($isCreation){
                        $sqlQuestionId = 'select id from questions where label=?';
                        $statement = $connection->prepare($sqlQuestionId);
                        $statement->execute([strtolower($formParams['label'])]);
                        $questionId = $statement->fetch(\PDO::FETCH_ASSOC)['id'];

                        for($i =0; $i<4; $i++){
                            if($i == $formParams['isCorrect']){
                                array_push($argsReponses,[$questionId,strtolower($formParams['answer'.(string)($i+1)]),1]);

                            }else{
                                array_push($argsReponses,[$questionId,strtolower($formParams['answer'.(string)($i+1)]),0]);
                            }
                        }
                    }
                    foreach ($argsReponses as $args){
                        $statementResponse->execute($args);
                    }
                    header('Location: /questions');
                    exit(0);
                }

                throw new \Exception('Une erreur est survenue!');
            }

            return $this->render('admins/persistQuestion.html.twig', [
                'question' => $question,
                'reponses' => $answers,
                'themes' => $themes
            ]);
        }else{
            header('Location: /connexion-admin');
			exit(0);
        }
    }

	private function nameTaken(string $label, int $theme, $connection){
		$sql = 'select * from questions WHERE label=? AND theme=?';

		$statement = $connection->prepare($sql);
        $statement->execute([$label,$theme]);

        $question = $statement->fetch(\PDO::FETCH_ASSOC);

		if(!$question){
			return false;
		}

		return true;
	}
}
