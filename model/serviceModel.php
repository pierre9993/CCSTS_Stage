<?php

include_once("model/entityBddModel.php");
class ServiceModel extends Entity
{
    public $id;
    public $titre;
    public $img;
    public $description;

    // récupère un service en fonction de son Id
    public function getService($id)
    {
        $requete = $this->bdd->prepare('SELECT * FROM service WHERE service_id=:id;');
        $requete->execute([":id" => $id]);
        $resultat = $requete->fetch();
        $this->bdd = null;
        return $resultat;
    }

    //Récupère tous les services qui sont dans la bdd
    public function getServices()
    {
        $requete = $this->bdd->prepare('SELECT * FROM service ;');
        $requete->execute();
        $resultat = $requete->fetchAll();

        $this->bdd = null;
        return $resultat;
    }

    //update un service donnée
    public function updateService($id)
    {

        $sql = 'UPDATE service 
              SET service_titre=:service_titre,service_image_un=:service_image_un,service_description=:service_description 
              WHERE service_id=:service_id;';
        $requete = $this->bdd->prepare($sql);
        $requete->execute([
            ":service_titre" => $this->titre,
            ":service_image_un" => $this->img,
            ":service_description" => $this->description,
            ":service_id" => $id
        ]);
        $this->bdd = null;
    }


    //créer un nouveau service
    public function createService()
    {

        $sql = 'INSERT INTO service (service_titre,service_image_un,service_description)
              VALUE (:service_titre,:service_image_un,:service_description)';
        $requete = $this->bdd->prepare($sql);
        $requete->execute([
            ":service_titre" => $this->titre,
            ":service_image_un" => $this->img,
            ":service_description" => $this->description
        ]);

        $this->bdd = null;
    }

    //fonction Model supprime un service dèjà existant
    public function deleteService($id)
    {
        $requete = $this->bdd->prepare('DELETE FROM service WHERE service_id=:id;');
        $requete->execute([":id" => $id]);

        $this->bdd = null;
    }

    //récupère une réalisation en fonction de son identifiant
    public function getRealbyService($id_service)
    {
        $requete = $this->bdd->prepare('SELECT * FROM realisation r
                                        INNER JOIN service_real sr ON sr.id_real=r.real_id
                                        WHERE sr.id_service=:id_service
                                        ORDER BY real_id DESC
                                        LIMIT 5 ;');
        $requete->execute([":id_service" => $id_service]);
        $resultat = $requete->fetchAll();
        $this->bdd = null;
        return $resultat;
    }

    // Affiche le vue d'un service 
    public function afficheViewService($service)
    {
        $reals_service = $this->getRealbyService($service['service_id']);

        echo '<article class="mb-3  ">
                <div id="s-head" style="border-radius:5px 5px 0 0" class="bg-dark  text-light d-flex flex-row align-items-center  justify-content-between">
                     <h2 class="ml-3">' . $service['service_titre'] . ' </h2> 
                     <i id="fleche-serv" class=" mr-3 fas fa-angle-double-right"></i>
                </div>
                <div id="s-content" class="bg-light flex-column justify-content-between container border border-top-0">
                    <div class="d-flex flex-row mt-3">
                         <img class="service-img" src="' . $service['service_image_un'] . '" alt="image du service: ' . $service['service_titre'] . '"/>
                         <p class="ml-2 mt-2 ml-1">' . $service['service_description'] . '</p> 
                    </div>                   
                    <h3 class="align-self-center mb-3 text-decoration-underline"><u>Exemples de Réalisations</u></h3>
                    <div id="s-real" class="d-flex flex-row align-items-center justify-content-around mb-3 container">';
        foreach ($reals_service as $real_service) {

            echo '<a href="Realisation-' . $real_service['real_id'] . '"><img class="service-img-real" src="' . $real_service['real_logo'] . '" alt="' . $real_service['real_titre'] . '"/></a>';
        }

        echo '</div> </div> </article>';
    }
}
