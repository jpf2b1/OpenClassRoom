<?php

class Personnage{

    //LES ATTRIBUTS
    private $_id;
    private $_degats;
    private $_nom;


    //FUNCTION HYDRATE
    public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
        $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
    }



    //CONSTRUCTEUR
    public function __construct(array $donnees)
    {
      $this->hydrate($donnees);
    }




    //LES CONSTANTES
    const CEST_MOI = 1;
    const PERSONNAGE_TUE = 2;
    const PERSONNAGE_FRAPPE = 3;

    //LES METHODES
    Public function frapper(Personnage $perso){
        return $perso->recevoirDegats();
    }

    Public function recevoirDegats(){
        $this->_degats += 5;
    
        // Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
        if ($this->_degats >= 100)
        {
          return self::PERSONNAGE_TUE;
        }
        
        // Sinon, on se contente de dire que le personnage a bien été frappé.
        return self::PERSONNAGE_FRAPPE;
    }

    //GETTERS
    public function degats()
    {
      return $this->_degats;
    }
    
    public function id()
    {
      return $this->_id;
    }
    
    public function nom()
    {
      return $this->_nom;
    }
    

    //SETTERS
    public function setDegats($degats)
    {
      $degats = (int) $degats;
      
      if ($degats >= 0 && $degats <= 100)
      {
        $this->_degats = $degats;
      }
    }
    
    public function setId($id)
    {
      $id = (int) $id;
      
      if ($id > 0)
      {
        $this->_id = $id;
      }
    }
    
    public function setNom($nom)
    {
      if (is_string($nom))
      {
        $this->_nom = $nom;
      }
    }

}