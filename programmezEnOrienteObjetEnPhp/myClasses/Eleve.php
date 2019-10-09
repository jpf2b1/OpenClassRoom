<?php

class Eleve{
    private $_name;
    private $_age;
    private $_userName;


    public function __construct($nom, $prenom, $age)
    {
        $this->set_name($nom);
        $this->_userName = $prenom;
        $this->_age = $age;
    }

    public function direBonsoir(){
        echo 'Bonsoire à tous';
    }

    public function direBonjour(){
        echo 'Bonjour je suis '.$this->_name.' '.$this->_userName.' et j\'ai '.$this->_age.' ans';
    }

    //GETTER :
    public function get_name()
    {
        return $this->_name;
    }

    public function get_age()
    {
        return $this->_age;
    }

    public function get_userName()
    {
        return $this->_userName;
    }



    //SETTER:
    public function set_name($_name)
    {
        $this->_name = $_name;
        return $this;
    }

    public function set_age($_age)
    {
        $this->_age = $_age;
        return $this;
    }

    public function set_userName($_userName)
    {
        $this->_userName = $_userName;
        return $this;
    }
    

}