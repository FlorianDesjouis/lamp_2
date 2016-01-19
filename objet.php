<?php

class Animal{
  protected $espece,$nom,$vitesse;

  public function __construct($nom, $espece){
    $this->nom = $nom;
    $this->espece = $espece;
    $this->vitesse = 0;
  }
  function crier(){
    return "??? ".$this->nom."<br>";
  }

  function setEspece($newEspece){
    echo "Passage par le labo <br>";
    $this->espece = $newEspece;
  }

  function getEspece(){
    return $this->espece;
  }

  public function manger($nourriture){
    echo "Ingestion de ".$nourriture."<br>";
    $this->digerer($nourriture);
    echo "Fini !<br>";
  }
  private function digerer($nourriture){
    echo "Digestion de ".$nourriture." en cours <br>";
  }

  function courir(){
    $this->vitesse++;
    return $this->nom." court à ".$this->vitesse." km/h<br>";
  }

}

class Cat extends Animal{
  public function __construct($nom){
    $this->nom = $nom;
    $this->espece = "chat";
    $this->vitesse = 0;
  }
  function crier(){
    return "Miaou ".$this->nom." !<br>";
  }
}
class Dog extends Animal{
  public function __construct($nom){
    $this->nom = $nom;
    $this->espece = "chien";
    $this->vitesse = 0;
  }
  function crier(){
    return "Wouaf ".$this->nom." !<br>";
  }
}

// $jc = new Animal("JC","rat");
// echo $jc->crier();
// $felix = new Cat("Felix");
// echo $felix->crier();

// $rex = new Dog("Rex");
// echo $rex->crier();

// var_dump($felix instanceof Animal);
// var_dump($rex instanceof Animal);
// var_dump($rex instanceof Cat);

// die();

class Animalerie{
  function buyAnimal($espece, $name){
    if($espece == "chat"){
      $c = new Cat($name);
      return $c;
    }else if($espece == "chien"){
      $c = new Dog($name);
      return $c;
    }else{
      throw new Exception("Désolé nous n'en avons plus !");
    }
  }

  function toiletter(Animal $animal){
    if($animal instanceof Cat){
      echo "toilette sèche <br>";
      return;
    }
    if($animal instanceof Dog){
      echo "toilette mouillée <br>";
      return;
    }

    if(!($animal instanceof Animal)){
      throw new Exception("Nous ne lavons que les animaux !");
    }else{
      echo "on va voir ce qu'on peut faire...<br>";
    }
  }
}

class Human{}

$animalerie = new Animalerie();
$felix = $animalerie->buyAnimal("chat", "Felix");
echo $felix->crier();
$animalerie->toiletter($felix);


var_dump($felix);
//$julien = new Human("Julien","Humain");
$julien = new Human();
//echo $julien->crier();
$animalerie->toiletter($julien);

die();

$eric = new Animal("Eric","rat");
//$eric->espece = "chat"; //erreur
//echo $eric->espece;
echo $eric->getEspece()."<br>";
$eric->setEspece("chat")."<br>";
echo $eric->getEspece()."<br>";

$eric->manger("croquette");

$jc = new Animal("Anna","loutre");
echo $jc->crier();

$clio = new Vehicule();
$clio->plaque = "JX-768PO";
echo $clio->rouler();
echo $clio->rouler();
echo $clio->rouler();
echo $clio->rouler();

