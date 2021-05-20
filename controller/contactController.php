<?php
include_once("controller/verificationController.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'asset/PHPMailer/src/Exception.php';
require 'asset/PHPMailer/src/PHPMailer.php';
require 'asset/PHPMailer/src/SMTP.php';
class contactController
{
    //propriétés
    public $nom;
    public $prenom;
    public $email;
    public $tel;
    public $message;
    public $motif;
    public $select;
    public $verif;

    public function __construct()
    {
        //attribution d'un nouvel objet vérification à la propriété vérif
        $this->verif = new Verification;
    }


    public function showContact()
    {

        //on verifie que l'utilisateur à envoyé un formulaire
        if (isset($_POST['submit'])) {

            
            //  On vérifie que tous les champs sont remplis correctement
            $nom = $this->verif->verifInput(@$_POST["nom"]);
            $prenom = $this->verif->verifInput(@$_POST["prenom"]);
            $email = $this->verif->verifEmail(@$_POST["email"]);
            $tel = $this->verif->verifTel(@$_POST["tel"]);
            $message = $this->verif->verifParagraphe(@$_POST["message"]);
            //Le champ est rempli alors motif égale à true
            if (@$_POST['motif'] != '') {
                $motif = true;
            }
            
            if ($nom && $prenom && $email && $message && $motif) {
                //IL FAUT ABSOLUMENT FAIRE UNE FONCTION MAIL SINON ON EST DANS LA sauce
               
                $mail = new PHPMailer(True);
                $mail->IsSMTP();
                $mail->Host = 'localhost';               //Adresse IP ou DNS du serveur SMTP
                $mail->Port = 25;                          //Port TCP du serveur SMTP
                $mail->SMTPAuth = 1;                        //Utiliser l'identification
                
                if($mail->SMTPAuth){
                    $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
                    $mail->Username   =  'm.pierre9993@gmail.com';   //Adresse email à utiliser
                    $mail->Password   =  'oops';         //Mot de passe de l'adresse email à utiliser
                }
                $mail->CharSet = 'UTF-8'; //Format d'encodage à utiliser pour les caractères
                $mail->smtpConnect();

                $mail->From       =  'm.pierre9993@gmail.com';                //L'email à afficher pour l'envoi
                $mail->FromName   = 'Contact de billy';     

                $mail->Subject    =  $motif;                      //Le sujet du mail
                $mail->WordWrap   = 50; 			                   //Nombre de caracteres pour le retour a la ligne automatique
                $mail->AltBody = $message; 	       //Texte brut
                $mail->IsHTML(false);             
                $mail->SMTPDebug = 1;                     //Préciser qu'il faut utiliser le texte brut
                echo'aaaaaaaa';
                $mail->AddAddress('morlelucas@gmail.com','John Doe');
                if (!$mail->send()) {
                    echo 'Message bien envoyé';
                } else{
                    echo $mail->ErrorInfo;
              }
            } 
            else {
                //IL FAUT FINIR CA QUOI
                echo 'Erreur : envoye du formulaire interrompu';
            }
        }
        //affiche la view de contact
        include('view/contact/contact.php');
    }



}
