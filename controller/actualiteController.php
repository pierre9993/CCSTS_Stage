<?php


include_once("controller/verificationController.php");
include_once("controller/fileController.php");
include_once("model/actualiteModel.php");

class actualiteController
{
    //Nous déclarons les propriétés suivantes:
    public $verif;
    public $fileVerif;


    public function __construct()
    {
        //On assigne un nouvel objet aux propriétés
        $this->verif = new Verification;
        $this->fileVerif = new FileController;
    }

    //Vérifie que les inputs sont bien remplis grâce aux regex (expressions régulières)
    public function verifInputActu()
    {
        $img1 = $this->fileVerif->verifImage('img_un');
        $titre = $this->verif->verifInput(@$_POST['titre']);
        $para1 = $this->verif->verifParagraphe(@$_POST['paragraphe_un']);
        $para2 = $this->verif->verifParagraphe(@$_POST['paragraphe_deux']);
        $auteur = $this->verif->verifInput(@$_POST['auteur']);
        //Si les élements désignés sont valides alors return vrai sinon renvoi un tableau avec les états des inputs
        if ($img1 && $titre && $para1 && $para2 && $auteur) {
            return true;
        } else {
           $inputState= array("verif"=>true ,"img1" => $img1 , "titre" => $titre,"para1"=> $para1 ,"para2"=>  $para2 ,"auteur"=> $auteur);//false;
            return $inputState;//false;
        }
    }


    //verifie si la personne est admin et a bien remplis les infos avant d'afficher le formulaire correspondant
    public static function verifActu()
    {
        //Si l'utilisateur n'est pas admin, renvoi sur la page de connexion.
        if (@$_SESSION["role"] !== "admin") {
            header('Location: index.php?page=admin');
        } else {
            //Si le type de formulaire est renseigné, continue
            if (isset($_GET["formtype"])) {
                //Si un id actu est reseigné et que le type de formulaire est égale à update, alors execute update actu qui se trouve dans le meme objet.
                if (isset($_GET["idActu"]) && @$_GET["formtype"] == "update") {
                    Self::updateActu(@$_GET["idActu"]);
                } else if
                //Si un id actu est reseigné et que le type de formulaire est égale à delete, alors execute delete actu qui se trouve dans le meme objet.
                (isset($_GET["idActu"]) && @$_GET["formtype"] == "delete") {
                    Self::deleteActu(@$_GET["idActu"]);
                }
                //Si un id actu est reseigné et que le type de formulaire est égale à create, alors execute create actu qui se trouve dans le meme objet.
                else if (@$_GET["idActu"] === null && @$_GET["formtype"] == "create") {
                    Self::createActu();
                }
                //Sinon, si rien ne correspond, renvoi sur la page admin.
                else {
                    header('Location: index.php?page=admin');
                }
            }
        }
    }

    /** 
     * Affiche le formulaire d'actualisation donné en entré et modifie la base de données grâce au model 
     */
    public static function updateActu($id)
    {
        //On recupère les informations d'une actualité donnée.
        $actu = new ActualiteModel;
        $actu = $actu->getActualite($id);

        //Si il y a une requête envoyé, et que l'utilisateur est un admin
        if (isset($_POST["titre"]) && $_SESSION["role"] === "admin") {
            //Vérifie si les inputs rentrés sont valides 
            $verif = new actualiteController;
            $verif = $verif->verifInputActu();
            //Si ils sont valides
            if ($verif===true) {
                //instancie une classe fileController pour verifier l'existence et uploader les images
                $uploadimage = new FileController;
                //upload l'image 1 qui est obligatoire et continue l'update si la vérification renvoi true
                if ($uploadimage->upload("img_un", "actualite")) {
                    if ($uploadimage->imageExist("img_deux")) {
                        $uploadimage->upload("img_deux", "actualite");
                    };
                    //Vérifie l'existance d'une troisème image et l'upload si elle existe.
                    if ($uploadimage->imageExist("img_trois")) {
                        $uploadimage->upload("img_trois", "actualite");
                    };

                    //Modifie l'actualité avec les informations rentrés dans la base de données. Puis renvoi sur la page admin.
                    $updAct = new ActualiteModel;
                    $updAct->img1 = $_FILES['img_un']["name"];
                    $updAct->titre = @$_POST['titre'];
                    $updAct->paragraphe1 = @$_POST['paragraphe_un'];
                    $updAct->img2 = $_FILES['img_deux']["name"];
                    $updAct->descriptionimg2 = @$_POST['description_image_deux'];
                    $updAct->paragraphe2 = @$_POST['paragraphe_deux'];
                    $updAct->img3 = $_FILES['img_trois']["name"];
                    $updAct->auteur = @$_POST['auteur'];
                    $updAct->updateActu($id);
                    header('Location: index.php?page=admin&pageActu=1');
                } else {
                    //Si la vérification de l'image renvoi false alors affiche une <div> d'erreur
                    echo "<div style='width:100%' class='bg-danger text-light text-center' >Problème lors du téléchargement de l'image</div>";
                }
            } else {
                //Si la vérification des inputs renvoi false alors affiche une <div> d'erreur
                echo "<div style='width:100%' class='bg-danger text-light text-center' >Les champs ne sont pas remplis correctement</div>";
            }
        }
        //Affiche la view du formulaire.
        include('view/actualite/formActualiteView.php');
    }

    //Permet la création d'actualité
    public static function createActu()
    {
        $actu = null;
        //Si l'utilisateur est un admin et que le champ titre est rempli

        if (isset($_POST["titre"]) && $_SESSION["role"] === "admin") {
            //Vérifie les champs.
            $verif = new actualiteController;
            $verif = $verif->verifInputActu();
            //Si la vérification renvoi true 
            if ($verif===true) {
                //alors instancie une classe fileController pour verifier l'existence et uploader les images
                $uploadimage = new FileController;
                //upload l'image 1 qui est obligatoire et continue l'update si la vérification renvoi true
                if ($uploadimage->upload("img_un", "actualite")) {
                    //Vérifie l'existance d'une seconde image et l'upload si elle existe.
                    if ($uploadimage->imageExist("img_deux")) {
                        $uploadimage->upload("img_deux", "actualite");
                    };
                    //Vérifie l'existance d'une troisème image et l'upload si elle existe.
                    if ($uploadimage->imageExist("img_trois")) {
                        $uploadimage->upload("img_trois", "actualite");
                    };

                    //Créer une actualité dans la base de données avec les informations de la requête puis renvoi sur la page admin.
                    $creaActu = new ActualiteModel;
                    $creaActu->img1 = $_FILES['img_un']["name"];
                    $creaActu->titre = @$_POST['titre'];
                    $creaActu->paragraphe1 = @$_POST['paragraphe_un'];
                    $creaActu->img2 = $_FILES['img_deux']["name"];
                    $creaActu->descriptionimg2 = @$_POST['description_image_deux'];
                    $creaActu->paragraphe2 = @$_POST['paragraphe_deux'];
                    $creaActu->img3 = $_FILES['img_trois']["name"];
                    $creaActu->auteur = @$_POST['auteur'];
                    $creaActu->createActu();
                    header('Location: index.php?page=admin');
                } else {
                    //Si la vérification de l'image renvoi false alors affiche une <div> d'erreur
                    echo "<div style='width:100%' class='bg-danger text-light text-center' >Problème lors du téléchargement de l'image</div>";
                }
            } else {
                //Si la vérification des inputs renvoi false alors affiche une <div> d'erreur
                echo "<div style='width:100%' class='bg-danger text-light text-center' >Les champs ne sont pas remplis correctement</div>";
            }
        }
        //Renvoi la view du formulaire
        include('view/actualite/formActualiteView.php');
    }

    // fonction Controller qui permet de supprimer une actualité en fonction de son identifiant(id):
    public static function deleteActu($id)
    {
        //Créer un nouvel objet modèle afin de récupéré l'actualité (utilisé par le formulaire)
        $act = new ActualiteModel;
        $act = $act->getActualite($id);
        //Si une requête est envoyé et que l'uilisateur est un admin
        if (isset($_POST["verification"]) && $_SESSION['role'] === "admin") {
            //Si le mot de passe rentré correspond à celui de la session admin
            if (password_verify($_POST["mdp"], $_SESSION['password'])) {
                //Supprime l'actualité sélectionné.
                $actu = new ActualiteModel;
                $actu->deleteActu($id);
                   
                //on supprime les images de l'actualité supprimées
                unlink($act['actu_img_un']);
                unlink($act['actu_image_deux']);
                unlink($act['actu_image_trois']);
                
                //Renvoi vers la page admin
                header('Location: index.php?page=admin');
            }
        }
        //renvoi la view du formulaire.
        include('view/actualite/deleteActualiteFormView.php');
    }
    //affiche la page des actualités
    public static function showActualites()
    {
        //crée une nouvelle actu modèle
        $actus = new ActualiteModel;
        //recupère les actualités.
        $actus = $actus->getActualites(@$_GET["pageActu"]);
        //Affiche la view acutalités.

        //on récupère le compte d'actualité pour la pagination
        $requeteactu = new Actualitemodel;
        $countactus = $requeteactu->countActualites();

        $pagi = new AdminController;
        include('view/actualite/actualites.php');
    }
    //affiche la page de l'actualité selectionné
    public static function showActualite($id)
    {
        //Crée une nouvelle actualité
        $requeteA = new ActualiteModel;
        $actu = $requeteA->getActualite($id);
        //Si l'objet actu est crée alors affiche la view actualité
        if ($actu) {

            $verif = new FileController;
            include('view/actualite/actualite.php');
        }
        //Sinon renvoi sur la page d'accueil.
        else {
            header('Location: index.php');
        }
    }
}
