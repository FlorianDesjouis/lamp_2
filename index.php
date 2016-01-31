<?php

if(isset($_POST['choice'])){
    //do stuff pour envoi post
    header("Location: index.php");
    exit;
}
//stuff pour tout le monde
require('card.php');
//SCENARIO 1

if(empty($_SESSION['game_state'])){
    $_SESSION['game_state'] = new GameState();
    $deck = new Deck();
    $deck->shuffle();
    $bank = new Bank();
    $player = new Player($hand[]);
}else{
    $deck = $_SESSION['game_state']->$deck;
    $bank = $_SESSION['game_state']->$bank;
    $player = $_SESSION['game_state']->$player;
}

$bank->take($deck->deal(2));
$player->take($deck->deal(2));

while( $player->getHandValue() < 21){// || jusqu'à ce que le joueur arrête de tirer
    $player->take($deck->deal(1));
}

if($player->getHandValue() > 21){
    echo "Le joueur perd ".$player->getHandValue();
    echo "La banque gagne";
    unset($_SESSION['game_state']);
}elseif($player->getHandValue() > $bank->getHandValue()){
    echo "Le joueur gagne";
    unset($_SESSION['game_state']);
}else{
    echo "Le joueur a ".$player->getHandValue();
    echo "Le joueur perd ".$player->getHandValue();
    unset($_SESSION['game_state']);
}

while( $bank->getHandValue() < 17){
    //tant que la banque a moins de 17, elle tire
    $bank->take($deck->deal(1));
}
if($bank->getHandValue() > 21){
    echo "La banque perd ".$bank->getHandValue();
    echo "Le joueur gagne !";
    unset($_SESSION['game_state']);
}elseif($bank->getHandValue() > $player->getHandValue()){
    echo "La banque gagne";
    unset($_SESSION['game_state']);
}else{
    echo "La banque a ".$bank->getHandValue();
    echo "La banque perd ".$bank->getHandValue();
    unset($_SESSION['game_state']);
}

if($player->getHandValue() == $bank->getHandValue()){
    echo "Egalité !";
    unset($_SESSION['game_state']);
}

$serialized = serialize($_SESSION['game_state']);
?>
