<?php


include_once("controller/verificationController.php");
include_once("controller/fileController.php");
include_once("model/recrutementModel.php");
class recrutementController
{
    //propriété
    public $verif;
    public $fileVerif;


    public function __construct()
    {
        //Définition des propriétés en objet vérification
        $this->verif = new Verification;
        $this->fileVerif = new FileController;
    }

    public static function showRecrutements()
    {
        //Création d'un nouvel objet et récupération des recrutements
        $recruts = new RecrutementModel;
        $recruts = $recruts->getRecrutements();
        //ajout de la view de recrutement
        include('view/recrutement/recrutement.php');
    }

    //verifie si la personne est admin et a bien remplis les infos avant d'afficher le formulaire correspondant
    public static function verifRecrutement()
    {
        //Si l'utilisateur est un admin
        if (@$_SESSION["role"] === "admin") {
            //Si le type de formulaire est renseigné, continue
            if (isset($_GET["formtype"])) {
                //Si un id recrut est reseigné et que le type de formulaire est égale à update, alors execute update recrut qui se trouve dans le meme objet.

                if (isset($_GET["idRecrut"]) && @$_GET["formtype"] == "update") {

                    Self::updateRecrutement(@$_GET["idRecrut"]);
                } //Si un id recrut est reseigné et que le type de formulaire est égale à delete, alors execute delete recrut qui se trouve dans le meme objet.
                else if (isset($_GET["idRecrut"]) && @$_GET["formtype"] == "delete") {

                    Self::deleteRecrutement(@$_GET["idRecrut"]);
                } //Si un id recrut est reseigné et que le type de formulaire est égale à create, alors execute create recrut qui se trouve dans le meme objet.

                else if (@$_GET["idRecrut"] === null && @$_GET["formtype"] == "create") {

                    Self::createRecrutement();
                } //Sinon, si rien ne correspond, renvoi sur la page admin. 
                else {
                    //renvoi vers la page admin
                    header('Location: index.php?page=admin');
                }
            }
        } else {
            //renvoi vers la page admin
            header('Location: index.php?page=admin');
        }
    }

    public function verifInputRecrutement()
    {
        //Vérifie les inputs
        $titre = $this->verif->verifInput(@$_POST['titre']);
        $img = $this->fileVerif->verifImage("img");
        $description = $this->verif->verifParagraphe(@$_POST["description"]);
        $competence = $this->verif->verifParagraphe(@$_POST["competence"]);
        //Si les élements désignés sont valides alors return vrai sinon renvoi un tableau avec les états des inputs
        if ($titre && $description && $competence) {
            return true;
        }  
        else {$inputState= array("verif"=>true ,"titre" => $titre , "description" => $description,"competence"=> $competence);//false;
            return $inputState;//false;
        }
    }

    //affiche le formulaire de mise a jour et le met a jour si il reçoit des données
    public static function updateRecrutement($id)
    {
        //Recupération d'un recrutement spécifique
        $recrut = new RecrutementModel;
        $recrut = $recrut->getRecrutement($id);
        //Si il y a un titre et si l'utilisateur est un admin 
        if (isset($_POST["titre"]) && $_SESSION["role"] === "admin") {
            //vérification des inputs
            $verif = new recrutementController;
            $verif = $verif->verifInputRecrutement();
            //si la vérification renvoi true
            if ($verif===true) {
                //preparation de l'upload de l'image
                $uploadimage = new FileController;

                if ($uploadimage->imageExist("img")) {
                    //si l'elle existe, alors l'envoi sur la bdd
                    $uploadimage->upload("img", "recrutement");
                };
                $updrecrut = new RecrutementModel;
                $updrecrut->titre = @$_POST['titre'];
                $updrecrut->img = $_FILES['img']["name"];
                $updrecrut->description = @$_POST["description"];
                $updrecrut->competence = @$_POST["competence"];
                $updrecrut->updateRecrutement($id);
                //après l'upload renvoi vers la page admin
                header('Location: index.php?page=admin');
            } else {
                //sinon renvoi le message d'erreur
                echo "<div style='width:100%' class='bg-danger text-light text-center' >Les champs ne sont pas remplis correctement</div>";
            }
        }
        //affiche la view du formulaire formRecrutementView
        include('view/recrutement/formRecrutementView.php');
    }


    //affiche le formulaire de création de réalisation et en créer une si il reçoit des données
    public static function createRecrutement()
    {
        $recrut = null;
        //Si l'input titre est rempli et si l'utilisateur est un admin
        if (isset($_POST["titre"]) && $_SESSION["role"] === "admin") {

            //vérification de l'input
            $verif = new recrutementController;
            $verif = $verif->verifInputRecrutement();
            //si la vérification renvoi true
            if ($verif===true) {
                //preparation de l'upload
                $uploadimage = new FileController;
                //si il y a une préparation à l'upload, alors l'upload de l'image
                if ($uploadimage->imageExist("img")) {
                    //si l'elle existe, alors l'envoi sur la bdd
                    $uploadimage->upload("img", "recrutement");
                };
                $createrecrut = new RecrutementModel;
                $createrecrut->titre = @$_POST['titre'];
                $createrecrut->img = $_FILES['img']["name"];
                $createrecrut->description = @$_POST["description"];
                $createrecrut->competence = @$_POST["competence"];
                $createrecrut->createRecrutement();
                //renvoi vers la page admin
                //header('Location: index.php?page=admin');
            } else {
                //affiche le message d'erreur
                echo "<div style='width:100%' class='bg-danger text-light text-center' >Les champs ne sont pas remplis correctement</div>";
            }
        }
        //affiche la view du formulaire formRecrutementView
        include('view/recrutement/formRecrutementView.php');
    }

    // fonction Controller qui permet de supprimer une actualité en fonction de son identifiant:
    public static function deleteRecrutement($id)
    {
        //recupere un recrutement précis
        $recrut = new RecrutementModel;
        $recrutr = $recrut->getRecrutement($id);
        //si l'input de vérification est rempli et l'utilisateur est un admin
        if (isset($_POST["verification"]) && $_SESSION['role'] === "admin") {
            //si le contenu de l'input correspond au mot de passe récupéré grâce au name de la session admin.
            $admin = new AdminModel;
            $mdp = $admin->getPassword(@$_SESSION["name"]);
            
            if (password_verify($_POST["mdp"], $mdp['admin_password'])) {
                //supprime le recrutement spécifique
                $recrud= new RecrutementModel;
                $recrud->deleteRecrutement($id);

                 //on supprime les images de l'actualité supprimées
                  unlink($recrutr['recrut_image_un']);

                //renvoi vers la page admin
                header('Location: index.php?page=admin');
            }
        }
        //affiche le formulaire deleRealisation
        
        include('view/recrutement/deleteRealisationFormView.php');
    }
}
