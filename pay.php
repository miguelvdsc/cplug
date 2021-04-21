<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
@session_start();
$user_ID = $_POST['idpt'];

$query="SELECT * FROM cart WHERE idutilizador='$user_ID'";
$arrquery=db_query($query);
foreach($arrquery as $v)
{
    $qnt=$v['qnt'];
    $idprod_tam=$v['idprod_tam'];
    $queryretirar="UPDATE produtos_tamanho SET quantidade=quantidade-$qnt WHERE idprod_tam=$idprod_tam";
    $arresult=db_query($queryretirar);

}

    $query = "DELETE FROM cart WHERE idutilizador='$user_ID'";
    $result = db_query($query);


   
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/logomin.jpg">
    <title>CPlug</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="style1.css" type="text/css">
</head>
<body style="background-color:#E9ECEF;">

<div class="jumbotron text-center">
  <img src="img/logo.jpg" alt="" style="width:50%">
  <h1 class="display-3">Obrigado pela sua preferência!</h1>
  <p class="lead">A CPlug agradece a sua compra.</p>
  <p class="lead">Verifique o seu email para ver a fatura da sua compra.</p>
  <hr>
  <p>
    Tem dúvidas? <a href="sobre.php">Contacte-nos</a>
  </p>

    <a class="btn btn-primary" href="index.php">Ir para página inicial</a>
    <p class="text-muted">Será redirecionado automaticamente em 10 segundos...</p>


    <?php
    header('Refresh: 10;index.php');

    ?>


</div>
</body>