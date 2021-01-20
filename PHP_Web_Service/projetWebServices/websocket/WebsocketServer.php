<?php

use Hoa\Event\Bucket;
use Hoa\Socket\Server;
use Hoa\Websocket\Server as WsServer;

require_once(__DIR__ . '/../vendor/autoload.php');



$server = new Server('ws://127.0.0.1:8889/');
$websocket = new WsServer($server);

$users = [];
$userWaiting = null;
$ongoingDuels = [];

$websocket->on('open', function (Bucket $bucket) use ($websocket) {
    echo "\n\nConnection established with user : " . $bucket->getSource()->getConnection()->getCurrentNode()->getId();
    $userNode = $bucket->getSource()->getConnection()->getCurrentNode();

    $websocket->send(json_encode([
        'type' => 'connect',
        'message' => true
    ]), $userNode);
});

$websocket->on('message', function (Bucket $bucket) use (&$users, $websocket, &$userWaiting, &$ongoingDuels) {
    $data = json_decode($bucket->getData()['message'], true);
    $userNode = $bucket->getSource()->getConnection()->getCurrentNode();
    $userNodeId = $userNode->getId();

    switch ($data['type']) {
        case 'connect':
            $users[$data['user_id']] = $userNode;
            break;
        case 'is_user_waiting':
            if($userWaiting !== null){
                $websocket->send(json_encode([
                    'type' => 'is_user_waiting',
                    'message' => true,
                    'theme_id' => $userWaiting['theme_id'],
                    'quizz_id' => $userWaiting['quizz_id'],
                    'user1' => $userWaiting['user_id']
                ]), $userNode);
            }else{
                $websocket->send(json_encode([
                    'type' => 'is_user_waiting',
                    'message' => false
                ]), $userNode);
            }
            break;
        case 'quizz_duel_start':
            // il y a un utilisateur en attente de jouer
            if ($userWaiting !== null && $userWaiting['user_id'] !== getUserIdFromNode($users ,$userNodeId)) {
                echo "\n\nA new user has joined, let the quiz begin !";

                array_push( $ongoingDuels ,[
                    'user1' => $userWaiting['user_id'],
                    'user2' => getUserIdFromNode($users, $userNodeId),
                    'questions' => $userWaiting['questions'],
                ]);

                $websocket->send(json_encode([
                    'type' => 'starting_second',
                    'questions' => $userWaiting['questions'],
                    'adversary' => $userWaiting['user_id'],
                    'theme' => $userWaiting['theme_name']
                ]), $userNode);

                $websocket->send(json_encode([
                    'type' => 'starting_first',
                    'questions' => $userWaiting['questions'],
                    'adversary' => getUserIdFromNode($users, $userNodeId)
                ]), $users[$userWaiting['user_id']]);
                $userWaiting = null;
            } else {
                echo "\n\nA theme was selected by user : " . $userNodeId;
                $userId = getUserIdFromNode($users, $userNodeId);
                $questions = $data['questions']; // get 4 questions from db
                $quizzId = $data['quizz_id'];
                $themeId = $data['theme_id'];
                $themeName = $data['theme_name'];
                $userWaiting = [
                    'user_id' => $userId,
                    'theme_id'=> $themeId,
                    'theme_name' => $themeName,
                    'quizz_id' => $quizzId,
                    'questions' => $questions
                ];

                $websocket->send(json_encode([
                    'type' => 'no_player',
                    'message' => $questions
                ]), $userNode);
            }
            break;
        case 'quizz_duel_respond':
            $questionNumber = $data['questionNumber'];
            echo "\na user as responded (turn ".($questionNumber+1)."/4)";
            $websocket->send(json_encode([
                'type' => 'need_to_wait'
            ]), $userNode);

            $user = getUserNodeFromId($users, $data['receiver']);

            $websocket->send(json_encode([
                'type' => 'need_to_respond',
                'question' => $questionNumber
            ]), $user);

            break;
        case 'end_quizz':
            echo "\n\nquizz ended";

            $websocket->send(json_encode([
                'type' => 'finish_quizz'
            ]), $userNode);

            $user = getUserNodeFromId($users, $data['user1_id']);

            $websocket->send(json_encode([
                'type' => 'finish_quizz',
                'quizz_id' => $data['quizz_id'],
                'score' => $data['score']
            ]), $user);

            break;
        case 'send_scores_user2':
            echo "\n\nUser1 sent user2 his score";
            $websocket->send(json_encode([
                'type' => 'close_connection'
            ]), $userNode);

            $user = getUserNodeFromId($users, $data['user2_id']);

            $websocket->send(json_encode([
                'type' => 'close_connection',
                'quizz_id' => $data['quizz_id'],
                'score_user1' => $data['score']
            ]), $user);
            break;
    }
});

$websocket->on('close', function (Bucket $bucket) use (&$users, &$ongoingDuels, $websocket) {
    $userNode = $bucket->getSource()->getConnection()->getCurrentNode();
    $userNodeId = $userNode->getId();

    echo "\n\nLost connection with user : " . $userNodeId;
    echo "\nRemoving related variables from users and ongoingDuels\n";
    foreach ($ongoingDuels as $index => $duel){

        $user1 = getUserNodeFromId($users, $ongoingDuels[$index]['user1']);
        $user2 = getUserNodeFromId($users, $ongoingDuels[$index]['user2']);

        if(in_array(getUserIdFromNode($users, $userNodeId), $duel)){
            if($userNodeId === $user2->getId()){
                echo "\n\nuser2 was disconnected contacting user1";
                $websocket->send(json_encode([
                        'type' => 'lost_adversary'
                ]),$user1);
            }else{
                echo "\n\nuser1 was disconnected contacting user2";
                $websocket->send(json_encode([
                    'type' => 'lost_adversary'
                ]),$user2);
            }
            unset($ongoingDuels[$index]);
        }

    }

    foreach ($users as $userId => $node) {
        if ($node->getId() === $userNodeId) {
            unset($users[$userId]);
        }
    }

});

function getUserIdFromNode($users, $userNodeId) {
    foreach ($users as $id => $node) {
        if ($node->getId() === $userNodeId) {
            return $id;
        }
    }
    return null;
}

function getUserNodeFromId($users,$userId){
    foreach ($users as $id =>$node) {
        if($id === $userId){
            return $node;
        }
    }
}

echo "WebSocket Server is listening on port 8889\n\n";
$websocket->run();




