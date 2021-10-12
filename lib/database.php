<?php

function ouvrir_connexion_bd():PDO{
    
    try{ 
        $options=[
            PDO::ATTR_CASE=>PDO::CASE_LOWER,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
        ];
        $pdo = new PDO(CHAINE_DE_CONNEXION,USER_BD,PASSWORD_BD,$options);
        return $pdo;   
    }catch (PDOException $e){
         die ($e->getMessage);
    }
}
function fermer_connexion_bd(PDO $pdo){
    $pdo=null;
}
    
?>