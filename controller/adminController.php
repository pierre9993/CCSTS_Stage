<?php


include_once("model/actualiteModel.php");
include_once("model/realisationModel.php");
include_once("model/serviceModel.php");
include_once("model/referenceModel.php");
include_once("model/employeModel.php");
include_once("model/recrutementModel.php");
include_once("model/adminModel.php");
include_once("controller/verificationController.php");
include_once("controller/fileController.php");

class AdminController
{
    public $verif;
    public $fileVerif;


    public function __construct()
    {
        //Attribution d'un objet à une propriété spécifique
        $this->verif = new Verification;
        $this->fileVerif = new FileController;
    }
    /**
     * Si l'utilisateur est admin, l'envoi sur le panel admin 
     * sinon Envoi sur la page de connexion 
     */
    public static function showAdmin()
    {
        //Envoi sur la page update de référence si la page donnée est égale à refform et que l'utilisateur est un admin
        if (@$_SESSION["role"] === "admin" && @$_GET["page"] == "refForm" && @$_GET["formType"] == "update") {
            Self::updateRef(@$_GET["idRef"]);
        } else if (@$_SESSION["role"] === "admin") {
            Self::showAdminTable();
        } else {
            Self::showLogin();
        }
    }
    /**
     * Affiche la page de connexion et si il y a une requête,
     * Fait la vérification pour la connexion 
     * et envoye sur le panel admin si la connexion réussi
     */
    public static function showLogin()
    {
        if (@$_POST["name"] !== null && @$_POST["pass"] !== null) {

            $admin = new AdminModel;
            $admin = $admin->getPassword(@$_POST["name"]);

            if (password_verify($_POST["pass"], $admin["admin_password"])) {
                $_SESSION["role"] = "admin";
                //garde le name pour pouvoir le réutiliser si besoin
                $_SESSION["name"] = $_POST["name"];
                header('Location: index.php?page=admin');
            } else {
                //sinon renvoi sur la page index
                header('Location: index.php');
            }
        }
        //renvoi la view de loginView 
        include("view/admin/loginView.php");
    }

    /**
     * récupère puis affiche les informations
     * dans le panel administrateur
     */
    public static function showAdminTable()
    {
        //On récupère les actualités
        $actualites = new ActualiteModel;
        $actus = $actualites->getActualites(@$_GET["pageActu"]);

        //On récupère le nbr d'actualités pour la pagination
        $acount = new ActualiteModel;
        $actucount = $acount->countActualites();
        $actucount = $actucount[0];

        //On récupère les réalisations   
        $reals = new RealisationModel;
        $realisations = $reals->getRealisations(5, @$_GET["pageReal"]);

        //on récup le nb de real
        $rcount = new RealisationModel;
        $realscount = $rcount->countRealisations();
        $realscount = $realscount[0];

        //On récupère les Services  
        $serv = new ServiceModel;
        $services = $serv->getServices();

        //On récupère les References  
        $refs = new ReferenceModel;
        $references = $refs->getReferences();

        //On récupère les Employes  
        $empls = new EmployeModel;
        $employes = $empls->getEmployes();

        //On récupère les Recrutements  
        $recrut = new RecrutementModel;
        $recrutements = $recrut->getRecrutements();

        //On renvoi la view de adminView
        include("view/admin/adminView.php");
    }

    //vérifie si l'utilisateur à le droit de modifier les employes
    public static function verifEmploye()
    {
        //Si l'utilisateur est bien un admin alors:
        if (@$_SESSION["role"] === "admin") {
            //Si le type de formulaire est renseigné, continue
            if (isset($_GET["formtype"])) {
                //Si un id employe est reseigné et que le type de formulaire est égale à update, alors execute update employe qui se trouve dans le meme objet.
                if (isset($_GET["idEmploye"]) && @$_GET["formtype"] == "update") {

                    Self::updateEmploye(@$_GET["idEmploye"]);
                } else if
                //Si un id employe est reseigné et que le type de formulaire est égale à delete, alors execute delete employe qui se trouve dans le meme objet.
                (isset($_GET["idEmploye"]) && @$_GET["formtype"] == "delete") {

                    Self::deleteEmploye(@$_GET["idEmploye"]);
                } else if
                //Si un id employe est reseigné et que le type de formulaire est égale à create, alors execute create employe qui se trouve dans le meme objet.
                (
                    @$_GET["idEmploye"] === null && @$_GET["formtype"] == "create"
                ) {

                    Self::createEmploye();
                } else {
                    //sinon renvoi sur la page admin
                    header('Location: index.php?page=admin');
                }
            }
        } else {
            //sinon renvoi sur la page admin
            header('Location: index.php?page=admin');
        }
    }
    //Vérifie que les inputs sont bien remplis grâce aux regex (expressions régulières)
    public function verifInputEmploye()
    {
        $nom = $this->verif->verifInput(@$_POST['nom']);
        $prenom = $this->verif->verifInput(@$_POST['prenom']);
        $img = $this->fileVerif->verifImage('image_un');
        $titre = $this->verif->verifInput(@$_POST['titre']);
        $description = $this->verif->verifParagraphe(@$_POST['description']);
        //Si les élements désignés sont valides alors return vrai sinon renvoi un tableau avec les états des inputs 
        if ($nom && $prenom && $img && $titre && $description) {
            return true;
        } else {
            $inputState= array("verif"=>true ,"nom" => $nom , "prenom" => $prenom,"img"=> $img ,"titre"=>  $titre ,"description"=> $description);//false;
            return $inputState;//false;
        }
    }
    //permet de mettre a jour les infos d'un employé
    public static function updateEmploye($id)
    {
        //On recupère les informations d'un employe donnée.

        $employe = new EmployeModel;
        $employe = $employe->getEmploye($id);
        //Si il y a une requête envoyé, et que l'utilisateur est un admin

        if (isset($_POST["titre"]) && $_SESSION["role"] === "admin") {

            //Vérifie si les inputs rentrés sont valides 
            $verif = new AdminController;
            $verif = $verif->verifInputEmploye();
            //Si ils sont valides

            if ($verif===true) {
                //instancie une classe fileController pour verifier l'existence et uploader les images

                $uploadimage = new FileController;
                //upload l'image 1 qui est obligatoire et continue l'update si la vérification renvoi true

                if ($uploadimage->upload("image_un", "employe")) {

                    $updempl = new EmployeModel;
                    $updempl->nom = @$_POST['nom'];
                    $updempl->prenom = @$_POST['prenom'];
                    $updempl->img = $_FILES['image_un']["name"];
                    $updempl->titre = @$_POST['titre'];
                    $updempl->description = @$_POST['description'];
                    $updempl->updateEmploye($id);
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
        //Afiche la view du formulaire.
        include('view/admin/formEmployeView.php');
    }


    public static function createEmploye()
    {
        $employe = null;
        //Si l'utilisateur est un admin et que le champ titre est rempli
        if (isset($_POST["titre"]) && $_SESSION["role"] === "admin") {
            //Vérifie les champs.
            $verif = new AdminController;
            $verif = $verif->verifInputEmploye();
            //Si la vérification renvoi true 
            if ($verif===true) {
                //alors instancie une classe fileController pour verifier l'existence et uploader les images

                $uploadimage = new FileController;
                //upload l'image 1 qui est obligatoire et continue l'update si la vérification renvoi true

                if ($uploadimage->upload("image_un", "employe")) {
                    //Créer un employé dans la base de données avec les informations de la requête puis renvoi sur la page admin.

                    $creaEmp = new EmployeModel;
                    $creaEmp->nom = @$_POST['nom'];
                    $creaEmp->prenom = @$_POST['prenom'];
                    $creaEmp->img = $_FILES['image_un']["name"];
                    $creaEmp->titre = @$_POST['titre'];
                    $creaEmp->description = @$_POST['description'];
                    $creaEmp->createEmploye();
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

        include('view/admin/formEmployeView.php');
    }

    // fonction Controller qui permet de supprimer un employé en fonction de son identifiant:
    public static function deleteEmploye($id)
    {
        //Créer un nouvel objet modèle afin de récupéré l'employé'(utilisé par le formulaire)

        $employe = new EmployeModel;
        $employe = $employe->getEmploye($id);
        //Si une requête est envoyé et que l'uilisateur est un admin

        if (isset($_POST["verification"]) && $_SESSION['role'] === "admin") {
            //si le contenu de l'input correspond au mot de passe récupéré grâce au name de la session admin.
            $admin = new AdminModel;
            $mdp = $admin->getPassword(@$_SESSION["name"]);
            
            if (password_verify($_POST["mdp"], $mdp['admin_password'])) {
                //Supprime l'employé sélectionné.

                $delEmp = new EmployeModel;
                $delEmp->deleteEmploye($id);

                //on supprime les images de l'actualité supprimées
                unlink($employe['employe_image_un']);

                //Renvoi vers la page admin
                header('Location: index.php?page=admin');
            }
        }
        //renvoi la view du formulaire.
        include('view/admin/deleteEmployeFormView.php');
    }




    //vérifie si l'utilisateur à le droit de modifier les références
    public static function verifRef()
    {
        //Si l'utilisateur est admin, qu'un formulaire de formulaire ainsi qu'un id est donné dans l'url
        if (isset($_GET["idRef"]) && @$_GET["formtype"] == "update" && @$_SESSION["role"] === "admin") {
            //affiche l'update de référence
            Self::updateRef(@$_GET["idRef"]);
        } else {

            header('Location: index.php?page=admin');
        }
    }

    public function verifInputRef()
    {
        //Vérifie que les inputs sont valides
        $titre = $this->verif->verifInput(@$_POST["titre"]);
        $value = $this->verif->verifInput(@$_POST["valeur"]);
        //Si les élements désignés sont valides alors return vrai sinon renvoi un tableau avec les états des inputs 
        if ($titre && $value) {
            return true;
        } else {
            $inputState= array("verif"=>true ,"titre" => $titre , "value" => $value);//false;
            return $inputState;//false;
        }
    }

    public static function updateRef($id)
    {        //On recupère les informations d'une reference donnée.

        $ref = new ReferenceModel;
        $ref = $ref->getReference($id);
        //Si il y a une requête envoyé, et que l'utilisateur est un admin

        if (isset($_POST["titre"]) && $_SESSION["role"] === "admin") {

            //Vérifie si les inputs rentrés sont valides 
            $verif = new AdminController;
            $verif = $verif->verifInputRef();
            //Si ils sont valides

            if ($verif===true) {
                //Modifie la reference avec les informations rentrés dans la base de données. Puis renvoi sur la page admin.
                $updRef = new ReferenceModel;
                $updRef->updateReference($id);
                header('Location: index.php?page=admin');
            } else {
                //Si la vérification des inputs renvoi false alors affiche une <div> d'erreur

                echo "<div style='width:100%' class='bg-danger text-light text-center' >Les champs ne sont pas remplis correctement</div>";
            }
        }
        //Affiche la view du formulaire.
        include('view/admin/formReferenceView.php');
    }

    public static function pagination($count, $ligneParPage, $typePage, $route)
    {

        $nmrPage = @$_GET[$typePage];
        //on calcul le nombre de pages maximum nécéssaires pour pouvoir tout afficher
        $pagemax = ceil($count / $ligneParPage);
        // On fait la pagination si il y a plus de 5 actualité 
        if ($pagemax > 1) {
            //on récupère la page qu'on veut voir
            //on place  le début de la navbar
            echo ' <nav aria-label="mb-0">
            <ul class="pagination mb-0">';
            if ($nmrPage != null && $nmrPage != 1) {
                echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . ($nmrPage - 1) . '"> Précédent </a></li>';
            }
            echo '<li class="page-item ';
            //cette fonction rend le li active si il correspond a la page qu'on a cherché ou si il n'y a pas de recherche
            if ($nmrPage === null || $nmrPage == 1) {
                echo "active";
            }
            echo '">
                    <a class="page-link " href="index.php?page=' . $route . '&' . $typePage . '=1">1</a>
                </li>';
            //si on a 5pages ou moins
            if ($pagemax <= 5) {
                //alors créer autant de bouton qu'il y a de page max 
                for ($i = 2; $i <= $pagemax; $i++) {
                    echo '<li class="page-item ';
                    //applique la class active si correspondante à la page cherché
                    if ($nmrPage == $i) {
                        echo 'active';
                    }
                    echo '" ><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . $i . '">' . $i . '</a></li>';
                }
                //si on a plus de 5 pages
            } else if ($pagemax > 5) {
                //si on a pas d'indication sur la page ou que la page cherché est inférieu à 4
                if ($nmrPage === null || $nmrPage < 4) {
                    //alors créer 2 boutons de navigations classiques
                    for ($i = 2; $i <= 4; $i++) {
                        echo '<li class="page-item';
                        if ($nmrPage == $i) {
                            echo " active";
                        }
                        echo ' "><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . $i . '">' . $i . '</a></li> ';
                    }
                    //puis créer un bouton de nav désactivé pour indiquer qu'il y a des pages qui sont cachées
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . ($nmrPage + 2) . '"> ... </a></li>';
                }
                //si la page cherché est supérieur à la page 3 et qu'elle est inférieur à la pagemax-3
                else if ($nmrPage > 3 && $nmrPage < ($pagemax - 2)) {
                    //on affiche deux bouton "..." avec au centre la page actuel
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . ($nmrPage - 2) . '"> ... </a></li>';
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . ($nmrPage - 1) . '"> ' . ($nmrPage - 1) . '</a></li>';
                    echo '<li class="page-item active"><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . $nmrPage . '"> ' . $nmrPage . ' </a></li>';
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . ($nmrPage + 1) . '">' . ($nmrPage + 1) . '</a></li>';
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . ($nmrPage + 2) . '"> ... </a></li>';
                }
                //si la page cherché fait partie des 3 dernières existantes
                if ($nmrPage >= ($pagemax - 2)) {
                    //alors créer un bouton de nav désactivé pour indiquer qu'il y a des pages qui sont cachées
                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . ($nmrPage - 2) . '"> ... </a></li>';
                    //puis créer 2 boutons de navigations classiques
                    for ($i = $pagemax - 3; $i <= $pagemax - 1; $i++) {
                        echo '<li class="page-item ';
                        if ($nmrPage == $i) {
                            echo "active";
                        }
                        echo ' "><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . $i . '">' . $i . '</a></li>';
                    }
                }
                //puis on finit avec un bouton correspondant à la dernière page disponible
                echo '<li class="page-item ';
                if ($nmrPage == $i) {
                    echo "active";
                }
                echo '"><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . $pagemax . '">' . $pagemax . '</a></li>';
            } //on affiche un bouton suivant la page selectionné n'est pas la dernière page
            if ($nmrPage < $pagemax) {
                echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $route . '&' . $typePage . '=' . ($nmrPage + 1) . '"> Suivant </a></li>';
            }
            //on ferme la navbar de pagination
            echo '</ul></nav>';
        }
    }
}
