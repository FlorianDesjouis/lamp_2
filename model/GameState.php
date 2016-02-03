<?php
require_once("Player.php");
require_once("Bank.php");
require_once("Deck.php");
class GameState{
    public $player;
    public $bank;
    public $deck;
    public function __construct($playername){
        $this->player = new Player($playername);
        $this->bank = new Bank();
        $this->deck = new Deck();
    }
    public function initialDeal(){
        $this->deck->shuffle();
        $this->bank->take($this->deck->deal(2));
        $this->player->take($this->deck->deal(2));
    }
    public function dealToPlayer(){
        $this->player->take($this->deck->deal(1));
    }
}