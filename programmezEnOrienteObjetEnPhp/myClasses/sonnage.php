<?php

class Personnage
{
  private $_force;
  private $_localisation = 'Non Défini';
  private $_experience;
  private $_degats;

  // Déclarations des constantes en rapport avec la force.
  const FORCE_PETITE = 20;
  const FORCE_MOYENNE = 50;
  const FORCE_GRANDE = 80;

  public function afficherForce(){
    echo 'Force grande vaut : ' .self::FORCE_GRANDE.'<br>';
    echo 'Force moyenne vaut : '.self::FORCE_MOYENNE.'<br>';
    echo 'Force petite vaut : '.self::FORCE_PETITE.'<br>';
  }


  // Constructeur
  public function __construct($forceInitial) 
  {
    $this->setForce($forceInitial);
  }

 

  public function frapper(){
    echo' je vais tous vous frapper';
  }

  public function deplacer(){

  }

  public function gagnerExperience(){

  }

  public static function parler(){
    echo' je vais tous vous tuer';
  }








  //SETTER
  public function setForce($force)
  {
    $this->_force = $force;
  }

  public function setDegats($degats)
  {
    $this->_degats = $degats;
  }

  public function setExperience($experience)
  {
    $this->_experience = $experience;
  }

  public function setLocalisation($localisation){
    $this->_localisation = $localisation;
  }


  //GETTER
  public function getForce()
  {
    return $this->_force;
  }

  public function getDegats()
  {
    return $this->_degats;
  }

  public function getExperience()
  {
    return $this->_experience;
  }

  public function getLocalisation(){
    return $this->_localisation;
  }


  


  


  

}