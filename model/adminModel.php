<?php
include_once("model/entityBddModel.php");

// méthode qui récupère le mot de passe enregistré sur la BDD
class AdminModel extends Entity
{
    public function getPassword($id)
    {
        $sql = "SELECT * FROM admin WHERE admin_login=:admin_login";
        $requete = $this->bdd->prepare($sql);
        $requete->execute(["admin_login" => $id]);

        $mdp = $requete->fetch();

        $this->bdd = null;
        return $mdp;
    }
}
