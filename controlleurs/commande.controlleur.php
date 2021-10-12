<?php 
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['views'])){
        if($_GET['views']=='ajoutcommande'){
            getlivreur();
        }elseif ($_GET['views']=='liste.commande'){
            require_once (ROUTE_DIR. 'views/commande/liste.commande.html.php');
        }
     }
}elseif($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['action'])){
        if($_POST['action']=='ajoutcommande'){
            ajout_commande($_POST);
        }
    }

}
function ajout_commande(array $data):void{
    $arrayError = array();
    extract($data);
    if(form_valid($arrayError)){
        $date=date_format(date_create(),'Y-m-d');
        $mtn_apres_remise=($montant*$remise)/100;
        $motant_restant=$montant-$mtn_apres_remise;
        $id_user=$_SESSION['userConnect'][0]['id_user'];
        $data=[
                'en cours',
                rand(),
                $date,
                $montant,
                $date_livraison,
                $adresse,
                $remise,
                $mtn_apres_remise,
                $motant_restant,
                $id_user,
                $livreur,
                $produit

        ];
       insert_commande($data);
        header("location:".WEB_ROUTE. '?controlleurs=commande&views=ajoutcommande ');
    }else{
       
        $arrayError['avatar']="Erreur de telechargement";
        $_SESSION['arrayError'] = $arrayError;
        header("location:".WEB_ROUTE. '?controlleurs=security&views=');
        
    }

} 
function get_commande(){
    $commandes= find_all_commande();
    require_once (ROUTE_DIR. 'views/commande/liste.commande.html.php');

} 
function getlivreur(){
    $prod=find_produit();
    $livreurs= find_all_livreur();
    require(ROUTE_DIR. 'views/commande/ajout.commande.html.php');

} 
?>