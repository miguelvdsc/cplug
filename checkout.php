<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
@session_start();
$id = $_SESSION['id'];
$queryscart1 =("SELECT * FROM cart A 
INNER JOIN utilizadores B ON A.idutilizador = B.id
INNER JOIN produtos_tamanho C on A.idprod_tam = C.idprod_tam
INNER JOIN tamanho D on C.idtam = D.idtamanho
INNER JOIN produtos E ON C.idproduto = E.idprod
INNER JOIN subcategoria F ON E.categoria = F.id 
INNER JOIN genero G ON E.genero=G.id
INNER JOIN tipo H ON E.tipo = H.idtipo
INNER JOIN saldo I on E.saldo = I.idsaldo
WHERE E.estado = 1 AND A.idutilizador=$id");
$arrqueryscart1=db_query($queryscart1);
$query = "SELECT * FROM utilizadores WHERE id = $id";
$arrRes = db_query($query);
$v = $arrRes[0];
?>

<!DOCTYPE html>
<html lang="zxx">

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

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="nikki-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                   <?php include $arrSETTINGS['dir_site'].'/include/menu.inc.php' ?>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="include/form_checkout_edit.php" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                          
                            <h6 class="checkout__title">Detalhes de conta</h6>
                            <div class="row">
                            <input type="hidden" name="id" value="<?php echo $v['id']; ?>">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nome<span>*</span></p>
                                        <input required type="text" name="nome" value="<?php echo $v['nome']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Apelido<span>*</span></p>
                                        <input required type="text" name="apelido"value="<?php echo $v['apelido']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input required type="email" name="email"value="<?php echo $v['email']; ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Morada<span>*</span></p>
                                <input required type="text" name="morada" class="checkout__input__add"value="<?php echo $v['morada']; ?>">
                                
                            </div>
                            <div class="checkout__input">
                                <p>Código Postal<span>*</span></p>
                                <input required type="text" name="codpostal" value="<?php echo $v['codpostal']; ?>">
                            </div>
                            
                            <div class="checkout__input">
                                <p>Distrito<span>*</span></p>
                                <input required type="text" name="distrito" value="<?php echo $v['distrito']; ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Telemovel<span>*</span></p>
                                <input required type="number" name="telefone" value="<?php echo $v['telefone']; ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Nome do cartão<span>*</span></p>
                                <input required type="text" name="cardname" value="<?php echo $v['telefone']; ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Numero do cartão<span>*</span></p>
                                <input required type="number" name="cardnum" value="<?php echo $v['telefone']; ?>">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Validade<span>*</span></p>
                                        <input required type="text" name="val" value="<?php echo $v['nome']; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Csv<span>*</span></p>
                                        <input required type="number" name="csv"value="<?php echo $v['apelido']; ?>">
                                    </div>
                                </div>
                            </div>
                           
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="notes"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                            <button type="submit" class="site-btn">Atualizar</button>
                        </div>
                        </form>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                            <form action="pay.php" method="POST">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Produtos <span>Preço</span></div>
                                <ul class="checkout__total__products">
                                <?php
                                $arrqueryscart1=db_query($queryscart1);
                                foreach($arrqueryscart1 as $pr)
                                {
                                ?>
                                    <li><?php echo $pr['qnt']?>*  <?php echo $pr['nome'] ?>  <?php echo $pr['nometamanho'] ?><span><?php echo number_format($pr['preço']*$pr['qnt'], 2, '.', '').'€' ?></span></li>
                                  
                                <?php
                                

                                }
                                if(isset($_POST['descontoname'])){
                                $descontotit=$_POST['descontoname'];
                                echo'<li><span></span> '.$descontotit.'</li>';
                            }
                            if(isset($_POST['portes'])){
                                $portes=$_POST['portes'];
                                $portesdinheiro=$_POST['portesdinheiro'];
                                ?>
                                <li><?php echo $portes ?><span><?php echo $portesdinheiro ?></span></li>
                                <?php
                                }
                                ?>
                                
                                </ul>
                                <ul class="checkout__total__all">
                                <?php
                                $total2=0;
                                foreach($arrqueryscart1 as $pt)
                                { 

                                    
                                    $total2=$total2+$pt['preço']*$pt['qnt'];
                                }
                                
                                $total2=$_POST['totalprice'];
                        
                                ?>
                            <li>Total <span><?php echo $total2 ?></span></li>
                                </ul>
                                
                                <input type="hidden" name="idpt" value="<?php echo $arrqueryscart1[0]['idutilizador'] ?>" >
                                <button type="submit" class="site-btn">Pagar</button>
                            </div>
                        </div>
                        </form>
                    </div>
               
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <?php include $arrSETTINGS['dir_site'].'/include/footer.inc.php' ?>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
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
</body>

</html>
<?php
db_close();
?>