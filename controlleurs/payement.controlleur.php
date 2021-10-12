<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['views'])){
        if($_GET['views']=='payement'){
            require(ROUTE_DIR. 'views/client/payement.html.php');
            
            }

            }

}
?>