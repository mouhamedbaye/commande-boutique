<?php


/* function add_versement($mnt_versement,$date_versement, $id_commande):int{
    $pdo = ouvrir_connexion_bd();
    $mnt_versement= (int)$mnt_versement;
    $id_commande = (int)$id_commande;
    $sql = "INSERT INTO Versement (`mnt_versement`,`date_versement`,`id_commande`) 
     VALUES ( ?, ? , ?)";
    $sth = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array($mnt_versement,$date_versement, $id_commande));
    fermer_connexion_bd($pdo);
    return $sth->rowCount();

}  */
function add_versement($data):int{
    $pdo = ouvrir_connexion_bd();
    extract($data);
    $sql = "INSERT INTO `versement` ( `numero_versement`, `date_versement`, `montant_versement`, `type_versement`, `id_commande`) 
            VALUES (?, ?, ?, ?, ?)";
    ;
    $sth = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($data);
    fermer_connexion_bd($pdo);
    return $sth->rowCount();

} 



?>