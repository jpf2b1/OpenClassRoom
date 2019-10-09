<?php

class PersonnagesManager{
  //////////////// ATTRIBUTS ////////////////////
    private $_db; //instance de PDO

  ///////////////// CONSTRUCTEUR ////////////////
    public function __construct($db){
        $this->setDb($db);
    }

  /////////////// METHODES //////////////////////
    public function add(Personnage $perso){
      $q = $this->_db->prepare('INSERT INTO perso(nom, force_Perso, degats, niveau, experience) VALUES(:nom; :force_Perso, :degats, :niveau, :experience');
      $q->bindValue(':nom',$perso->nom());
      $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
      $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
      $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
      $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
      
      $q->execute();
    }

    public function delete(Personnage $perso){
      $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id());
    }

    public function update(Personnage $perso){
      $q = $this->_db->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id');

      $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
      $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
      $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
      $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
      $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

      $q->execute();
    }

  /////////////////// GETTERS ///////////////////
    public function get($id){
      $id = (int) $id;

      $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages WHERE id = '.$id);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
  
      return new Personnage($donnees);
    }
    public function getList(){
      $persos = [];

      $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages ORDER BY nom');
  
      while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
        $persos[] = new Personnage($donnees);
      }
  
      return $persos;
    }

    ////////////////// SETTERS //////////////////
    public function setDb(PDO $db){
        $this->_db = $db;

    }

}