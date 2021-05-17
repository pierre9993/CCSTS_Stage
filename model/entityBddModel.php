<?php


abstract class Entity
{
    protected $bdd;

    // Quand l'Objet est instancié, remplit la propriété Bdd avec l'objet bdd
    public function __construct()
    {
        $this->bdd = Bdd::Connexion();
    }
}
