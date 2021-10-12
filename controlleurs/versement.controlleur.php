<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['views'])) {
       if ($_GET['views']=='liste_versement') {
        require(ROUTE_DIR.'views/versement/liste.versement.html.php');
       }
    }else{
           require(ROUTE_DIR.'views/security/connexion.html.php');
        }

    }elseif ($_SERVER['REQUEST_METHOD']=='POST') {
         if (isset($_POST['action'])) {
            if ($_POST['action']=='ajout_versement') {
                unset($_POST['controlleurs']);
                unset($_POST['action']);
                ajout_versement($_POST);
            }
         }
    }   
    function ajout_versement(array $data):void{
      $arrayError = array();
      extract($data);
      if(form_valid($arrayError)){
         $data=[
            rand(),
            $date_versement,
            $montant_versement,
            $type_versement,
            $commande
         ];
          add_versement($data);
          header("location:".WEB_ROUTE. '?controlleurs=versement&views=ajout_versement ');
      }else{
         
          $arrayError['avatar']="Erreur de telechargement";
          $_SESSION['arrayError'] = $arrayError;
          header("location:".WEB_ROUTE. '?controlleurs=security&views=');
          
      }
  
      }