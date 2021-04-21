<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
@session_start();
$url = $_SERVER['REQUEST_URI'];

$product_ID = $_POST['product_id'];
$user_ID = $_POST['user_id'];

// Find idprod_tam


$query2="SELECT * FROM cart WHERE idutilizador='$user_ID' AND idprod_tam='$product_ID'";
$arrcart2=db_query($query2);

if(count($arrcart2)>0)
{
    $query="SELECT * FROM produtos_tamanho WHERE idprod_tam=$product_ID";
    $arrq=db_query($query);
    $qnttotal=$arrq[0]['quantidade'];
    foreach($arrcart2 as $f)
    {
        if($f['qnt']<$qnttotal){
        $add= $f['qnt'] + 1;
        $queryupd="UPDATE `cart` SET `qnt`='$add' WHERE idutilizador='$user_ID' and idprod_tam='$product_ID'";
        db_query($queryupd);
    }
    }
}else
{




    
    $query = "INSERT INTO cart (idutilizador,idprod_tam ,coddesconto,qnt) VALUES ('$user_ID', '$product_ID','','1')";
    $result = db_query($query);
}
   
?>
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>