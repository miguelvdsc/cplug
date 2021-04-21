<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
@session_start();
$url = $_SERVER['REQUEST_URI'];
$id=$_SESSION['id'];
$product_ID = $_POST['code'];
$qty = $_POST['quantity'];

$query="UPDATE `cart` SET `idutilizador`='$id',`idprod_tam`='$product_ID',`qnt`='$qty' WHERE idutilizador='$id' AND idprod_tam='$product_ID' ";
db_query($query);

?>