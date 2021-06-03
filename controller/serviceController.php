<?php

include_once("controller/verificationController.php");
include_once("controller/fileController.php");
include_once("model/serviceModel.php");

class serviceController
{
    //propriétés
    public $verif;
    public $fileVerif;


    public function __construct()
    {
        //Définition des propriétés en objet vérification
        $this->verif = new Verification;
        $this->fileVerif = new FileController;
    }

    public function verifInputService()
    {     
        $titre = $this->verif->verifInput(@$_POST['titre']);
        $img  = $this->fileVerif->verifImage('image_un');
        $description = $this->verif->verifParagraphe(@$_POST['description']);
        //Si les vérifications renvoient true alors renvoi true à son tour. Sinon renvoi false


        if ($titre && $img && $description) {
            return true;
        } else {
            $inputState= array("verif"=>true ,"titre" => $titre , "img" => $img,"description"=> $description);//false;
            return $inputState;//false;
        }
    }

    public static function showServices()
    {
        //Création d'un nouvel objet et récupération des recrutements

        $services = new ServiceModel;
        $services = $services->getServices();
        //ajout de la view de recrutement

        include('view/service/services.php');
    }

    public static function verifService()
    {
        //Si l'utilisateur est un admin

        if (@$_SESSION["role"] === "admin") {
            //Si le type de formulaire est renseigné, continue

            if (isset($_GET["formtype"])) {
                //Si un id serv est reseigné et que le type de formulaire est égale à update, alors execute update serv qui se trouve dans le meme objet.

                if (isset($_GET["idServ"]) && @$_GET["formtype"] == "update") {

                    Self::updateService(@$_GET["idServ"]);
                } //Si un id serv est reseigné et que le type de formulaire est égale à delete, alors execute update serv qui se trouve dans le meme objet.

                else if (isset($_GET["idServ"]) && @$_GET["formtype"] == "delete") {

                    Self::deleteService(@$_GET["idServ"]);
                } //Si un id serv est reseigné et que le type de formulaire est égale à create, alors execute update serv qui se trouve dans le meme objet.

                else if (@$_GET["idServ"] === null && @$_GET["formtype"] == "create") {

                    Self::createService();
                } else {
                    //sinon renvoi sur la page admin
                    header('Location: index.php?page=admin');
                }
            }
        } else {
            //renvoi sur la page admin
            header('Location: index.php?page=admin');
        }
    }


    public static function updateService($id)
    {
        //Recupération d'un recrutement spécifique

        $serv = new ServiceModel;
        $serv = $serv->getService($id);
        //Si il y a un titre et si l'utilisateur est un admin 

        if (isset($_POST["titre"]) && $_SESSION["role"] === "admin") {

            //CONTROLE DU FORMULAIRE POUR VOIR SI C'EST BIEN REMPLIS 
            $verif = new serviceController;
            $verif = $verif->verifInputService();
            //si la vérification renvoi true

            if ($verif===true) {
                //preparation de l'upload de l'image

                $uploadimage = new FileController;
                //si l'upload se passe bien, alors l'envoi sur la bdd

                if ($uploadimage->upload("image_un", "service")) {
                    $updServ = new ServiceModel;
                    $updServ->titre = @$_POST['titre'];
                    $updServ->img = $_FILES['image_un']["name"];
                    $updServ->description = @$_POST['description'];
                    $updServ->updateService($id);
                    //après l'upload renvoi vers la page admin

                    header('Location: index.php?page=admin');
                } else { //sinon renvoi le message d'erreur

                    echo "<div style='width:100%' class='bg-danger text-light text-center' >Problème lors du téléchargement de l'image</div>";
                }
            } else { //sinon renvoi le message d'erreur
                echo "<div style='width:100%' class='bg-danger text-light text-center' >Les champs ne sont pas remplis correctement</div>";
            }
        }
        //affiche la view du formulaire formServiceView
        include('view/service/formServiceView.php');
    }


    public static function createService()
    {
        $serv = null;

        //Si l'input titre est rempli et si l'utilisateur est un admin
        if (isset($_POST["titre"]) && $_SESSION["role"] === "admin") {

            //vérification de l'input
            $verif = new serviceController;
            $verif = $verif->verifInputService();
            //si la vérification renvoi true

            if ($verif===true) {
                //preparation de l'upload

                $uploadimage = new FileController;
                //si il y a une préparation à l'upload, alors l'upload de l'image

                if ($uploadimage->upload("image_un", "service")) {
                    //creation du service.

                    $creaServ = new ServiceModel;
                    $creaServ->titre = @$_POST['titre'];
                    $creaServ->img = $_FILES['image_un']["name"];
                    $creaServ->description = @$_POST['description'];
                    $creaServ->createService();
                    //renvoi vers la page admin
                    header('Location: index.php?page=admin');
                } else {
                    //affiche le message d'erreur

                    echo "<div style='width:100%' class='bg-danger text-light text-center' >Problème lors du téléchargement de l'image</div>";
                }
            } else {
                //affiche le message d'erreur

                echo "<div style='width:100%' class='bg-danger text-light text-center' >Les champs ne sont pas remplis correctement</div>";
            }
        }
        //affiche le formulaire formServiceView

        include('view/service/formServiceView.php');
    }


    // fonction Controller qui permet de supprimer une actualité en fonction de son identifiant:
    public static function deleteService($id)
    {
        //recupere un service précis

        $serv = new ServiceModel;
        $serv = $serv->getService($id);
        //si l'input de vérification est rempli et l'utilisateur est un admin

        if (isset($_POST["verification"]) && $_SESSION['role'] === "admin") {
            //si le contenu de l'input correspond au mot de passe récupéré grâce au name de la session admin.
            $admin = new AdminModel;
            $mdp = $admin->getPassword(@$_SESSION["name"]);
            
            if (password_verify($_POST["mdp"], $mdp['admin_password'])) {
                //supprime le service spécifique

                $delserv = new ServiceModel;
                $delserv->deleteService($id);
                //on supprime l'image de l'actualité supprimée
                unlink($serv['service_image_un']);
                //renvoi vers la page admin
                header('Location: index.php?page=admin');
            }
        }
        //affiche le formulaire deleServiceFormView

        include('view/service/deleteServiceFormView.php');
    }
}
