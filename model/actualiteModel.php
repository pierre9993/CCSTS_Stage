<?php

// on inclut le fichier entityBddModel.php contenant la class Entity qui va nous permettre de se connecter à la BDD
include_once("model/entityBddModel.php");

// la Class ActualiteModel hérite de la class Entity afin d'établir la connexion avec la BDD
class ActualiteModel extends Entity
{
    // Les propritées 

    public $id;
    public $img1;
    public $titre;
    public $paragraphe1;
    public $img2;
    public $descriptionimg2;
    public $paragraphe2;
    public $img3;
    public $paragraphe3;
    public $auteur;
    public $date_created;

    // récupère une actualité selon son ID
    public function getActualite($id)
    {
        $requete = $this->bdd->prepare('SELECT * FROM actualite WHERE actu_id=:id;');
        $requete->execute([":id" => $id]);
        $resultat = $requete->fetch();
        $this->bdd = null;
        return $resultat;
    }

    //récupère 5 actualité en fonction de la page demandé
    public function getActualites($param)
    {
        //si pas de page indiqué, alors donne nous juste les 5 premières lignes
        if ($param === null) {
            $requete = $this->bdd->prepare('SELECT * FROM actualite ORDER BY actu_id DESC
                                            LIMIT 5;');
            $requete->execute();
            $resultat = $requete->fetchAll();
            //si une page est indiqué, récupère les 5lignes de la page correspondantes
        } else {
            // on récupère les lignes à partir de la valeur de => $offset
            $offset = ($param - 1) * 5;
            $requete = $this->bdd->prepare('SELECT * FROM actualite ORDER BY actu_id DESC LIMIT 5 OFFSET :startfromline ;');
            // on configure la variable startfromline de notre requete en lui précisant que $offset est un entier int
            $requete->bindValue('startfromline', $offset, PDO::PARAM_INT);
            $requete->execute();

            $resultat = $requete->fetchAll();
        }

        $this->bdd = null;
        return $resultat;
    }

    //Cette méthode renvoie le compte des actualités qui existent
    public function countActualites()
    {
        $requete = $this->bdd->prepare('SELECT count(*) FROM actualite ;');
        $requete->execute();
        $this->bdd = null;
        return $resultat = $requete->fetch();
    }

    

    //Modifie les infos de l'actu selectionné avec les infos données
    public function updateActu($id)
    {
       

        $sql = 'UPDATE actualite
              SET actu_img_un=:actu_img_un, actu_titre=:actu_titre, actu_paragraphe_un=:actu_paragraphe_un, actu_image_deux=:actu_image_deux,
              actu_description_image_deux=:actu_description_image_deux, actu_paragraphe_deux=:actu_paragraphe_deux , actu_image_trois=:actu_image_trois, actu_auteur=:actu_auteur 
              WHERE actu_id=:actu_id;';
        $requete = $this->bdd->prepare($sql);
        $requete->execute([
            ":actu_img_un" => $this->img1,
            ":actu_titre" => $this->titre,
            ":actu_paragraphe_un" => $this->paragraphe1,
            ":actu_image_deux" => $this->img2,
            ":actu_description_image_deux" => $this->descriptionimg2,
            ":actu_paragraphe_deux" => $this->paragraphe2,
            ":actu_image_trois" => $this->img3,
            ":actu_auteur" => $this->auteur,
            ":actu_id" => $id,
        ]);

        $this->bdd = null;
    }

    // méthode pour créer une actualité selon les infos remplis 
    public function createActu()
    {
        //on remplis le model avec les infos  du form
        $date = date("Y-m-d");
        $sql = 'INSERT INTO actualite (actu_img_un,actu_titre,actu_paragraphe_un,actu_image_deux,actu_description_image_deux,actu_paragraphe_deux,actu_image_trois,actu_auteur,actu_date_creation)
              VALUE (:actu_img_un,:actu_titre,:actu_paragraphe_un,:actu_image_deux,:actu_description_image_deux,
               :actu_paragraphe_deux,:actu_image_trois,:actu_auteur,:actu_date_creation)';
        $requete = $this->bdd->prepare($sql);
        $requete->execute([
            ":actu_img_un" => $this->img1,
            ":actu_titre" => $this->titre,
            ":actu_paragraphe_un" => $this->paragraphe1,
            ":actu_image_deux" => $this->img2,
            ":actu_description_image_deux" => $this->descriptionimg2,
            ":actu_paragraphe_deux" => $this->paragraphe2,
            ":actu_image_trois" => $this->img3,
            ":actu_auteur" => $this->auteur,
            ":actu_date_creation" => $date,
        ]);
        
        $this->bdd = null;
    }

    //fonction Model supprime l'actualité dèjà existante
    public function deleteActu($id)
    {
        $requete = $this->bdd->prepare('DELETE FROM actualite WHERE actu_id=:id;');
        $requete->execute([":id" => $id]);

        $this->bdd = null;
    }
    //récupère les 4 dérnières actualitées 

    public function getFourActualites()
    {
        $requete = $this->bdd->prepare('SELECT * FROM actualite ORDER BY actu_id DESC
                                            LIMIT 4;');
        $requete->execute();
        $resultat = $requete->fetchAll();

        $this->bdd = null;
        return $resultat;
    }
}
