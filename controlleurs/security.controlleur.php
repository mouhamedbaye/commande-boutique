<?php

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['views'])){
        if($_GET['views']=='connexion'){
            require_once (ROUTE_DIR. 'views/security/connexion.html.php');
        }elseif ($_GET['views']=='inscription'){
            require(ROUTE_DIR. 'views/security/inscription.html.php');
        }elseif($_GET['views']=='deconnexion'){
            deconnexion();
        }
    }
} elseif($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['action'])){
        if($_POST['action']=='connexion'){
          connexion($_POST['login'],$_POST['password']);
        }elseif ($_POST['action']== 'inscription') {
            unset($_POST['controlleurs']);
            unset($_POST['action']);
            unset($_POST['inscription']);
            unset($_POST['confpassword']);

            inscription($_POST,$_FILES);
        }
}
}

/* if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['views'])){
        if($_GET['views']=='connexion'){
            require_once (ROUTE_DIR. 'views/security/connexion.html.php');
        }elseif ($_GET['views']=='inscription'){
            require_once (ROUTE_DIR. 'views/security/inscription.html.php');
        }elseif($_GET['views']=='deconnexion'){
            deconnexion();
            require(ROUTE_DIR. 'views/security/connexion.html.php');
        }
    }else {
        require_once (ROUTE_DIR. 'views/security/connexion.html.php');
        }
}elseif($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['action'])){
        if($_POST['action']=='connexion'){  
            connexion($_POST['login'],$_POST['password']);
        }elseif ($_POST['action']== 'inscription') {
            unset($_POST['controlleurs']);
            unset($_POST['action']);
            unset($_POST['btn_submit']);
            inscription($_POST);
        }
}
} */

function connexion( $login,$password):void{
    $arrayError=array();
    validation_login($login, 'login', $arrayError);
    validation_password($password, 'password', $arrayError);
    if(form_valid($arrayError)){
        $user= find_user_by_login_password($login,$password);
   
        if(count($user)==0){
            $arrayError['erreurConnexion']='Login ou Password Incorrect';
            $_SESSION['arrayError']= $arrayError;
            header('location:'.WEB_ROUTE. '?controlleurs=security&views=connexion');
        }else {
            $_SESSION['userConnect']=$user;
                if($user[0]['id_role'] == '1'){
                    header('location:'.WEB_ROUTE. '?controlleurs=responsable&views=ajout.user');
                }elseif ($user[0]['id_role']=='5') {
                    header('location:'.WEB_ROUTE.'?controlleurs=commande&views=ajoutcommande');
                }elseif ($user[0]['id_role']=='3') {
                    header('location:'.WEB_ROUTE.'?controlleurs=versement&views=liste.versement');
                }
    
         }

    }else{  $_SESSION['arrayError'] = $arrayError;
        header('location:'.WEB_ROUTE. '?controlleurs=security&views=connexion');
        exit();

   }
   }

   function inscription(array $data, array $files ):void{
       
    $arrayError = array();
    extract($data);
    
    validation_login($login,'login',$arrayError);
    
     if(login_exist($login)){
        $arrayError['login'] = 'Ce login existe déjà';
        $_SESSION['arrayError']=$arrayError;
        header('location:'.WEB_ROUTE.'?controlleurs=security&views=inscription');
  } 
    validation_password($password, 'password', $arrayError);
    validation_champ($prenom_user, 'prenom_user', $arrayError);
    validation_champ ($nom_user, 'nom_user', $arrayError);

    if ($password != $confpassword){
        $arrayError['confpassword'] = 'les deux password ne sont pas identique';
            } 
    if(count($arrayError)==0){
        $user = find_user_by_login_password($login, $password);
        if(est_responsable_stock()){
            $data['id_role'] = '1';
        }else {
            $data['id_role'] = '5';
        }
        
    }else{
        $_SESSION['arrayError'] = $arrayError;
        header('location:'.WEB_ROUTE. '?controlleurs=security&views=inscription');
    } 
    if(form_valid($arrayError)){
        /* var_dump($data);
       die (); */
       
       /*  $data['id_role']=est_responsable_stock()?'ROLE_RESPONSABLE_STOCK': 'ROLE_CLIENT';  */
        $target_dir= "upload";
        $target_file= $target_file . basename($_FILES["image"]["name"]);
        $data['image']= $target_file;
        valide_image($_FILES, $arrayError, 'image', $target_file); 
        upload_image($_FILES, $target_file);
        add_user($data, $files);
        header('location:'.WEB_ROUTE.'?controlleurs=security&views=connexion');
          if(count($arrayError) == 0) {
            if(!upload_image($_FILES, $target_file)) {
                $arrayError['image'] = "Erreur lors de l'upload de l'image";
                $_SESSION['arrayError']=$arrayError;
                header('location:'.WEB_ROUTE.'?controlleurs=security&view=inscription');
                exit();
          }
        } 
       /*  if (est_responsable_stock()) {
            require(ROUTE_DIR.'views/responsable/ajout.user.html.php' );
         }else {
             header('location:'.WEB_ROUTE.'?controlleurs=security&views=connexion');

         } */ 
        
       
        
    }else{
       
       /*  $arrayError['avatar']="Erreur de telechargement"; */
        $_SESSION['arrayError'] = $arrayError;
        header("location:".WEB_ROUTE. '?controlleurs=security&views=inscription');
        
    }

    }

    function deconnexion():void{
        unset($_SESSION['userConnect']);
        header('location:'.WEB_ROUTE.'?controllers=controlleurs&views=connexion');
    
    } 
?>