<?php

include_once("model/employeModel.php");
include_once("model/referenceModel.php");
include_once("model/realisationModel.php");

class proposController
{
    public static function showPropos()
    {
        //recupere la liste des employés
        $employe = new employeModel;
        $propos = $employe->getEmployes();
        //recupère la liste des réalisations
        $reals= new RealisationModel;
        $reals=$reals->getRealisations(5, @$_GET["pageReal"]);
        //affiche la view de propos, qui va utiliser les elements ainsi récupérer.
        include('view/propos/propos.php');
    }
}
