<?php
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: *');
header('Cross-Origin-Resource-Policy: cross-origin');

require_once __DIR__. '/../app/Entity/Admin.php';
require_once __DIR__. '/../app/Entity/User.php';
require_once __DIR__. '/../app/Entity/PossibleAnswer.php';
require_once __DIR__. '/../app/Entity/Question.php';
require_once __DIR__. '/../app/Entity/Theme.php';
require_once __DIR__. '/../app/Entity/Quizz.php';
session_start();
if(!isset($_SESSION)){
	$_SESSION['isAdminConnected'] = false;
	$_SESSION['isUserConnected'] = false;
	$_SESSION['userToken'] = null;
}



use App\Core\App;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator($psr17Factory, $psr17Factory, $psr17Factory, $psr17Factory);
$request = $creator->fromGlobals();

$app = new App();
$app->handle($request);
