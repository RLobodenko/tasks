<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $userMove = $_POST['UserMove'];    
    $moves = ['stone','paper','scissors'];
    $computerMove = $moves[array_rand($moves)];
    $game = new Game($moves);
    $key = $game->generateKey();
    $hmacMessage = $game->generateHMAC($key, $computerMove);
    $message = $game->deetermineWinner($userMove, $computerMove);
    echo "<p>Move computer $computerMove</p>";
    echo "<p><b>HMAC:</b> $hmacMessage</p>";
    echo "<p>$message </p>";
    echo "<p><b>HMAC key:</b> $key</p>";
}
class Game{
    private $moves;

    public function __construct($moves){
        $this->moves = $moves;
    }
    
    public function deetermineWinner($userMove, $computerMove){
        $n = count($this->moves);
        $id_1 = array_search($userMove, $this->moves);
        $id_2 = array_search($computerMove, $this->moves);

        if($id_1 === false || $id_2 === false){
            return '<p>Invalid move</p>';
        }
        if($id_1 == $id_2){
            return '<p>Draw</p>';
        }elseif ((intval($id_1) + intval($n / 2)) % $n == intval($id_2)){
            return '<p>Computer win</p>';
        }
        else{
            return '<p>You win</p>';
        }
    }
    public function generateHMAC($key, $message){
        return hash_hmac('sha256', $message, $key);
    }

    public function generateKey(){
        return bin2hex(random_bytes(32));
    }

    public function printHelp(){
        echo '<p>Rules</p>';
        $n = count($this->moves);
        foreach($this->moves as $index=>$move){
            $nextMove = $this->moves[($index + 1) % $n];
            echo "<p>$move vs $nextMove: $move wins</p>";
        }

    }
}