<?php

include_once("controller/adminController.php");
include_once("controller/actualiteController.php");
include_once("controller/realisationController.php");
include_once("controller/recrutementController.php");
include_once("controller/serviceController.php");
include_once("controller/proposController.php");
include_once("controller/accueilController.php");
include_once("controller/contactController.php");

class Router
{

    private $page;


    public function __construct($page = 0)
    {
        $this->page = $page;
    }

    /**
     * Déclenche l'appel au controller adéquat en fonction de la page demandée par l'utilisateur.
     */
    public function getPage()
    {

        switch ($this->page) {
            case 'admin':
                $admin = new adminController;
                $admin->showAdmin();
                break;
            case "actuForm":
                $actu = new actualiteController;
                $actu->verifActu();
                break;
            case "realForm":
                $real = new realisationController;
                $real->verifReal();
                break;
            case "servForm":
                $real = new serviceController;
                $real->verifService();
                break;
            case "refForm":
                $ref =  new adminController;
                $ref->verifRef();
                break;
            case "employeForm":
                $employe =  new adminController;
                $employe->verifEmploye();
                break;
            case "recrutForm":
                $recrut =  new recrutementController;
                $recrut->verifRecrutement();
                break;
            case 'actualites':
                $actualite = new actualiteController;
                $actualite->showActualites();
                break;
            case 'actualite':
                $actualit = new actualiteController;
                $actualit ->showActualite(@$_GET['idActu']);
                break;
            case 'realisations':
                $realisations = new realisationController;
                $realisations->showRealisations();
                break;
            case 'realisationsv2':
                $realisations = new realisationController;
                $realisations->showRealisationsv2();
                break;
            case 'realisation':
                $realisation = new realisationController;
                $realisation->showRealisation(@$_GET['idReal']);
                break;
            case 'recrutement':
                $recrutement = new recrutementController;
                $recrutement->showRecrutements();
                break;
            case 'services':
                $services = new serviceController;
                $services->showServices();
                break;
            case 'propos':
                $propos = new proposController;
                $propos ->showPropos();
                break;
            case 'contact':
                $contact= New contactController;
                $contact->showContact();
                break;
            case 'error':
                $error = "404 error";
                echo ($error);
                break;

            default:                
                $accueil= new accueilController;
                $accueil->showAccueil();
                break;
        }
    }
}
