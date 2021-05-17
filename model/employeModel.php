<?php

include_once("model/entityBddModel.php");

class EmployeModel extends Entity
{
    public  $id;
    public  $nom;
    public  $prenom;
    public  $img;
    public  $titre;
    public  $description;

    //récupère un employé selon son id
    public function getEmploye($id)
    {
        $requete = $this->bdd->prepare('SELECT * FROM employe
                                        WHERE employe_id=:employe_id  ');
        $requete->execute(['employe_id' => $id]);
        $resultat = $requete->fetch();

        $this->bdd = null;
        return $resultat;
    }


    //récupère tous les employé
    public function getEmployes()
    {

        $requete = $this->bdd->prepare('SELECT * FROM employe');
        $requete->execute();
        $resultat = $requete->fetchAll();

        $this->bdd = null;
        return $resultat;
    }


    //update les infos de l'employé donné
    public function updateEmploye($id)
    {
        $sql = 'UPDATE employe
              SET employe_nom=:employe_nom,employe_prenom=:employe_prenom,employe_image_un=:employe_image_un,employe_titre=:employe_titre,employe_description=:employe_description
              WHERE employe_id=:employe_id;';
        $requete = $this->bdd->prepare($sql);
        $requete->execute([
            ":employe_id" => $id,
            ":employe_nom" => $this->nom,
            ":employe_prenom" => $this->prenom,
            ":employe_image_un" => $this->img,
            ":employe_titre" => $this->titre,
            ":employe_description" => $this->description
        ]);
        $this->bdd = null;
    }

    //créer un nouvel employé 
    public function createEmploye()
    {
        $sql = 'INSERT INTO employe (employe_nom,employe_prenom,employe_image_un,employe_titre,employe_description)
              VALUE (:employe_nom,:employe_prenom,:employe_image_un,:employe_titre,:employe_description)';

        $requete = $this->bdd->prepare($sql);
        $requete->execute([
            ":employe_nom" => $this->nom,
            ":employe_prenom" => $this->prenom,
            ":employe_image_un" => $this->img,
            ":employe_titre" => $this->titre,
            ":employe_description" => $this->description
        ]);
        $this->bdd = null;
    }

    // supprime un employé dèjà existant dans la BDD
    public function deleteEmploye($id)
    {
        $requete = $this->bdd->prepare('DELETE FROM employe WHERE employe_id=:id;');
        $requete->execute([":id" => $id]);
        $this->bdd = null;
    }
}
