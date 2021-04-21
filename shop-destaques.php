<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
$url = $_SERVER['REQUEST_URI'];
if(!isset($_SESSION['searchViewType'])) {
    $_SESSION['searchViewType'] = 1;
}
if(isset($_GET['tipo'])) {
    $_SESSION['searchViewType'] = $_GET['tipo'];
}
if(!isset($_SESSION['searchOrderType'])) {
    $_SESSION['searchOrderType'] = 0;
}
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 9;
$offset = ($pageno-1) * $no_of_records_per_page; 


$id = $_GET['ctgr'];
$query1 = "SELECT idcat FROM categoria WHERE ramocategoria = '$id'";
$cat = db_query($query1);
$cat = $cat[0]['idcat'];




$total_pages_sql = "SELECT COUNT(*) FROM produtos WHERE ramocategoria = '$cat'";

$result = db_query($total_pages_sql);


$total_rows = $result[0]['COUNT(*)'];
$total_pages = ceil($total_rows / $no_of_records_per_page);



$ctgr=$_GET['ctgr'];


//$query = 'SELECT * FROM produtos WHERE estado = 1 ORDER BY ordem';
//$arrcategoria = db_query($query);
//$pages = $arrcategoria[0];
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Shop-Destaques</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a href="#">Men (20)</a></li>
                                                    <li><a href="#">Women (20)</a></li>
                                                    <li><a href="#">Bags (20)</a></li>
                                                    <li><a href="#">Clothing (20)</a></li>
                                                    <li><a href="#">Shoes (20)</a></li>
                                                    <li><a href="#">Accessories (20)</a></li>
                                                    <li><a href="#">Kids (20)</a></li>
                                                    <li><a href="#">Kids (20)</a></li>
                                                    <li><a href="#">Kids (20)</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    <li><a href="#">Louis Vuitton</a></li>
                                                    <li><a href="#">Chanel</a></li>
                                                    <li><a href="#">Hermes</a></li>
                                                    <li><a href="#">Gucci</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                    </div>
                                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__price">
                                                <ul>
                                                    <li><a href="#">$0.00 - $50.00</a></li>
                                                    <li><a href="#">$50.00 - $100.00</a></li>
                                                    <li><a href="#">$100.00 - $150.00</a></li>
                                                    <li><a href="#">$150.00 - $200.00</a></li>
                                                    <li><a href="#">$200.00 - $250.00</a></li>
                                                    <li><a href="#">250.00+</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                    </div>
                                    <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__size">
                                                <label for="xs">xs
                                                    <input type="radio" id="xs">
                                                </label>
                                                <label for="sm">s
                                                    <input type="radio" id="sm">
                                                </label>
                                                <label for="md">m
                                                    <input type="radio" id="md">
                                                </label>
                                                <label for="xl">xl
                                                    <input type="radio" id="xl">
                                                </label>
                                                <label for="2xl">2xl
                                                    <input type="radio" id="2xl">
                                                </label>
                                                <label for="xxl">xxl
                                                    <input type="radio" id="xxl">
                                                </label>
                                                <label for="3xl">3xl
                                                    <input type="radio" id="3xl">
                                                </label>
                                                <label for="4xl">4xl
                                                    <input type="radio" id="4xl">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                                    </div>
                                    <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__color">
                                                <label class="c-1" for="sp-1">
                                                    <input type="radio" id="sp-1">
                                                </label>
                                                <label class="c-2" for="sp-2">
                                                    <input type="radio" id="sp-2">
                                                </label>
                                                <label class="c-3" for="sp-3">
                                                    <input type="radio" id="sp-3">
                                                </label>
                                                <label class="c-4" for="sp-4">
                                                    <input type="radio" id="sp-4">
                                                </label>
                                                <label class="c-5" for="sp-5">
                                                    <input type="radio" id="sp-5">
                                                </label>
                                                <label class="c-6" for="sp-6">
                                                    <input type="radio" id="sp-6">
                                                </label>
                                                <label class="c-7" for="sp-7">
                                                    <input type="radio" id="sp-7">
                                                </label>
                                                <label class="c-8" for="sp-8">
                                                    <input type="radio" id="sp-8">
                                                </label>
                                                <label class="c-9" for="sp-9">
                                                    <input type="radio" id="sp-9">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                    </div>
                                    <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__tags">
                                                <a href="#">Product</a>
                                                <a href="#">Bags</a>
                                                <a href="#">Shoes</a>
                                                <a href="#">Fashio</a>
                                                <a href="#">Clothing</a>
                                                <a href="#">Hats</a>
                                                <a href="#">Accessories</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                switch($_SESSION['searchOrderType']) {
                    case 0: $strSearchOrderBy = '';
                            break;
                    case 1: $strSearchOrderBy = 'ORDER BY A.preço ASC';
                            break;
                    case 2: $strSearchOrderBy = 'ORDER BY A.preço DESC';
                            break;
                }
                ?>
                        <div class="col-lg-9">
                        <div class="shop__product__option">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__product__option__left">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__product__option__right">
                        
                            <form action="<?php echo $arrSETTINGS['url_site']; ?>/include/order.inc.php" method="post">
                                <input type="hidden" name="url" value="<?php echo $url; ?>">
                                <select name="order" id="order" onchange="this.form.submit()">
                                
                                    <option value="0" <?php echo ( $_SESSION['searchOrderType'] == 0 ? 'selected="selected"' : ''); ?>>Selecione uma ordenação</option>
                                    <option value="1" <?php echo ( $_SESSION['searchOrderType'] == 1 ? 'selected="selected"' : ''); ?>>Crescente</option>
                                    <option value="2" <?php echo ( $_SESSION['searchOrderType'] == 2 ? 'selected="selected"' : ''); ?>>Decrescente</option>
                                </select>
                            </form>
                        </div>
                        </div>
                         </div>
                    </div>
                    <div class="row">
                        <?php
                    $query4 =("SELECT * FROM produtos A 
                    INNER JOIN categoria B ON A.ramocategoria = B.idcat 
                    INNER JOIN tipo C ON A.tipo = C.idtipo
                    INNER JOIN subcategoria D ON A.categoria = D.id 
                    INNER JOIN genero E ON A.genero=E.id
                    INNER JOIN saldo F on A.saldo = F.idsaldo
                    INNER JOIN produtos_tamanho G on A.idprod=G.idproduto
                    INNER JOIN tamanho H on G.idtam=H.idtamanho 
                    WHERE A.estado = 1 AND B.ramocategoria= '$ctgr' GROUP BY A.idprod $strSearchOrderBy LIMIT $offset, $no_of_records_per_page");
                    $arrprodutosdestaques=db_query($query4);
                    foreach($arrprodutosdestaques as $k => $v)
                    {
                        if($v['tipo']==2)
                        {
                          ?>
                     
                         <div class="col-lg-4 col-md-6 col-sm-6">
                             <div class="product__item">
                                 <div class="product__item__pic set-bg" data-setbg="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>">
                                 <span class="label"><?php $desconto = $v['desconto']; echo '-'.$desconto. '%';?></span>
                                     <ul class="product__hover">
                                         <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                         </li>
                                         <li><a href="<?php echo $arrSETTINGS['url_site'].'/shop-details.php?id='.$v['idprod'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                                        
                                         </ul>
                                 </div>
                                 <div class="product__item__text">
                                     <h6><?php echo $v['nome']?></h6>
                                     <a href="#" class="add-cart">+ Adicionar ao carrinho</a>
                                     <div class="rating">
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                         <i class="fa fa-star-o"></i>
                                     </div>
                                     <span><del><?php  $valor = ($v['preço']/((100 - $v['desconto'])/100)); echo number_format($valor, 2, '.', '').'€';?>
                                    </del></span><span></span><h5 style="color:#e53637"><?php echo number_format($v['preço'], 2, '.', '').'€';?></h5>
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
                     }else
                     {
 
                     ?>
                     
                         <div class="col-lg-4 col-md-6 col-sm-6">
                             <div class="product__item">
                                 <div class="product__item__pic set-bg" data-setbg="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>">
                                     <ul class="product__hover">
                                         <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                         </li>
                                         <li><a href="<?php echo $arrSETTINGS['url_site'].'/shop-details.php?id='.$v['idprod'] ?>"><img src="img/icon/search.png" alt=""></a></li>
                                        
                                         </ul>
                                 </div>
                                 <div class="product__item__text">
                                     <h6><?php echo $v['nome']?></h6>
                                     <a href="#" class="add-cart">+ Adicionar ao carrinho</a>
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
 }
                         ?>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                            <?php
                                if(!empty($arrprodutosdestaques)){
                                    if($pageno != 1){

                                        
                                            echo '<a href="/pap/shop-destaques.php?ctgr='.$_GET['ctgr'].'">1</a>';
                                            
                                            
                                        

                                        if($pageno != 2){

                                            
                                            echo '<a href="/pap/shop-destaques.php?ctgr='.$_GET['ctgr'].'&pageno='.($pageno - 1).'">'.($pageno - 1).'</a>';
                                                
                                        }   
                                    }

                                    

                                    echo '<a class="active" href="#">'.$pageno.'</a>';
                                        
                                    if($pageno!=$total_pages){

                                        
                                        echo '<a href="/pap/shop-destaques.php?ctgr='.$_GET['ctgr'].'&pageno='.($pageno + 1).'">'.($pageno + 1).'</a>';
                                            
                                            
                                    

                                        
                                    
                                    }
                                }
                            ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

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