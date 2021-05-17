<?php

include_once("model/entityBddModel.php");

class RecrutementModel extends Entity
{
    public $id;
    public $titre;
    public $img;
    public $description;
    public $competence;

    //récupère un recrutement en fonction de son Id
    public function getRecrutement($id)
    {
        $requete = $this->bdd->prepare('SELECT * FROM recrutement
                                        WHERE recrut_id=:recrut_id     ');
        $requete->execute([':recrut_id' => $id]);
        $resultat = $requete->fetch();

        $this->bdd = null;
        return $resultat;
    }

    //récupère l'ensemble des recrutements
    public function getRecrutements()
    {
        $requete = $this->bdd->prepare('SELECT * FROM recrutement');
        $requete->execute();
        $resultat = $requete->fetchAll();

        $this->bdd = null;
        return $resultat;
    }


    //Modifie les infos du recrutement selectionné avec les infos données dans le formulaire
    public function updateRecrutement($id)
    {

        $sql = 'UPDATE recrutement
              SET  recrut_titre=:recrut_titre ,recrut_image_un =:recrut_image_un ,recrut_description =:recrut_description ,recrut_competence =:recrut_competence  
              WHERE recrut_id =:recrut_id ;';
        $requete = $this->bdd->prepare($sql);
        $requete->execute([
            ":recrut_titre" => $this->titre,
            ":recrut_image_un" => $this->img,
            ":recrut_description" => $this->description,
            ":recrut_competence" => $this->competence,
            ":recrut_id" => $id,
        ]);
        $this->bdd = null;
    }

    //créer/insert un recrutement avec les infos données dans le formulaire
    public function createRecrutement()
    {

        $sql = 'INSERT INTO recrutement (recrut_titre,recrut_image_un,recrut_description,recrut_competence) 
            VALUES (:recrut_titre,:recrut_image_un,:recrut_description,:recrut_competence) ;';
        $requete = $this->bdd->prepare($sql);
        $requete->execute([
            ":recrut_titre" => $this->titre,
            ":recrut_image_un" => $this->img,
            ":recrut_description" => $this->description,
            ":recrut_competence" => $this->competence
        ]);

        $this->bdd = null;
    }

    //fonction Model supprime un rectrutement dèjà existant
    public function deleteRecrutement($id)
    {
        $requete = $this->bdd->prepare('DELETE FROM recrutement WHERE recrut_id=:recrut_id;');
        $requete->execute([":recrut_id" => $id]);

        $this->bdd = null;
    }

    // Affiche un recrutement à déplacer au moment opportun vers les views
    public function showRecrutementDiv($recrutement)
    {
        echo
        '<article class="mb-3  ">
            <div id="s-head" style="border-radius:5px 5px 0 0" class="bg-dark  text-light d-flex flex-row align-items-center  justify-content-between">
                   <h2 class="ml-3">' . $recrutement['recrut_titre'] . '</h2>
                    <i id="fleche-serv" class="mr-3 fas fa-angle-double-right"></i>
            </div>
              <div id="s-content" class="bg-light flex-column justify-content-between container border border-top-0">
                  <div class="d-flex flex-row mt-3">
                        <img src="' . $recrutement['recrut_image_un'] . '" class="img-160" alt="' . $recrutement['recrut_titre'] . '"/>
                        <p class="ml-2">' . $recrutement['recrut_description'] . ' </p>
                  </div>                    
                <h3 class="align-self-center mb-3 text-decoration-underline">Compétences requises</h3><br/>
                <p class="ml-2">' . $recrutement['recrut_competence'] . '</p>
              </div>
        </article>
        ';
    }
}
