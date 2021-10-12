<?php
function find_all_reservation($etat_reservation):array{
    $pdo= ouvrir_connexion_bd();
    $sql="select * from reservation r bien b user u where r.id_user=u.id_user 
    and r.id_bien=b.id_bien 
    and r.etat_reservation like 'en cours'";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    $reservations = $sth->fetchAll(array($etat_reservation));
    fermer_connexion_bd($pdo);
    return $reservations;
}
/* function find_reservation_by_bien(int $id_bien):array{
    $pdo= ouvrir_connexion_bd();
    $params= array($etat_reservation)
    $sql="select * from reservation r user u where  
    and r.id_bien=b.id_bien 
    and r.id_user=u.id_user
    and r.etat_reservation like'en cours'";
    if(!is_null($date)){
        $sql='and r.date_reservation like ?';
        $params[]=$date;
    }
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($id_bien);
    $reservations = $sth->fetchAll();
    fermer_connexion_bd($pdo);
    return $reservations;
} */
function find_reservation_by_date_or_etat($etat_reservation,$date=null):array{
    $pdo= ouvrir_connexion_bd();
    $sql="select * from reservation r bien b user u where r.id_user=u.id_user 
    and r.id_bien=b.id_bien 
    and r.etat_reservation like 'en cours'";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute();
    $bien = $sth->fetchAll(array($etat_reservation));
    fermer_connexion_bd($pdo);
    return $bien;
}

 /* function find__reservation_by_bien_date_etat_client():array{
    $pdo= ouvrir_connexion_bd();
    $sql="select * from reservation r user u bien b 
    where u.id_user=r.id_user 
    and b.id_bien=?r.id_bien 
    group by b.id_bien, r.date_reservation,
     r.etat_reservation,u.id_user;
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute([]);
    $reservations = $sth->fetchAll();
    fermer_connexion_bd($pdo);
    return $reservations;
} */

/* function find_bien_reservation_by_client(int $id_client):array{
    $pdo= ouvrir_connexion_bd();
    $params= array($etat_reservation)
    $sql="select * from reservation r user u,bien b where  
    r.id_bien=b.id_bien 
    and b.id_user=u.id_user
    and r.id_user=?";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($id_client);
    $bien = $sth->fetchAll();
    fermer_connexion_bd($pdo);
    return $bien; */

function insert_reservation(array $data):int{
    $pdo= ouvrir_connexion_bd();
    $sql="";
    $sth = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute($data);
    $nbr_ligne = $sth->rowCount();
    fermer_connexion_bd($pdo);
    return $nbr_ligne;
}
?>