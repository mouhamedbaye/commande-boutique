<?php
function find_user_by_login_password($login,$password):array{
    $pdo= ouvrir_connexion_bd();

    $sql="select * from user u
     where
    u.login= ? and u.password=?";

    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($login,$password));
    $user = $sth->fetchALl();
    fermer_connexion_bd($pdo);
    return $user;
}
function login_exist($login):array {
    $pdo = ouvrir_connexion_bd();
    $sql = "select * from user u 
       where u.login like ?
    ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$login ]);
    $user = $sth->fetchAll((PDO::FETCH_ASSOC));
    fermer_connexion_bd($pdo);
    return  $user ;
 }
 function add_user(array $user, $files):int{
    $pdo = ouvrir_connexion_bd();
    extract($user);
    $sql = "INSERT INTO `user` ( `prenom_user`, `nom_user`, `login`, `password`, `id_role`, `image`) 
               VALUES (?,?,?,?,?,?);";
     /*  if (!est_responsable_stock()) {
             $id_role = 1;
          }else {
             $id_role = 5;
          } */
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($prenom_user , $nom_user ,$login, $password, $role, $files["image"]["name"] ));
    $user = $sth->fetchAll(PDO::FETCH_ASSOC);
    fermer_connexion_bd($pdo);
    return $sth->rowCount();
 }
/*  function nouveau_user(array $user):int{
   $pdo = ouvrir_connexion_db();
   extract($user);
   $sql = " INSERT INTO user (prenom_user, nom_user, login, password , id_role  ) 
   VALUES (?, ?, ?, ?, ?)";
      if (!est_responsable_stock()) {
            $id_role = 1;
         }else {
            $id_role = 5;
         } 
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($nom , $prenom ,$login, $password,  $id_role ));
   $user = $sth->fetch(PDO::FETCH_ASSOC);
   fermer_connexion_bd($pdo);

   return $user ;
} */
 function insert_user(array $user):int{
   $pdo= ouvrir_connexion_bd();
   extract($user);
   $sql="INSERT INTO `user` (`id_user`, `prenom_user`, `nom_user`, `login`, `password`, `id_role`, `image`) 
            VALUES (NULL, ?,?,?,?,?);";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($prenom_user , $nom_user , $login , $password,));
   fermer_connexion_bd($pdo);
   return $sth->rowCount();
}

function find_all_user(/* $offset */):array{
   $pdo= ouvrir_connexion_bd();
   $sql="SELECT * FROM user 
  /*  limit $offset, */"/* .NOMBRE_PAR_PAGE */;
   /* $sql="select * from bien b where b.id_bien= ?" */
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
   //fetch permet de recuperet un resultt /fetchAll ->tous les resultat
   $user=$sth->fetchall();
   fermer_connexion_bd($pdo);
   return $user/* [
      'data'=> $user,
      'count'=>$sth->rowcount()
  ] */;
   
}

/* function count_user():int{
   $pdo= ouvrir_connexion_bd();
   $sql="SELECT * FROM user ";
   /* $sql="select * from bien b where b.id_bien= ?" */
   /* $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(); */
   //fetch permet de recuperet un resultt /fetchAll ->tous les resultat
  /*  fermer_connexion_bd($pdo);
   return $sth->rowcount();
   
} */ 
function find_all_role():array{
   $pdo= ouvrir_connexion_bd();
   $sql="SELECT * FROM `role` ";
   /* $sql="select * from bien b where b.id_bien= ?" */
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
   //fetch permet de recuperet un resultt /fetchAll ->tous les resultat
   $role=$sth->fetchall();
   fermer_connexion_bd($pdo);
   return $role;
   
}
/* function find_all_user():array{
   $pdo= ouvrir_connexion_bd();
   $sql="SELECT * FROM `user`    ";
   /* $sql="select * from bien b where b.id_bien= ?" */
   /* $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute();
   //fetch permet de recuperet un resultt /fetchAll ->tous les resultat
   $user=$sth->fetchall();
   fermer_connexion_bd($pdo);
   return $user;
    } */
 
/* function find_id_user(int $count):array{
   $pdo= ouvrir_connexion_bd();
   $sql="SELECT * FROM `user` WHERE u.id_user=?   ";
   /* $sql="select * from bien b where b.id_bien= ?" */
  /*  $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
   $sth->execute(array($id_user)); */
   //fetch permet de recuperet un resultt /fetchAll ->tous les resultat
   /* $user=$sth->fetch();
   fermer_connexion_bd($pdo);
   return $user; 

   } */
   
 

/*  = $del->rowCount() */
 