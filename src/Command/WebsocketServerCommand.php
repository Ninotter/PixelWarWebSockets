<?php
namespace App\Command;

use App\Controller\PixelManager;
use Doctrine\ORM\EntityManagerInterface;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
 
class WebsocketServerCommand extends Command
{
    protected static $defaultName = "run:websocket-server";
    private $em;

    public function __construct(EntityManagerInterface $em) 
    {
        $this->em = $em;
        parent::__construct();
    }
    
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $port = 8080;
        $output->writeln("Starting server on port " . $port);
        $server = IoServer::factory(new HttpServer(new WsServer(new PixelManager($this->em))),$port);

        $server->run();
        return 0;

    }
}