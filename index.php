<?php

if(isset($_POST['choice'])){
    //do stuff pour envoi post
    header("Location: index.php");
    exit;
}
//stuff pour tout le monde
require('card.php');
//SCENARIO 1

$deck = new Deck();
$deck->shuffle();
$bank = new Bank();
$player = new Player($hand[]);
$_SESSION['game_state'] = new GameState();
$bank->take($deck->deal(2));
$player->take($deck->deal(2));
//tire 2 cartes du deck, la banque les prends

while( $player->getHandValue() < 21){// || jusqu'à ce que le joueur arrête de tirer
    $player->take($deck->deal(1));
}

if($player->getHandValue() > 21){
    echo "Le joueur perd ".$player->getHandValue();
    echo "La banque gagne";
}elseif($player->getHandValue() > $bank->getHandValue()){
    echo "Le joueur gagne";
}else{
    echo "Le joueur a ".$player->getHandValue();
    echo "Le joueur perd ".$player->getHandValue();
}

while( $bank->getHandValue() < 17){
    //tant que la banque a moins de 17, elle tire
    $bank->take($deck->deal(1));
}
if($bank->getHandValue() > 21){
    echo "La banque perd ".$bank->getHandValue();
    echo "Le joueur gagne !";
}elseif($bank->getHandValue() > $player->getHandValue()){
    echo "La banque gagne";
}else{
    echo "La banque a ".$bank->getHandValue();
    echo "La banque perd ".$bank->getHandValue();
}

if($player->getHandValue() == $bank->getHandValue()){
    echo "Egalité !";
}

$serialized = serialize($_SESSION['game_state']);
?>
