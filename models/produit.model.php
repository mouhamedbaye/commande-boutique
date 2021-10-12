<?php

function find_all_produit(int $offset):array{
    $pdo= ouvrir_connexion_bd();
    $sql="SELECT * FROM `produit`    
    limit $offset,".NOMBRE_PAR_PAGE;
    /* $sql="select * from bien b where b.id_bien= ?" */
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    //fetch permet de recuperet un resultt /fetchAll ->tous les resultat
    $produit=$sth->fetchall();
    fermer_connexion_bd($pdo);
    return [
        'data'=> $produit,
        'count'=>$sth->rowcount()
    ];
    
}

function count_produit():int{
    $pdo= ouvrir_connexion_bd();
    $sql="SELECT * FROM `produit`  ";
    /* $sql="select * from bien b where b.id_bien= ?" */
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    //fetch permet de recuperet un resultt /fetchAll ->tous les resultat
    fermer_connexion_bd($pdo);
    return $sth->rowcount();
    
}
function insert_commande($data):int{
    $pdo= ouvrir_connexion_bd();
    extract($data);
    $sql="INSERT INTO `commande` (`etat_commande`, `numero_commande`, `date_commande`, `motant`, `date_livraison`, `adresse_livraison`, `remise`, `mtn_apres_remise`, `montant_restant`, `id_user`, `id_livreur`,`id_produit`) 
    VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($data);
    fermer_connexion_bd($pdo);
    return $sth->rowcount();
 }
function find_all_livreur():array{
    $pdo= ouvrir_connexion_bd();
    $sql="SELECT * FROM `livreur`    ";
    /* $sql="select * from bien b where b.id_bien= ?" */
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    //fetch permet de recuperet un resultt /fetchAll ->tous les resultat
    $livreur=$sth->fetchall();
    fermer_connexion_bd($pdo);
    return $livreur;
    
}
function find_produit():array{
    $pdo= ouvrir_connexion_bd();
    $sql="SELECT * FROM `produit`    ";
    /* $sql="select * from bien b where b.id_bien= ?" */
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    //fetch permet de recuperet un resultt /fetchAll ->tous les resultat
    $livreur=$sth->fetchall();
    fermer_connexion_bd($pdo);
    return $livreur;
    
}
function insert_produit(array $produit):int{
    $pdo= ouvrir_connexion_bd();
    extract($produit);
    $sql="INSERT INTO `produit` ( `libelle`, `prix`, `quantite`)
     VALUES ( ?, ?, ?);";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($libelle , $prix , $quantite));
    fermer_connexion_bd($pdo);
    return $sth->rowCount();
}
/* function insert_bien(array $bien):int{
    $pdo= ouvrir_connection_bd();
    $sql="INSERT INTO `bien` (`etat_bien`, `type_bien`, `reference`, `prix`, `description_bien`, `id_zone`, `date_creation`, `addresse`, `id_user`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
     $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute($bien);
  $dernier_id = $pdo->lastInsertId();
  fermer_connection_bd($pdo);//fermeture
  return $dernier_id ;
} */

function insert_image(array $image):int{
  $pdo= ouvrir_connection_bd();
  $sql="INSERT INTO `image` (`nom_image`, `id_produit`) VALUES (?,?);";
   $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute($image);
$dernier_id = $pdo->lastInsertId();
fermer_connection_bd($pdo);//fermeture
return $dernier_id ;
}
function insert_livreur(array $livreur):int{
    $pdo= ouvrir_connexion_bd();
    extract($livreur);
    $sql="INSERT INTO `livreur` (`id_livreur`, `prenom`, `nom`, `telephone`, `etat_livreur`) 
                VALUES (NULL,?,?,?,?);";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($prenom , $nom ,(int) $telephone, 'disponible'));
    fermer_connexion_bd($pdo);
    return $sth->rowCount();
}
function delete_user( $id_user):int{
    $pdo=ouvrir_connexion_bd();
    $sql="delete from user u where u.id_user=?";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_user]);
    fermer_connexion_bd($pdo);
    return $sth->rowCount();
 }
function delete_produit( $id_produit):int{
    $pdo=ouvrir_connexion_bd();
    $sql="delete from produit p where p.id_produit=?";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_produit]);
    fermer_connexion_bd($pdo);
    return $sth->rowCount();
 }
 function delete_livreur( $id_livreur):int{
    $PDO = ouvrir_connexion_bd();
    $sql="DELETE FROM livreur l WHERE l.id_livreur=?";
    $sth = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    /* var_dump($id_livreur); */
   /*  $now=date_create();
    $now=date_format($now,'Y-m-d'); */
    $sth->execute(array($id_livreur));
    $PDO = fermer_connexion_bd($PDO);
    return $sth->rowCount();
 }  
/* function find_bien_by_id(int $id):array{
    //excution dune requette non preparer 
    $sql="select * from bien b where b.id_bien=$id_bien";

    //excution dune requette preparer vk une joker non nommé
    $sql="select * from bien b where b.id_bien= ?";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':x' => $id_bien));
    //fetch permet de recuperet un resultt /fetchAll ->tous les resultat
    $red = $sth->fetch(); */

    //excution dune requette preparer vk une joker nommé
   /* $sql="select * from bien b where b.id_bien= :x";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(':x' => $id_bien));
    //fetch permet de recuperet un resultt /fetchAll ->tous les resultat
    $red = $sth->fetch();
    fermer_connexion_bd($pdo);
    return [];
}*/
/* function find_bien_reserver_by_client(){
    $pdo= ouvrir_connexion_bd();
    $sql="select * from bien b reservation r where b.id_bien=r.id_bien and r.id_user=?";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($id_client);
    $bien = $sth->fetchAll();
    fermer_connexion_bd($pdo);
    return $bien;
}
function find_bien_disponible():array{
        $pdo= ouvrir_connexion_bd();
        $sql="select * from bien b where b.etat_bien=?";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute(array("disponible"));
        $biens= $sth->fetchAll();
        fermer_connexion_bd($pdo);
        return $biens;
}


function update_bien(array $bien):int{
    $pdo= ouvrir_connexion_bd();
    extract($bien);
    $sql="UPDATE 'bien' SET etat_bien =?, type_bien= ?, description_bien=?, id_zone=?,
    WHERE bien . id_bien=?";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $now=date_crate();
    $now=date_format($now,'Y-m-d H:i:s');
    $sth->execute([$etat_bien,$type_bien,$prix,$description_bien,$id_zone,$adresse,$id_user,$id_bien]);
    fermer_connexion_bd($pdo);
    return $sth->rowCount();
    
}
function delete_bien(int $id_bien):int{
    $pdo= ouvrir_connexion_bd();
    extract($bien);
    $sql="delete from bien b where b.id_bien=? ";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([$id_bien]);
    fermer_connexion_bd($pdo);
    return $sth->rowCount();
    
}
function find_bien_by_zone_etat():array{
    $pdo= ouvrir_connexion_bd();
        $sql="select * from bien b group by  b.etat_bien, b.id_zone";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([]);
        $bien = $sth->fetchAll();
        fermer_connexion_bd($pdo);
        return $bien;
}
function find_filter_reservation(){
    $pdo= ouvrir_connexion_bd();
    extract($bien);
    $sql="SELECT * FROM reservation GROUP by date_reservation,etat_reservation,users";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $now=date_crate();
    $now=date_format($now,'Y-m-d');
    fermer_connexion_bd($pdo);
    return $sth->rowCount();
}
function find_bien_by_etat():array{
    $pdo= ouvrir_connexion_bd();
        $sql="SELECT * FROM bien b r group by  b.id_zone";
        $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute([]);
        $bien = $sth->fetchAll();
        fermer_connexion_bd($pdo);
        return $bien;
} */
?>