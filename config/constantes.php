<?php
define('WEB_ROUTE','http://localhost:8001/');
define('HOST_BD','localhost');
define('ROUTE_DIR',str_replace('public','',$_SERVER['DOCUMENT_ROOT']));
define('USER_BD','mbd');
define('PASSWORD_BD','Cofina');
define('CHAINE_DE_CONNEXION','mysql:dbname=gestion_boutique;host='.HOST_BD); 
define ('NOMBRE_PAR_PAGE',3);
?>