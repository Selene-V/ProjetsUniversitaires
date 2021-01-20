#!/usr/bin/env php
<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Command\StartWebSocketServer;
use App\Command\TemplateClearCache;
use Symfony\Component\Console\Application;

$application = new Application();

$application->add(new TemplateClearCache());

$application->add(new StartWebSocketServer());

$application->run();
