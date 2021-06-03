<?php


include_once("controller/verificationController.php");
include_once("controller/fileController.php");
include_once("controller/adminController.php");
include_once("model/realisationModel.php");
include_once("model/serviceModel.php");
class realisationController
{
    //Propriétés
    public $verif;
    public $fileVerif;


    public function __construct()
    {
        //attribution des valeurs de nos propriétés
        $this->verif = new Verification;
        $this->fileVerif = new FileController;
    }
    //vérification des inputs de réalisations.
    public function verifInputReal()
    {
        //utilise les fonctions des vérifications stockés dans nos propriétés
        $titre = $this->verif->verifInput(@$_POST['titre']);
        $logo = $this->fileVerif->verifImage('logo');
        $paragraphe1 = $this->verif->verifParagraphe(@$_POST['paragraphe_un']);
        $paragraphe2 = $this->verif->verifParagraphe(@$_POST['paragraphe_deux']);
        $lieu = $this->verif->verifInput(@$_POST['lieu']);
        $cout = $this->verif->verifInput(@$_POST['cout']);
        $theme = $this->verif->verifInput(@$_POST['theme']);
        $date_debut = $this->verif->verifDate(@$_POST['date_debut']);
        //Si les élements désignés sont valides alors return vrai sinon renvoi un tableau avec les états des inputs 
        if ($titre && $logo && $paragraphe1 && $paragraphe2 && $lieu && $cout && $theme && $date_debut) {
            return true;
        } else {
           $inputState= array("verif"=>true ,"titre" => $titre , "logo" => $logo,"para1"=> $paragraphe1 ,"para2"=>  $paragraphe2 ,"lieu"=> $lieu,"cout"=> $cout,"theme"=> $theme,"date_debut"=> $date_debut);//false;
           return $inputState;//false;
        }
    }



    //verifie si la personne est admin et a bien remplis les infos avant d'afficher le formulaire correspondant
    public static function verifReal()
    {
        //si l'utilisateur est bien admin
        if (@$_SESSION["role"] === "admin") {
            //Si le type de formulaire est renseigné, continue
            if (isset($_GET["formtype"])) {
                //Si un id actu est reseigné et que le type de formulaire est égale à update, alors execute update actu qui se trouve dans le meme objet.
                if (isset($_GET["idReal"]) && @$_GET["formtype"] == "update") {
                    Self::updateReal(@$_GET["idReal"]);
                    //Si un id actu est reseigné et que le type de formulaire est égale à delete, alors execute delete actu qui se trouve dans le meme objet.
                } else if (isset($_GET["idReal"]) && @$_GET["formtype"] == "delete") {
                    Self::deleteReal(@$_GET["idReal"]);
                    //Si un id actu est reseigné et que le type de formulaire est égale à create, alors execute create actu qui se trouve dans le meme objet.
                } else if (@$_GET["idReal"] === null && @$_GET["formtype"] == "create") {

                    Self::createReal();
                    //Sinon, si rien ne correspond, renvoi sur la page admin.

                } else {
                    //renvoi vers la page admin
                    header('Location: index.php?page=admin');
                }
            }
        } else {
            //renvoi vers la page admin
            header('Location: index.php?page=admin');
        }
    }


    //affiche le formulaire de mise a jour et le met a jour si il reçoit des données
    public static function updateReal($id)
    { //on recupere une réalisation précise
        $real = new RealisationModel;
        $real = $real->getRealisation($id);
        //on recupere la liste des services
        $services = new ServiceModel;
        $services = $services->getServices();
        //on recupere les services liés a la réalisation
        $servicesCheck = new RealisationModel;
        $servicesCheck = $servicesCheck->getServicebyReal($id);
        //Si l'utilisateur est admin et que le titre est rempli
        if (isset($_POST["titre"]) && $_SESSION["role"] === "admin") {
            //On fait UN CONTROLE DU FORMULAIRE POUR VOIR SI C'EST BIEN REMPLIS 
            $verif = new realisationController;
            $verif = $verif->verifInputReal();
            //Si la vérification est ok
            if ($verif===true) {
                //crée un objet fileController pour vérifier l'existence de l'image et upload si elle existe.
                $uploadimage = new FileController;
                if ($uploadimage->upload("logo", "realisation")) {
                    if ($uploadimage->imageExist("img_un")) {
                        $uploadimage->upload("img_un", "realisation");
                    };
                    if ($uploadimage->imageExist("img_deux")) {
                        $uploadimage->upload("img_deux", "realisation");
                    };
                    if ($uploadimage->imageExist("img_trois")) {
                        $uploadimage->upload("img_trois", "realisation");
                    };
                    if ($uploadimage->imageExist("img_quatre")) {
                        $uploadimage->upload("img_quatre", "realisation");
                    };
                    if ($uploadimage->imageExist("img_cinq")) {
                        $uploadimage->upload("img_cinq", "realisation");
                    };
                    //Fait l'update de la réalisation donné
                    $updReal = new RealisationModel;
                    $updReal->titre = @$_POST['titre'];
                    $updReal->logo = $_FILES['logo']["name"];
                    $updReal->paragraphe1 = @$_POST['paragraphe_un'];
                    $updReal->paragraphe2 = @$_POST['paragraphe_deux'];
                    $updReal->lieu = @$_POST['lieu'];
                    $updReal->cout = @$_POST['cout'];
                    $updReal->theme = @$_POST['theme'];
                    $updReal->date_debut = @$_POST['date_debut'];
                    $updReal->date_fin = @$_POST['date_fin'];
                    $updReal->image1 = $_FILES['img_un']["name"];
                    $updReal->image2 = $_FILES['img_deux']["name"];
                    $updReal->image3 = $_FILES['img_trois']["name"];
                    $updReal->image4 = $_FILES['img_quatre']["name"];
                    $updReal->image5 = $_FILES['img_cinq']["name"];
                    $updReal->service = @$_POST['service'];
                    $updReal->updateReal($id);
                    //renvoi vers la page admin, sur les réalisations.
                    header('Location: index.php?page=admin&pageReal=1');
                } else {
                    //sinon renvoi un message d'erreur
                    echo "<div style='width:100%' class='bg-danger text-light text-center' >Problème lors du téléchargement de l'image</div>";
                }
            } else {
                //sinon renvoi un message d'erreur
                echo "<div style='width:100%' class='bg-danger text-light text-center' >Les champs ne sont pas remplis correctement</div>";
            }
        }
        //affiche la view du formulaire
        include('view/realisation/formRealisationView.php');
    }


    //affiche le formulaire de création de réalisation et en créer une si il reçoit des données
    public static function createReal()
    {
        $real = null;
        //recupère les services de la base de donnée
        $services = new ServiceModel;
        $services = $services->getServices();
        //Si l'input titre est complété et que l'utilisateur est un admin
        if (isset($_POST["titre"]) && $_SESSION["role"] === "admin") {
            //On fait UN CONTROLE DU FORMULAIRE POUR VOIR SI C'EST BIEN REMPLIS 
            $verif = new realisationController;
            $verif = $verif->verifInputReal();
            //Si la vérification renvoi true
            if ($verif===true) {
                //crée un objet fileController pour vérifier l'existence de l'image et upload si elle existe.

                $uploadimage = new FileController;
                if ($uploadimage->upload("logo", "realisation")) {
                    if ($uploadimage->imageExist("img_un")) {
                        $uploadimage->upload("img_un", "realisation");
                    };
                    if ($uploadimage->imageExist("img_deux")) {
                        $uploadimage->upload("img_deux", "realisation");
                    };
                    if ($uploadimage->imageExist("img_trois")) {
                        $uploadimage->upload("img_trois", "realisation");
                    };
                    if ($uploadimage->imageExist("img_quatre")) {
                        $uploadimage->upload("img_quatre", "realisation");
                    };
                    if ($uploadimage->imageExist("img_cinq")) {
                        $uploadimage->upload("img_cinq", "realisation");
                    };
                    //crer la réalisation donné

                    $createReal = new RealisationModel;
                    $createReal->titre = @$_POST['titre'];
                    $createReal->logo = $_FILES['logo']["name"];
                    $createReal->paragraphe1 = @$_POST['paragraphe_un'];
                    $createReal->paragraphe2 = @$_POST['paragraphe_deux'];
                    $createReal->lieu = @$_POST['lieu'];
                    $createReal->cout = @$_POST['cout'];
                    $createReal->theme = @$_POST['theme'];
                    $createReal->date_debut = @$_POST['date_debut'];
                    $createReal->date_fin = @$_POST['date_fin'];
                    $createReal->image1 = $_FILES['img_un']["name"];
                    $createReal->image2 = $_FILES['img_deux']["name"];
                    $createReal->image3 = $_FILES['img_trois']["name"];
                    $createReal->image4 = $_FILES['img_quatre']["name"];
                    $createReal->image5 = $_FILES['img_cinq']["name"];
                    $createReal->service = @$_POST['service'];
                    $createReal->createReal();
                    //affiche les réalisations dans la page admin
                    header('Location: index.php?page=admin&pageReal=1');
                } else {
                    //envoi le message d'erreur
                    echo "<div style='width:100%' class='bg-danger text-light text-center' >Problème lors du téléchargement de l'image</div>";
                }
            } else {
                //renvoi le message d'erreur
                echo "<div style='width:100%' class='bg-danger text-light text-center' >Les champs ne sont pas remplis correctement</div>";
            }
        }
        //affiche la view du formulaire formRealisationView
        include('view/realisation/formRealisationView.php');
    }

    // fonction Controller qui permet de supprimer une actualité en fonction de son identifiant:
    public static function deleteReal($id)
    {
        //on recupere une realisation precise
        $realr = new RealisationModel;
        $rea = $realr->getRealisation($id);

        //si l'input vérification est completer et que l'utilisateur est une admin 
        if (isset($_POST["verification"]) && $_SESSION['role'] === "admin") {
            //si le contenu de l'input correspond au mot de passe récupéré grâce au name de la session admin.
            $admin = new AdminModel;
            $mdp = $admin->getPassword(@$_SESSION["name"]);
            
            if (password_verify($_POST["mdp"], $mdp['admin_password'])) {
                //Suppresion de l'article
                $realr2 = new RealisationModel;
                $realr2->deleteReal($id);


                //on supprime les images de l'actualité supprimée
                unlink($rea['real_logo']);
                unlink($rea['real_img_un']);
                unlink($rea['real_img_deux']);
                unlink($rea['real_img_trois']);
                unlink($rea['real_img_quatre']);
                unlink($rea['real_img_cinq']);

                //affichage du tableau des réalisations de la page admin.
                header('Location: index.php?page=admin&pageReal=1');
            }
        }
        //affiche la view du formulaire deleteRealisationFormView
        include('view/realisation/deleteRealisationFormView.php');
    }

    public static function showRealisations()
    {
        //si un thème est selectionné.
        if (isset($_GET['themeReal'])) {
            //Affiche les réalisations liée à ce theme
            $requetereals = new RealisationModel;
            $reals = $requetereals->getRealisationsByTheme(@$_GET['themeReal']);
            $requetereals2 = new RealisationModel;
            $countreals = $requetereals2->countRealisationsbyTheme(@$_GET['themeReal']);
        } else {
            //recupere les informations des réalisations pour l'affichage dans la view
            $requetereals = new RealisationModel;
            $reals = $requetereals->getRealisations(10, @$_GET["pageReal"]);
            $requetereals2 = new RealisationModel;
            $countreals = $requetereals2->countRealisations();
        }
        $pagi = new AdminController;
        //affiche la view les réalisations 
        include('view/realisation/realisations.php');
    }
    public static function showRealisationsv2()
    {
        //si un thème est selectionné.
        if (isset($_GET['themeReal'])) {
            //Affiche les réalisations liée à ce theme
            $requetereals = new RealisationModel;
            $reals = $requetereals->getRealisationsByTheme(@$_GET['themeReal']);
            $requetereals2 = new RealisationModel;
            $countreals = $requetereals2->countRealisationsbyTheme(@$_GET['themeReal']);
        } else {
            //recupere les informations des réalisations pour l'affichage dans la view
            $requetereals = new RealisationModel;
            $reals = $requetereals->getRealisations(15, @$_GET["pageReal"]);
            $requetereals2 = new RealisationModel;
            $countreals = $requetereals2->countRealisations();
        }
        $pagi = new AdminController;
        //affiche la view les réalisations 
        include('view/realisation/realisationv2.php');
    }


    public static function showRealisation($id)
    {
        //recupere la realisation selectionné et affiche la vue.
        $requetereal = new RealisationModel;
        $real = $requetereal->getRealisation($id);
        if ($real !== false) {
            include('view/realisation/realisation.php');
        } else {
            header('Location: index.php');
        }
    }
}
