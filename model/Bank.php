<?php
require_once("Player.php");
class Bank extends Player{
    public function __construct(){
        parent::__construct("Banque");
    }
}
