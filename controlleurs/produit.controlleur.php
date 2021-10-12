<?php

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['views'])){
        if($_GET['views']=='ajout.user'){
            get_user();
        }elseif ($_GET['views']=='liste.produit'){
            produit_mine();
        }elseif ($_GET['views']=='creer.user'){
            require_once (ROUTE_DIR. 'views/responsable/creer.user.html.php');
        }elseif ($_GET['views']=='delete'){
            delet();
            delete();
            poubelle();
        }elseif ($_GET['views']=='ajoutproduit'){
            require_once (ROUTE_DIR. 'views/responsable/ajoutproduit.html.php');
        }elseif ($_GET['views']=='liste.livreur'){
            get_livreur();
        }elseif ($_GET['views']=='ajout.livreur'){
            require_once (ROUTE_DIR. 'views/responsable/ajout.livreur.html.php');
        }

        }
    }elseif($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['action'])){
        if($_POST['action']=='ajoutproduit'){
            ajout_produit($_POST);
        }elseif($_POST['action']=='ajout.livreur'){
            ajout_livreur($_POST);
        }elseif($_POST['action']=='ajout.user'){
            unset($_POST['controlleurs']);
            unset($_POST['action']);
            //unset($_POST['ajout.user']);
            //unset($_POST['confpassword']);
            ajout_user($_POST ,$_FILES);
            
        }elseif($_POST['action']=='supprimer'){/* 
            unset($_POST['controlleurs']);
            unset($_POST['action']);
            unset($_POST['supprimer']); */
            /* var_dump($_POST);die; */
            /* var_dump($user);die; */
            $user=delete_livreur($_POST['id_livreur']);
            header('Location'.WEB_ROUTE.'?controlleurs=responsable&views=ajout.user');
            exit();
    }
}
}
function produit_mine(){
    $count = count_produit();
    $par_page = NOMBRE_PAR_PAGE;
    $current_page=isset($_GET['page'])?$_GET['page']:1;
    $page=ceil($count/$par_page);
    $premier=($current_page*$par_page)-$par_page;
    $produits=find_all_produit($premier);
    $prod=$produits['data'];
    require(ROUTE_DIR.'views/responsable/liste.produit.html.php');
  }
function poubelle(){
    $id=$_GET['id_user'];
    delete_user($id);
    require_once (ROUTE_DIR. 'views/responsable/confirmation.html.php');

}
function delet(){
    $id=$_GET['id_livreur'];
    delete_livreur($id);
    require_once (ROUTE_DIR. 'views/responsable/confirmation.html.php');

}
function delete(){
    $id=$_GET['id_produit'];
    delete_produit($id);
    require_once (ROUTE_DIR. 'views/responsable/confirmation.html.php');

}
function ajout_user(array $data,$files):void{
    $arrayError = array();
    extract($data);
    if(form_valid($arrayError)){
        $target_dir= "upload";
        $target_file= $target_file . basename($_FILES["image"]["name"]);
        $data['image']= $target_file;
        upload_image($_FILES, $target_file);
        add_user($data ,$files);
         /* var_dump($data);
            die ();  */
        header("location:".WEB_ROUTE. '?controlleurs=responsable&views=ajout.user ');
    }else{
        $arrayError['image']="Erreur de telechargement";
        $_SESSION['arrayError'] = $arrayError;
        header("location:".WEB_ROUTE. '?controlleurs=security&views=');
        
    }

    }
function get_user(){
        /* $count = count_user();
        $par_page = NOMBRE_PAR_PAGE;
        $current_page=isset($_GET['page'])?$_GET['page']:1;
        $page=ceil($count/$par_page);
        $premier=($current_page*$par_page)-$par_page; */
        $user= find_all_user();
/*         $userr=$users['data'];
 */        require_once (ROUTE_DIR. 'views/responsable/ajout.user.html.php');

    }
    
function ajout_produit(array $data):void{
    $arrayError = array();
    extract($data);
    if(form_valid($arrayError)){
        insert_produit($data);
        header("location:".WEB_ROUTE. '?controlleurs=responsable&views=ajoutproduit ');
    }else{
       
        $arrayError['avatar']="Erreur de telechargement";
        $_SESSION['arrayError'] = $arrayError;
        header("location:".WEB_ROUTE. '?controlleurs=security&views=');
        
    }

    }
/* function get_produit(){
        $produit= find_all_produit();
        require_once (ROUTE_DIR. 'views/responsable/liste.produit.html.php');

    } */
 function ajout_livreur(array $data):void{
        $arrayError = array();
        extract($data);
        if(form_valid($arrayError)){
            insert_livreur($data);
            header("location:".WEB_ROUTE. '?controlleurs=responsable&views=ajout.livreur ');
        }else{
           
            $arrayError['avatar']="Erreur de telechargement";
            $_SESSION['arrayError'] = $arrayError;
            header("location:".WEB_ROUTE. '?controlleurs=security&views=');
            
        }
    
        }
    function get_livreur(){
        $livreur= find_all_livreur();
        require_once (ROUTE_DIR. 'views/responsable/liste.livreur.html.php');

    } 
  /*   function lister_reservation_un_client(int $id_client):array{

        $reservations= find_bien_reservation_by_client($id_client)
        require(ROUTE_DIR. 'views/reservation/mes.reservation.html.php');
    }

    function traiter_reservation(int $id_reservation, string $etat='annuler'):bool{
        return false;
    }
 */
   /*  function liste_acceuil(){
        if(!est_responsable_stock()){
            require_once (ROUTE_DIR. 'views/controlleurs/connexion.html.php');
        }
        require_once (ROUTE_DIR. 'views/responsable/ajout.user.html.php');
    } */

    /*  function reservation_bien(int $id_client):int{
        return false;
        if(!isset($_GET['id_bien'])|| !is_numeric($_GET['id'])){
            header('location:'.WEB_ROUTE);
            exit;
        }
        $id=$_GET['id_bien'];
        $detail= find_bien_by_id($id);
        $date= date_create("Y-m-d");
        
    } 

    function liste_reservation_en_cours(){
    $reservations=find_all_reservation();
    require_once (ROUTE_DIR. 'views/gestionnaire/liste.reservation.html.php');
    } */
?>