<?php
  /*   if($_SERVER['REQUEST_METHOD']=='GET'){
        if(isset($_GET['views'])){
            if($_GET['views']=='catalogue'){
                require_once (ROUTE_DIR. 'views/bien/catalogue.html.php');
    
            }
        }
    } 
    function add_bien(array $bien):bool{

    }
    function modif_bien(array $bien):bool{
        return true;
    }
    function archiver_bien(int $bien):bool{
        return true;
    }
    function lister_bien():array{
        return null;
    }
    function detail_bien(int $id):array{
        if(!isset($_GET['id_bien'])|| !is_numeric($_GET['id'])){
            header('location:'.WEB_ROUTE);
            exit;
        }
        $id=$_GET['id_bien'];
        $detail= find_bien_by_id($id);
        require_once (ROUTE_DIR.'views/bien/detail.html.php');
    }
    function catalogue(){
       $biens= find_bien_disponible();
       require(ROUTE_DIR.'views/bien/catalogue.html.php');
    }

      */
?>