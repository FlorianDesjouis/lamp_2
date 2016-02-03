<?php
class Player{
    protected $hand; //sert à stocker les cartes ue le joueur possède
    protected $pseudo;
    public function __construct($toto){
        $this->hand = [];
        $this->pseudo = $toto;
    }
    public function getHand(){
        return $this->hand;
    }
    public function take($cards){ //$cards = [Card,Card]
        //TODO : récupère les cartes passées en paramètre
        //et les place dans $this->hand'
        foreach($cards as $card){
            $this->hand[] = $card;
        }
    }
    public function getHandValue(){
        $panier = 0;
        foreach($this->hand as $card){
            $panier += $card->getValue();
        }
        return $panier;
    }
}