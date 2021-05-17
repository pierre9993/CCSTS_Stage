<?php
//on démarre une session
session_start();
if (isset($_GET["disconnect"])) {
    $_SESSION['role'] = null;
    $_SESSION['password'] = null;
}
//on inclut la bdd pour pouvoir se connecter
include_once("bdd.php");

//on inclut le header avant le reste de la page
include_once("view/menu/header.php");


include("Router.php");
//On inclut le router et on lui envoie la requête de l'utilisateur
$router = new Router(@$_GET["page"]);
$router->getPage();



//on inclut le footer après le reste de la page
include_once("view/menu/footer.php");
