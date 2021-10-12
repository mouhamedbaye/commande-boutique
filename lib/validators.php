<?php
/* function valider( $pattern,  $chaine,array $error):bool{
    return preg_match($pattern,$chaine);
} */

// fonction de validation
function est_vide($valeur): bool {
    return empty($valeur);
}
function est_vide1(string $chaine): bool {
    return empty($chaine);
}

function est_entier($valeur): bool {
   // $entier = (int) $valeur;
    return is_numeric($valeur);
}

function est_superieur(int $valeur): bool {
    return $valeur > VAL;
}
function est_chaine(string $chaine): bool {
    return $chaine ;
}

function verif_taille(string $valeur):bool{
    return strlen($valeur)<=25;
}
function verif_taille2(string $valeur):bool{
    return strlen($valeur)<=19;
}
function est_mail($valeur):bool{
    if(filter_var($valeur, FILTER_VALIDATE_EMAIL)){
        return true;
    }else {
        return false;
    }
}
function validation_password($valeur, string $key,array &$arrayError,int $min=6,int $max=10){
    if(est_vide($valeur)){
        $arrayError[$key] = "le password est obligateur";
    }elseif(strlen($valeur)<$min || strlen($valeur)>$max){
        $arrayError[$key] = "le password doit etre entre $min et $max";
    }
}
function validation_login($valeur, string $key,array &$arrayError){
    if(est_vide($valeur)){
        $arrayError[$key] = "le login est obligateur";
        }elseif (!est_mail($valeur)){
        $arrayError[$key] ="le login doit etre un mail";
        }
    }
    function validation_champ($valeur, string $key,array &$arrayError){
        if(est_vide($valeur)){
            $arrayError[$key] = "le ".$key." est obligateur";
            }
        }
        
    function form_valid($arrayError): bool {
        if (count($arrayError) == 0);{
            return true;
        }
        return false;
    }

    function est_phrase(string $chaine):bool{
        return $chaine;
    }
    function valide_phrase(string $text):bool{
        return $text;
    }
    function valid_point($valeur, string $key, array &$arrayError){
        if (est_vide($valeur)){
            $arrayError[$key] = "le champ doit etre obligatoire";
        }elseif ($valeur<=0){
            $arrayError[$key]= "veiller saisir un nombre positif";
        }
    }
    function valid_nbr_question($valeur, string $key, array &$arrayError){
        if (est_vide($valeur)){
            $arrayError[$key] = "le champ doit etre obligatoire";
        }elseif ($valeur<=0){
            $arrayError[$key]= "veiller saisir un nombre positif";
        }
    }
    function valid_input($valeur, string $key, array &$arrayError){
        if (empty($valeur)){
            $arrayError[$key] = "le champ est obligatoire";
        }

    }
    function validation_input($valeur,string $key , &$error):array {
        $error =[];
        if (empty($valeur)){
            $error[$key] = "Champ obligatoire";
        }elseif (!is_numeric($valeur)) {
            $error[$key] = "saisir une valeur entiere";
        }elseif ($valeur <=0) {
            $error[$key] = "saisir une valeur entiere";
        }
        return $error;
    }

    ?>