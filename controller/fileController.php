<?php
class FileController
{

    //Vérifie que l'entrée est une image
    public function isImage($image){
        $extension = explode(".", $image);
        //on récupère l'extention qui se trouve à la fin du tableau
        $extension = end($extension);
        return($this->extension($extension));
    }


    //Vérifie que l'image existe
    public function imageExist($nameInput)
    {
        //Si l'input contient des erreurs renvoi false
        if ($_FILES[$nameInput]["error"] >0) {
            return false;
        } else {
            return true;
        }
    }

    //Vérifie les images
    public function verifImage($nameInput)
    {
        //On récupère les données du fichier envoyer
        $fileName = $_FILES[$nameInput]['name'];
        $fileSize = $_FILES[$nameInput]["size"];
        //on fait des séparation à chaque fois qu'il y a un "." dans le nom du fichier pour récupérer l'extention
        $extension = explode(".", $fileName);
        //on récupère l'extention qui se trouve à la fin du tableau
        $extension = end($extension);
        //si l'extension est true et que le fichier ne dépasse pas un certain poids exprimer en bits.
        if ($this->extension($extension) && $fileSize < 16000000) {
            return true;
        } else {
            return false;
        }
    }
    //Vérifie l'extension d'un fichier envoyé
    public function extension($extension)
    {
        //Création d'un tableau contenant les extensions que nous autorisons.
        $aExtention = array('jpg', 'png', 'jpng', 'gif','PNG');
        //Compare les deux valeurs, si l'extension est bien dans le tableau renvoi true sinon renvoi false.
        if (in_array($extension, $aExtention)) {
            return true;
        } else {
            return false;
        }
    }
    //Fonction d'upload
    public function upload($nameInput, $type)
    {
        //attribut à $dossier une valeur selon une condition
        switch ($type) {
            case 'actualite':
                $dossier = "image/actualiteImage/";
                break;
            case 'realisation':
                $dossier = "image/realisationImage/";
                break;
            case 'service':
                $dossier = "image/serviceImage/";
                break;
            case 'employe':
                $dossier = "image/employeImage/";
                break;
            case 'recrutement':
                $dossier = "image/recrutementImage/";
                break;
        }
        //on récupère le nom du fichier uploader
        $fileName = $_FILES[$nameInput]['name'];

        //on récupère l'extention qui se trouve à la fin du nom, puis du tableau
        $extension = explode(".", $fileName);
        $extension = end($extension);

        //On modifie le nom du fichier
        $date = date("m_d_Y_h_i_s", (microtime(true)));

        $fileName = $type. $nameInput . $date . '.' . $extension;

        //va indiquer la position ET le nom
        $fichier = $dossier . basename($fileName);
        $_FILES[$nameInput]['name'] = $fichier;
        //on déplace le fichier depuis son emplacement de stockage temporaire vers celui du site qui lui a été attribué
        if (move_uploaded_file($_FILES[$nameInput]["tmp_name"], $fichier)) {
            return true;
        } else {
            //affiche l'erreur suivante
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
}
