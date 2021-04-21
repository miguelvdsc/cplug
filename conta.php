<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
@session_start();
if(!isset($_SESSION['login_ok'])) {

    header('Location:'.$arrSETTINGS['url_site'].'/login.php');
    exit();
}

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
    <title>CPlug | Conta</title>

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
                        <h4>A Minha Conta</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>A Minha Conta</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <?php
                         
    $id = $_SESSION['id'];
    $query = "SELECT * FROM utilizadores WHERE id = $id";
    $arrRes = db_query($query);
    $v = $arrRes[0];
    

?>

    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="include/form_editar.php" method="POST">
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
                                <input required type="text" name="codpostal"value="<?php echo $v['codpostal']; ?>">
                            </div>
                            
                            <div class="checkout__input">
                                <p>Distrito<span>*</span></p>
                                <input required type="text" name="distrito"value="<?php echo $v['distrito']; ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Telemovel<span>*</span></p>
                                <input required type="number" name="telefone"value="<?php echo $v['telefone']; ?>">
                            </div>
                            <div class="checkout__input">
                                <p>NIF<span>*</span></p>
                                <input required type="number" name="NIF" value="<?php echo $v['NIF'];?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                    
                                        <p>Password<span>*</span></p>
                                        <input  type="password" id="password" name="password"   value="">
                                        <button type="submit" class="site-btn">Guardar</button>
                                    </div>
                                </div>
                               
                            </div>
                            
                        </div>
                        </form>
                        <div class="col-lg-4 col-md-6">
                           
                                <form action="logout.php" method="POST">
                                <button type="submit" class="site-btn">Terminar Sessão</button>
                                </form>
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>
    </section>
    <!-- Checkout Section Begin -->
   
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