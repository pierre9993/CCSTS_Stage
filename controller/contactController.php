<?php
include_once("controller/verificationController.php");

require '.env.local';

require 'asset/PHPMailer/src/Exception.php';
require 'asset/PHPMailer/src/PHPMailer.php';
require 'asset/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class contactController
{
    //propriétés
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
                //fonction mail
                
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->Host = 'smtp.gmail.com';               //Adresse IP ou DNS du serveur SMTP
                $mail->Port = 465;                          //Port TCP du serveur SMTP
                $mail->SMTPAuth = 1;                        //Utiliser l'identification


                if($mail->SMTPAuth){
                    $mail->SMTPSecure = 'ssl';   //Protocole de sécurisation des échanges avec le SMTP
                    $mail->Username   =  Env::username_mail ;   //Adresse email à utiliser
                    $mail->Password   =  Env::mdp_mail;         //Mot de passe de l'adresse email à utiliser
                }

               $mail->CharSet = 'UTF-8'; //Format d'encodage à utiliser pour les caractères

                $mail->From       =  Env::username_mail ;                //L'email à afficher pour l'envoi
                $mail->FromName   = 'Message de '.@$_POST["nom"] . ' '.@$_POST["prenom"];     

                $mail->Subject    ='['. @$_POST["motif"].'] Message de '.@$_POST["nom"] . ' '.@$_POST["prenom"];                      //Le sujet du mail
                $mail->WordWrap   = 50; 			                   //Nombre de caracteres pour le retour a la ligne automatique
                $mail->AltBody = $message; 	       //Texte brut
                $mail->IsHTML(false);               //Préciser qu'il faut utiliser le texte brut
      
                $mail->AddAddress(Env::username_mail ,'John Doe');

                $mail->Body = '<u>Expéditeur</u> : '. @$_POST["nom"] .' ' . @$_POST["prenom"] .' | Contact : '. @$_POST["email"] .' | '. @$_POST["tel"].' <br/><br/>
                <u> Statut </u>: '. @$_POST["qui"] .' <br/><br/> 
                <u>Motif de Contact </u>: '.  @$_POST["motif"] .' <br/><br/> 
                <u>  Message</u> : '.  @$_POST["message"]     ;

                if (!$mail->send()) {
                    echo $mail->ErrorInfo;
              } else{
                    echo 'Message bien envoyé';
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
