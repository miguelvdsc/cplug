<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
@session_start();

$id = $_GET['id'];
$uid = isset($_SESSION['id']) ? $_SESSION['id'] : 0 ;

$queryesp =("SELECT * FROM produtos A 
INNER JOIN subcategoria B ON A.categoria = B.id 
INNER JOIN genero C ON A.genero=C.id
INNER JOIN fotos D on A.idprod=D.idprodf
INNER JOIN saldo E on A.saldo = E.idsaldo
INNER JOIN produtos_tamanho F on A.idprod=F.idproduto
INNER JOIN tamanho G on F.idtam=G.idtamanho 
WHERE A.estado = 1 AND A.idprod=$id"); 
$arresp = db_query($queryesp);
$pages = $arresp[0];
foreach($arresp as $c)
{
    $ctgr=$c['categoria'];
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
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
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

    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="img/produtos/<?php echo $pages['genero'] ?>/<?php echo $pages['categoria'] ?>/<?php echo $pages['foto_default'] ?>">
                                    </div>
                                </a>
                            </li>
                            
                            <?php 
                            
                            $query2=("SELECT * FROM produtos A
                            INNER JOIN subcategoria B ON A.categoria = B.id 
                            INNER JOIN genero C ON A.genero=C.id
                            INNER JOIN fotos D on A.idprod=D.idprodf
                            INNER JOIN saldo E on A.saldo = E.idsaldo
                            WHERE A.estado=1 AND D.idprodf=$id
                            ORDER BY D.ordem");
                            $arrfotos=db_query($query2);
                           
                            $count=2;
                            foreach($arrfotos as $v)
                            {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" data-toggle="tab" href="#tabs-'.$count.'" role="tab">';
                                echo '<div class="product__thumb__pic set-bg" data-setbg="img/produtos/'.$v['genero'].'/'.$v['categoria'].'/'.$v['nomefoto'].'">';
                                echo '</div>';
                                echo '</a>';
                                echo'</li>';
                                $count++;
                                
                            }
                            
                            ?>
                            <!--
                             <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-2.png">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-3.png">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="img/shop-details/thumb-4.png">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </a>
                            </li>
                            -->
                        </ul>
                    </div>
                    
                   <!--- produtos -->
                   
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="img/produtos/<?php echo $pages['genero'] ?>/<?php echo $pages['categoria'] ?>/<?php echo $pages['foto_default'] ?>" alt="" style="width:450px;height:450px">
                                </div>
                            </div>
                            <?php 
                            
                            $query3=("SELECT * FROM produtos A
                            INNER JOIN subcategoria B ON A.categoria = B.id 
                            INNER JOIN genero C ON A.genero=C.id
                            INNER JOIN fotos D on A.idprod=D.idprodf
                            INNER JOIN saldo E on A.saldo = E.idsaldo
                            INNER JOIN produtos_tamanho F on A.idprod=F.idproduto
                            INNER JOIN tamanho G on F.idtam=G.idtamanho 
                            WHERE A.estado=1 AND D.idprodf=$id 
                            ORDER BY D.ordem");
                            $arrfotos2=db_query($query3);
                            $count2=2;
                            
                            foreach($arrfotos2 as $v)
                            {
                                echo'<div class="tab-pane" id="tabs-'.$count2.'" role="tabpanel">';
                                echo'<div class="product__details__pic__item">';
                                echo'<img src="img/produtos/'.$v['genero'].'/'.$v['categoria'].'/'.$v['nomefoto'].'" alt="" style="width:450px;height:450px">';
                                echo'</div>';
                                echo'</div>';
                                $count2++;
                                
                            }

                            ?>
                            <?php
                            /*
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="img/shop-details/product-big.png" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="img/shop-details/product-big.png" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-4" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="img/shop-details/product-big-4.png" alt="">
                                    <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1" class="video-popup"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                            */
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4><?php echo $pages['nome']?></h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> - 5 Reviews</span>
                            </div>
                            
                            <?php
                            if($pages['tipo']==2)
                            {
                                ?>
                                <h3><span><?php  $valor = ($v['preço']/((100 - $v['desconto'])/100));; echo number_format($valor, 2, '.', '').'€';?></span><br><?php echo number_format($v['preço'], 2, '.', '').'€';?></h3>
                                <?php
                                
                            }else
                            {
                                ?>
                            <h3><?php echo number_format($pages['preço'], 2, '.', '').'€';?></h3>
                            <?php
                            }
                             
                             ?>

                            <p><?php echo $pages['descrição'] ?></p>
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                <input type="hidden" name="tamanho" value="" id="tamanho">
                                    <span>Tamanho:</span>
                                    <?php
                                            $query =("SELECT * FROM produtos A 
                                            INNER JOIN subcategoria B ON A.categoria = B.id 
                                            INNER JOIN genero C ON A.genero=C.id
                                            INNER JOIN fotos D on A.idprod=D.idprodf
                                            INNER JOIN produtos_tamanho E on A.idprod=E.idproduto
                                            INNER JOIN tamanho F on E.idtam=F.idtamanho 
                                            WHERE A.estado = 1 AND E.quantidade>0 AND D.idprodf=$id GROUP BY F.idtamanho ORDER BY F.ordem");
                                           
                                            $arrfiltros3=db_query($query);


                                            foreach($arrfiltros3 as $v3)
                                            {
                                           
                                            ?>
                                            
                                                <label for="tamanho_<?php echo $v3['idtamanho']; ?>"><?php echo $v3['nometamanho']; ?>
                                                    <input value="<?php echo $v3['idtamanho']; ?>" onclick="setTamanho(<?php echo $id; ?>, <?php echo $uid; ?>, this.value)" type="radio" id="tamanho_<?php echo $v3['idtamanho']; ?>">
                                                </label>
                                                <?php
                                            }
                                            ?>
                                </div>
                                <div class="product__details__option__color">
                                    
                                </div>
                                
                            </div>
                           
                            
                            <!-- botão de compra -->
                            
                            <div id="btnCompra"></div>
                            

                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="img/shop-details/details-payment.png" alt="">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews(5)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                    information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                                            solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                                            ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                        pharetras loremos.</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same
                                                capabilities as a modern PC. These handy little devices allow
                                                individuals to retrieve and store e-mail messages, create a contact
                                                file, coordinate appointments, surf the internet, exchange text messages
                                                and more. Every product that is labeled as a Pocket PC must be
                                                accompanied with specific software to operate the unit and must feature
                                            a touchscreen and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC
                                                was substantial during it’s early release. For approximately $700.00,
                                                consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more
                                                reasonable now that the newness is wearing off. For approximately
                                            $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                            worn all year round.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same
                                                capabilities as a modern PC. These handy little devices allow
                                                individuals to retrieve and store e-mail messages, create a contact
                                                file, coordinate appointments, surf the internet, exchange text messages
                                                and more. Every product that is labeled as a Pocket PC must be
                                                accompanied with specific software to operate the unit and must feature
                                            a touchscreen and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC
                                                was substantial during it’s early release. For approximately $700.00,
                                                consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more
                                                reasonable now that the newness is wearing off. For approximately
                                            $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                            worn all year round.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-7" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                                            solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                                            ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                        pharetras loremos.</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same
                                                capabilities as a modern PC. These handy little devices allow
                                                individuals to retrieve and store e-mail messages, create a contact
                                                file, coordinate appointments, surf the internet, exchange text messages
                                                and more. Every product that is labeled as a Pocket PC must be
                                                accompanied with specific software to operate the unit and must feature
                                            a touchscreen and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC
                                                was substantial during it’s early release. For approximately $700.00,
                                                consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more
                                                reasonable now that the newness is wearing off. For approximately
                                            $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                            worn all year round.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
                <?php 
                $offset=$id+1;
                $limitprod=4;
                $queryprod =("SELECT * FROM produtos A 
                INNER JOIN subcategoria B ON A.categoria = B.id 
                INNER JOIN genero C ON A.genero=C.id
                INNER JOIN tipo D ON A.tipo = D.idtipo
                INNER JOIN saldo E on A.saldo = E.idsaldo
                INNER JOIN produtos_tamanho F on A.idprod=F.idproduto
                INNER JOIN tamanho G on F.idtam=G.idtamanho 
                WHERE A.estado = 1 and B.categoria='$ctgr' GROUP BY A.idprod LIMIT $offset,$limitprod");  
                $arrprodutosindex=db_query($queryprod);
                foreach ($arrprodutosindex as $k => $v) {
   
                if($v['tipo']==3)
                {
                ?>
    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix best-sellers">
                    <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>">
                        <ul class="product__hover">
                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                    <li><a href="<?php echo $arrSETTINGS['url_site'].'/shop-details.php?id='.$v['idprod'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><?php echo $v['nome'] ?></h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5><?php echo number_format($v['preço'], 2, '.', '').'€';?></h5>
                            <div class="product__color__select">
                                <label for="pc-4">
                                    <input type="radio" id="pc-4">
                                </label>
                                <label class="active black" for="pc-5">
                                    <input type="radio" id="pc-5">
                                </label>
                                <label class="grey" for="pc-6">
                                    <input type="radio" id="pc-6">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
   }
   else if($v['tipo']==2)
   {
       ?>
    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                    <div class="product__item sale">
                    <div  class="product__item__pic set-bg" data-setbg="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>">
                    <span class="label"><?php $desconto = $v['desconto']; echo '-'.$desconto. '%';?></span>
                            <ul class="product__hover">
                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                <li><a href="<?php echo $arrSETTINGS['url_site'].'/shop-details.php?id='.$v['idprod'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><?php echo $v['nome'] ?></h6>
                            <a href="#" class="add-cart">+ Add To Cart</a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <span><del><?php  $valor = ($v['preço']/((100 - $v['desconto'])/100)); echo number_format($valor, 2, '.', '').'€';?>
                                    </del></span><span></span><h5 style="color:#e53637"><?php echo number_format($v['preço'], 2, '.', '').'€';?></h5>
                            <div class="product__color__select">
                                <label for="pc-16">
                                    <input type="radio" id="pc-16">
                                </label>
                                <label class="active black" for="pc-17">
                                    <input type="radio" id="pc-17">
                                </label>
                                <label class="grey" for="pc-18">
                                    <input type="radio" id="pc-18">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

       <?php
   }
}
?>

            </div>
        </div>
    </section>
    <!-- Related Section End -->

    <!-- Footer Section Begin -->
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
    <script>
        function setFavorite(pid, uid) {
            var x = document.getElementsByClassName("active");
            var i;
            for (i = 0; i < x.length; i++) {
                var elem = x[i];
                if(elem.nodeName == 'LABEL'){
                    console.log(elem.getAttribute("for"));
                }
            }

            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    if(this.responseText == 1){
                        document.getElementById("favorite").classList.add('fa-heart')
                        document.getElementById("favorite").classList.remove('fa-heart-o')
                    }else{
                        document.getElementById("favorite").classList.add('fa-heart-o')
                        document.getElementById("favorite").classList.remove('fa-heart')
                    }
                }
            };
            xmlhttp.open("POST","set_favorites.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("product_id=".concat(pid,  "&user_id=",uid));
        }
    
    
    function setCart(prodid, uid) {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    
                }
            };
            xmlhttp.open("POST","set_cart.php",true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("product_id=".concat(prodid,  "&user_id=",uid));
        }
    

    function setTamanho(pid, uid, tam)
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                document.getElementById("btnCompra").innerHTML = this.responseText;
                
            }
        };
        xmlhttp.open("POST","set_tamanho.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("product_id=".concat(pid, "&user_id=".concat(uid, "&size_id=",tam)));


        /*
        document.getElementById("setfavorite").removeAttribute("onclick");
        document.getElementById("setfavorite").setAttribute("onclick","setFavorite('<?php echo $id?>','<?php echo $uid?>',document.getElementById('tamanho').value)");

        
        document.getElementById("setcart").removeAttribute("onclick");
        document.getElementById("setcart").setAttribute("onclick","setCart('<?php echo $id?>','<?php echo $uid?>',document.getElementById('tamanho').value)");
        document.getElementById('tamanho').value = tamanho;
        
        */
    }
    setTamanho(<?php echo $id; ?>, <?php echo $uid; ?>, 0);
    </script>
</body>
<script>

</script>
</html>
<?php
db_close();
?>