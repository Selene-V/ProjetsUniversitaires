<?php

use Hoa\Event\Bucket;
use Hoa\Socket\Server;
use Hoa\Websocket\Server as WsServer;

require_once(__DIR__ . '/../vendor/autoload.php');

$server = new Server('ws://127.0.0.1:8889');
$websocket = new WsServer($server);

$websocket->on('open', function (Bucket $bucket) {
    echo 'Un utilisateur vient de se connecter : ' . $bucket->getSource()->getConnection()->getCurrentNode()->getId();
});

$websocket->on('message', function (Bucket $bucket) {
    $data = json_decode($bucket->getData()['message'], true);

    echo '<pre>';print_r($data);
    //var_dump($data, $bucket->getSource()->getConnection()->getCurrentNode()->getId());
});

echo "WebSocket Server is listening on port 8889\n";
$websocket->run();
