<?php
require(ROUTE_DIR. 'controlleurs/controller.php');

if(isset($_REQUEST['controlleurs'])){
    if($_REQUEST['controlleurs']=='security'){
        require_once (ROUTE_DIR. 'controlleurs/security.controlleur.php');
    }elseif ($_REQUEST['controlleurs']=='responsable') {
        require_once (ROUTE_DIR. 'controlleurs/produit.controlleur.php');
    }elseif ($_REQUEST['controlleurs']=='payement') {
        require_once (ROUTE_DIR. 'controlleurs/payement.controlleur.php');
    }elseif ($_REQUEST['controlleurs']=='commande') {
        require_once (ROUTE_DIR. 'controlleurs/commande.controlleur.php');
    }elseif ($_REQUEST['controlleurs']=='versement') {
        require_once (ROUTE_DIR. 'controlleurs/versement.controlleur.php');
        }
}else{
    require_once (ROUTE_DIR. 'views/security/connexion.html.php');
    }



    /* if(isset($_REQUEST['controlleurs'])){
        if($_REQUEST['controlleurs']=='security'){
            require_once (ROUTE_DIR. 'controlleurs/security.php');
        }elseif ($_REQUEST['controlleurs']=='admin') {
            require_once (ROUTE_DIR. 'controlleurs/admin.php');
        }elseif ($_REQUEST['controlleurs']=='joueur') {
            require_once (ROUTE_DIR. 'controlleurs/joueur.php');
        }
    }else{
        require_once (ROUTE_DIR. 'views/security/connexion.html.php');
        } */

?>