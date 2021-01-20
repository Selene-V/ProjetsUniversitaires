<?php


namespace App\Command;

use App\Core\Config\Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StartWebSocketServer extends Command
{
    protected static $defaultName = 'ws:start-server';

    protected function configure()
    {
        $this
            ->setDescription('Start webSocket Server')
            ->setHelp('This command allows you to start the websocket Server')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $serverDirectory = realpath(Config::config('websocket_server'));

        if (is_dir($serverDirectory)) {
            $isWindows = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
            if ($isWindows) {
                $cmd = sprintf('php '. $serverDirectory .'WebsocketServer.php');
            } else {
                $cmd = sprintf('php '. $serverDirectory .'WebsocketServer.php');
            }

            exec($cmd);
        }

        return 0;
    }
}