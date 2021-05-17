<?php
class verification
{
    public function verifInput($input)
    {
        //on supprime les espaces
        $input = str_replace(' ', '', $input);
        //vérifie que l'input correspond à l'expression régulière
        $test = preg_match("#^[a-zA-Z0-9._-\é\è\ê\€'-°!?,.]{2,55}$#", $input); // true ou false
        if ($test) {
            return true; // true
        } else {
            return false;
        }
    }
    public function verifParagraphe($input)
    {        
        //on supprime les espaces
        
        $input = str_replace(' ', '', $input);
        //vérifie que l'input correspond à l'expression régulière
        
        $test = preg_match("#[a-zA-Z0-9._-\é\è\ê\!§?€,'-°.]#", $input); // true ou false
        if ($test) {
            return true; // true
        } else {
            return false;
        }
    }
    //verifie la syntaxe pour un numéro de tel
    public function verifTel($input)
    {        
        //on supprime les espaces

        $input = str_replace(' ', '', $input);
        //vérifie que l'input correspond à l'expression régulière

        $test = preg_match("#[0-9.+]#", $input); // true ou false
        if ($test) {
            return true; // true
        } else {
            return false;
        }
    }

    public function verifDate($input)
    {
        //on supprime les espaces

        $input = str_replace(' ', '', $input);
        //vérifie que l'input correspond à l'expression régulière

        $test = preg_match("#[0-9]#", $input); // true ou false
        if ($test) {
            return true; // true
        } else {
            return false;
        }
    }


    public function verifEmail($valeur)
    {
        //vérifie que l'input correspond à l'expression régulière

        if (preg_match("#^[a-z0-9._-]{2,50}+@[a-z0-9._-]{2,50}\.[a-z]{2,5}$#", $valeur)) {
            return true; // true
        } else {
            return false;
        }
    }
}
