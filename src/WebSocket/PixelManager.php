<?php
namespace App\Controller;

use App\Repository\PixelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Ratchet\ConnectionInterface;
use Ratchet\WebSocket\MessageComponentInterface;


class PixelManager implements MessageComponentInterface{
    protected $clients;
    private $em;
    public function __construct(EntityManagerInterface $em) {
        $this->clients = new \SplObjectStorage;
        $this->em = $em;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        // echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
        //     , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        $pixel = json_decode($msg, true);
        $pixelRepository = $this->em->getRepository('App\Entity\Pixel');
        try{
            $pixelRepository->addPixelToDatabase($pixel['x'], $pixel['y'], $pixel['hexcolor']);
        }
        catch (\Exception $e){
            echo "Error adding pixel to database";
        }
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}