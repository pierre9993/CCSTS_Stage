<?php


include_once("model/actualiteModel.php");
include_once("model/realisationModel.php");

/**
 * Création du controller de la page d'accueil
 */
class accueilController
{
    //Method public utiliser par le router
    public static function showAccueil()
    {
        if (isset($_GET["v"])) {
            if ($_GET["v"] === "1") {
                $reals = new RealisationModel;
                $reals = $reals->getRealisations(5,@$_GET["pageReal"]);

                $actus = new ActualiteModel;
                $actus = $actus->getFourActualites();

                $references = new ReferenceModel;
                $references = $references->getReferences();

                //inclusion de la page pour la génération de la view.
                include('view/accueil/accueil save.php');

            }
            else if ($_GET["v"] === "2") {
                
                //Création d'un objet puis utilisations de leurs methods
                $reals = new RealisationModel;
                $reals = $reals->getRealisations(8,@$_GET["pageReal"]);

                $actus = new ActualiteModel;
                $actus = $actus->getFourActualites();

                $references = new ReferenceModel;
                $references = $references->getReferences();

                //inclusion de la page pour la génération de la view.
                include('view/accueil/accueil.php');

            } }else { //Création d'un objet puis utilisations de leurs methods
                

                //Création d'un objet puis utilisations de leurs methods
                $reals = new RealisationModel;
                $reals = $reals->getRealisations(5,@$_GET["pageReal"]);

                $actus = new ActualiteModel;
                $actus = $actus->getFourActualites();

                $references = new ReferenceModel;
                $references = $references->getReferences();

                //inclusion de la page pour la génération de la view.
                include('view/accueil/accueilv3.php');
            }
        }
    }

