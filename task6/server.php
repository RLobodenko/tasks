<?php
require __DIR__ . '/vendor/autoload.php';
//$conn = new mysqli('localhost', 'root', 'root', 'task4');
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

class WebSocketServer implements MessageComponentInterface {
    protected $clients;
    protected $coordinates;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->coordinates = array(); // Массив для хранения координат
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg, true);
        //if($data['action'] == 'list'){
          //  $from->send(json_encode($this->coordinates));
        //}
        if (isset($data['x']) && isset($data['y'])) {
            $x = $data['x'];
            $y = $data['y'];
            $this->coordinates[] = [$x, $y];
            


            $from->send(json_encode($this->coordinates));
        } else {
            $from->send(json_encode($this->coordinates));
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new WebSocketServer()
        )
    ),
    8081
);

echo "Server started at ws://localhost:8081\n";

$server->run();