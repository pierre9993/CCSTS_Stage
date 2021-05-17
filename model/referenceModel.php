<?php

include_once("model/entityBddModel.php");
class ReferenceModel extends Entity
{
    public $id;
    public $titre;
    public $img;
    public $value;

    //récupère toutes les reférences
    public function getReferences()
    {

        $requete = $this->bdd->prepare('SELECT * FROM reference');
        $requete->execute();
        $resultat = $requete->fetchAll();

        $this->bdd = null;
        return $resultat;
    }

    //récupère une reférence précise en fonction de l'id
    public function getReference($id)
    {

        $requete = $this->bdd->prepare('SELECT * FROM reference 
                                        WHERE reference_id=:id');
        $requete->execute([":id" => $id]);
        $resultat = $requete->fetch();

        $this->bdd = null;
        return $resultat;
    }


    //update de la référence donnée
    public function updateReference($id)
    {

        $sql = 'UPDATE reference 
          SET reference_titre=:reference_titre,reference_image_un=:reference_image_un,reference_valeur=:reference_valeur 
          WHERE reference_id=:reference_id;';
        $requete = $this->bdd->prepare($sql);
        $requete->execute([
            ":reference_titre" => @$_POST["titre"],
            ":reference_image_un" => @$_POST["image_un"],
            ":reference_valeur" => @$_POST["valeur"],
            ":reference_id" => $id
        ]);
        $this->bdd = null;
    }
}
