<?php

$result = 0;

$response = ['un','deux','trois','quatre','cinq','six'];

//echo count($response);

echo 'Boucle while : <br/>';
while($result<=(count($response))-1){
    echo $response[$result].'<br>';
    $result++;
}

echo '<br>';
echo 'Boucle for : <br/>';
for($i=0 ;$i<=(count($response)-1); $i++){
    echo $response[$i].'<br>';
}

echo '<br>';
echo 'Boucle forech : <br/>';
foreach($response as $element){
    echo $element.'<br>';
}

echo '<br>';


class personnage{
    private $_nom;
    private $_force;
    private $_attacke;


/////////////////CONSTRUCTOR//////////////////
    /**
     * CONSTRUCTOR with name and force
     *
     */
    public function __construct($nom, $force){
        $this->_nom=$nom;
        $this->_force=$force;
    }


////////////////GETTERS//////////////////////
    /**
     * Get the value of _nom
     */ 
    public function get_nom()
    {
        return $this->_nom;
    }

    /**
     * Get the value of _force
     */ 
    public function get_force()
    {
        return $this->_force;
    }

    /**
     * Get the value of _attacke
     */ 
    public function get_attacke()
    {
        return $this->_attacke;
    }



///////////////////////SETTERS/////////////////////    
    /**
     * Set the value of _nom
     *
     * @return  self
     */ 
    public function set_nom($_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

    /**
     * Set the value of _force
     *
     * @return  self
     */ 
    public function set_force($_force)
    {
        $this->_force = $_force;

        return $this;
    }

    /**
     * Set the value of _attacke
     *
     * @return  self
     */ 
    public function set_attacke($_attacke)
    {
        $this->_attacke = $_attacke;

        return $this;
    }
}


$perso01 = new Personnage('kevin',100);
$perso02 = new Personnage('Bob',80);

$perso02->set_attacke(20);


print_r($perso02);

echo 'Pesro 1 :'.$perso01->get_nom().' '.$perso01->get_force().' points de force<br>';
echo 'Pesro 2 :'.$perso02->get_nom().' '.$perso02->get_force().' points de force<br>';


//AUTOLOADER
function autoloadClass($class){
    require 'myClass'.$class.'.php';
}

//spl_autoload_register('autoloadClass/');


//CONNEXION BASE DE DONNEES
$bdd = new PDO('mysql:host=localhost; dbname=test; charset=utf8','root','');

$request = $bdd->query('SELECT * FROM minichat');

while($result = $request->fetch(PDO::FETCH_ASSOC)){
    echo $result['pseudo'].'<br>';
}

