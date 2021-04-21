<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
@session_start();
$url = $_SERVER['REQUEST_URI'];

$product_ID = $_POST['product_id'];
$user_ID = $_POST['user_id'];

// Find idprod_tam

    //ADD
    
    $query = "DELETE FROM favoritos WHERE idutilizador='$user_ID' AND idprod='$product_ID'";
    
    $result = db_query($query);
   
?>