<?php

include_once("model/entityBddModel.php");

class RealisationModel extends Entity
{
    public $titre;
    public $logo;
    public $paragraphe1;
    public $paragraphe2;
    public $lieu;
    public $cout;
    public $date_debut;
    public $date_fin;
    public $image1;
    public $image2;
    public $image3;
    public $image4;
    public $image5;
    public $theme;
    public $service;


    // récupère cinq réalisations en fonction de $_GET['page_real']
    public function getRealisations(int $limite, $param) 
    {

        if ($param === null) {
            $requete = $this->bdd->prepare('SELECT * FROM realisation  ORDER BY real_id DESC  
                                            LIMIT :limite ;');
            $requete->bindValue('limite', $limite, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetchAll();
        } else {
            $startfromline = ($param - 1) * 5;
            $requete = $this->bdd->prepare('SELECT * FROM realisation  ORDER BY real_id DESC 
                                            LIMIT :limite OFFSET :startfromline ;');
            $requete->bindValue('limite', $limite, PDO::PARAM_INT);
            $requete->bindValue('startfromline', $startfromline, PDO::PARAM_INT);
            $requete->execute();
            $resultat = $requete->fetchAll();
        }

        $this->bdd = null;
        return $resultat;
    }

    //Cette fonction renvoie le compte des realisations qui existe
    public function countRealisations()
    {
        
        $requete = $this->bdd->prepare('SELECT count(*) FROM realisation');
        $requete->execute();
        $this->bdd = null;
        return $resultat = $requete->fetch();
    }

    //récupère une rélisation en fonction de son Id
    public function getRealisation($id)
    {
        $requete = $this->bdd->prepare('SELECT * FROM realisation r 
                                        LEFT JOIN concerne c ON r.real_id=c.id_real  
                                        WHERE r.real_id=:id ;');
        $requete->execute([":id" => $id]);
        $resultat = $requete->fetch();
        $this->bdd = null;
        return $resultat;
    }

    //Modifie les infos de la réalisation selectionné avec les infos données dans le formulaire
    public function updateReal($id)
    {


        $sql = 'UPDATE realisation
              SET real_titre=:real_titre,real_logo=:real_logo ,real_paragraphe_un=:real_paragraphe_un ,real_paragraphe_deux=:real_paragraphe_deux,
              real_lieu=:real_lieu ,real_cout=:real_cout ,real_date_debut=:real_date_debut ,real_date_fin=:real_date_fin ,real_img_un=:real_img_un ,
              real_img_trois=:real_img_trois, real_img_quatre=:real_img_quatre ,real_img_cinq=:real_img_cinq ,real_img_deux=:real_img_deux ,real_theme=:real_theme 
              WHERE real_id=:real_id;';
        $requete = $this->bdd->prepare($sql);
        $requete->execute([
            ":real_titre" => $this->titre,
            ":real_logo" => $this->logo,
            ":real_paragraphe_un" => $this->paragraphe1,
            ":real_paragraphe_deux" => $this->paragraphe2,
            ":real_lieu" => $this->lieu,
            ":real_cout" => $this->cout,
            ":real_theme" => $this->theme,
            ":real_date_debut" => $this->date_debut,
            ":real_date_fin" => $this->date_fin,
            ":real_img_un" => $this->image1,
            ":real_img_deux" => $this->image2,
            ":real_img_trois" => $this->image3,
            ":real_img_quatre" => $this->image4,
            ":real_img_cinq" => $this->image5,
            ":real_id" => $id
        ]);
        $requete2 = $this->bdd->prepare("DELETE FROM service_real WHERE id_real=:id_real");
        $requete2->execute([':id_real' => $id]);
        if ($this->service !== null) {
            foreach ($this->service as $serv) {
                $requete3 = $this->bdd->prepare('INSERT into service_real (id_real,id_service)
                                        VALUES (:id_real,:id_service); ');
                $requete3->execute([':id_real' => $id, ":id_service" => $serv]);
            }
        }
        $this->bdd = null;
    }

    //créer une réalisation avec les infos inserer dans le formulaire
    public function createReal()
    {

        $sql = 'INSERT INTO realisation (real_titre ,real_logo ,real_paragraphe_un ,real_paragraphe_deux ,real_lieu ,real_cout,real_theme,real_date_debut ,real_date_fin, 
            real_img_un ,real_img_deux,real_img_trois,real_img_quatre,real_img_cinq) 
            VALUES (:real_titre ,:real_logo ,:real_paragraphe_un ,:real_paragraphe_deux ,:real_lieu ,:real_cout,:real_theme,:real_date_debut ,:real_date_fin, 
            :real_img_un ,:real_img_deux,:real_img_trois,:real_img_quatre,:real_img_cinq) ;';
        $requete = $this->bdd->prepare($sql);
        $requete->execute([
            ":real_titre" => $this->titre,
            ":real_logo" => $this->logo,
            ":real_paragraphe_un" => $this->paragraphe1,
            ":real_paragraphe_deux" => $this->paragraphe2,
            ":real_lieu" => $this->lieu,
            ":real_cout" => $this->cout,
            ":real_theme" => $this->theme,
            ":real_date_debut" => $this->date_debut,
            ":real_date_fin" => $this->date_fin,
            ":real_img_un" => $this->image1,
            ":real_img_deux" => $this->image2,
            ":real_img_trois" => $this->image3,
            ":real_img_quatre" => $this->image4,
            ":real_img_cinq" => $this->image5,
        ]);
        if ($this->service !== null) {
            // Si une service a été selectionner, on crée la liaison dans la table service_real
            
            //récupère l'id de la réalisation qui vient d'être crée
            $requete2 = $this->bdd->prepare('SELECT real_id FROM realisation ORDER BY real_id DESC LIMIT 1');
            $requete2->execute();
            $result = $requete2->fetch();
            foreach ($this->service as $serv) {
                //pour chaque service sélectionné , crée une ligne dans la table concerne 
                $requete3 = $this->bdd->prepare('INSERT into concerne (id_real,id_service)
                                        VALUES (:id_real,:id_service); ');
                $requete3->execute([':id_real' => $result['real_id'], ":id_service" => $serv]);
       
            }
        }
        
    }

    //méthode Model supprime une actualité dèjà existante
    public function deleteReal($id)
    {
        $requete = $this->bdd->prepare('DELETE FROM concerne
                                        WHERE id_real=:id ;
                                        DELETE FROM realisation
                                        WHERE real_id=:id ;');
        $requete->execute([":id" => $id]);

        $this->bdd = null;
    }

    // méthode servant a récupérer un service en fonction d'une réalisation donnée
    public function getServicebyReal($id_real)
    {
        $requete = $this->bdd->prepare('SELECT * FROM service s
                                        INNER JOIN concerne c ON c.id_service=s.service_id
                                        WHERE c.id_real=:id_real;');
        $requete->execute([":id_real" => $id_real]);
        $resultat = $requete->fetchAll();
        $this->bdd = null;
        return $resultat;
    }


    //récupère les réalisations selon leurs thèmes
    public function getRealisationsbyTheme($theme)
    {
        $page = @$_GET["pageReal"];
        if ($page === null) {
            $requete = $this->bdd->prepare('SELECT * FROM realisation 
                                        WHERE real_theme=:theme ORDER BY real_id DESC 
                                        Limit 10;');
            $requete->execute([":theme" => $theme]);
            $resultat = $requete->fetchAll();
        } else {
            $startfromline = ($page - 1) * 10;
            $requete = $this->bdd->prepare('SELECT * FROM realisation  
                                        WHERE real_theme=:theme ORDER BY real_id DESC
                                        LIMIT 10 OFFSET :startfromline ; ');
            $requete->bindValue('startfromline', $startfromline, PDO::PARAM_INT);
            $requete->bindValue('theme', $theme, PDO::PARAM_STR);
            $requete->execute();
            $resultat = $requete->fetchAll();
        }
        $this->bdd = null;
        return $resultat;
    }
    
    //Cette fonction renvoie le compte des realisations selon le theme qui existe
    public function countRealisationsbyTheme($theme)
    {

        $requete = $this->bdd->prepare('SELECT count(*) FROM realisation 
                                        WHERE real_theme=:theme  ;');
        $requete->execute([":theme" => $theme]);
        $this->bdd = null;
        return $resultat = $requete->fetch();
    }
}
