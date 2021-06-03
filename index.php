<?php
//on démarre une session 
session_start();
if (isset($_GET["disconnect"])) {
    $_SESSION['role'] = null;
    $_SESSION['name'] = null;
}
if($_SESSION['acces']===1){

//on inclut la bdd pour pouvoir s'y connecter
include_once("bdd.php");

//on inclut le header avant le reste de la page
include_once("view/menu/header.php");


include("Router.php");
//On inclut le router et on lui envoie la requête de l'utilisateur
$router =  Router::getPage(@$_GET["page"]);

//on inclut le footer après le reste de la page
include_once("view/menu/footer.php");



}
else{
     include('testacces.php');
    }