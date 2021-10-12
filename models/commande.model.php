<?php

    function find_all_commande():array{
        
        $pdo= ouvrir_connexion_bd();
        $sql="SELECT * FROM commande c,produit p 
        where p.id_produit=c.id_produit";
        $sth = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $sth->execute();
        //fetch permet de recuperet un resultat /fetchAll ->tous les resultats
        $commande=$sth->fetchall();
        fermer_connexion_bd($pdo);
        return $commande;
        var_dump(find_all_commande());
        die();
        
    }
?>