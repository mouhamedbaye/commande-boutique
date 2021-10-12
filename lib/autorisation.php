<?php
function est_connecte():bool{
    return isset($_SESSION['userConnect']);
}
function est_responsable_stock():bool{
        return est_connect() && $_SESSION['userConnect']['id_role']=='1';
    }
    
function est_client():bool{
        return est_connect() && $_SESSION['userConnect']['id_role']=='5';
    }
function est_comptable():bool{
        return est_connect() && $_SESSION['userConnect']['id_role']=='3';
    }
?>