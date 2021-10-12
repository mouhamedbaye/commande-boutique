<?php
function catalogue(){
    $biens= find_bien_disponible();
    require(ROUTE_DIR.'views/bien/catalogue.html.php');
 }