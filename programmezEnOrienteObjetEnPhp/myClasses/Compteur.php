<?php

class Compteur{
    private static $_compteur = 0;

    public function __construct()
    {
       self::$_compteur++; 
    }



    /**
     * Get the value of _compteur
     */ 
    public static function getCompteur()
    {
        return self::$_compteur;
    }
}