<?php
require_once("model/GameState.php");
session_start();
if(!isset($_POST['player_action'])){
    header("Location: ./index.php");
    exit;
}
if(!isset($_SESSION['game_state'])){
    header("Location: ./index.php");
    exit;
}
$state = $_SESSION['game_state'];
if($_POST['player_action'] == "hit"){
    $state->dealToPlayer();
}
header("Location: ./index.php");
exit;