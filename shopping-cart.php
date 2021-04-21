<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
@session_start();
$id = $_SESSION['id'];
$queryscart =("SELECT * FROM cart A 
INNER JOIN utilizadores B ON A.idutilizador = B.id
INNER JOIN produtos_tamanho C on A.idprod_tam = C.idprod_tam
INNER JOIN tamanho D on C.idtam = D.idtamanho
INNER JOIN produtos E ON C.idproduto = E.idprod
INNER JOIN subcategoria F ON E.categoria = F.id 
INNER JOIN genero G ON E.genero=G.id
INNER JOIN tipo H ON E.tipo = H.idtipo
INNER JOIN saldo I on E.saldo = I.idsaldo
WHERE E.estado = 1 AND A.idutilizador=$id");
$arrqueryscart=db_query($queryscart);

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
    <title>CPlug | Carrinho de Compras</title>

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
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <a href="./shop.php">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    
    <section class="shopping-cart spad">
   
        <div class="container">
            <div class="row">
            <?php 
            if(count($arrqueryscart)!=0){
            ?>
                <div id="ajax_div1" class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produtos</th>
                                    <th>Quantidade</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php
                             
                             
                         
                            foreach($arrqueryscart as $v)
                            {
                                echo'<tr id="ajax_tr">';
                                echo'<td class="product__cart__item">';
                                echo'<div class="product__cart__item__pic">';
                                ?>
                                <input type="hidden" class="pid" value="<?php $v['idprod_tam'] ?>">
                                
                                <a href="shop-details.php?id=<?php $i=substr($v['idprod'], 0,1);echo $i?>">
                                <img style="height:100px;width:100px" src="img/produtos/<?php echo $v['genero'] ?>/<?php echo $v['categoria'] ?>/<?php echo $v['foto_default'] ?>"  alt="">
                                </a>
                                <?php
                                echo'</div>';
                                echo'<div class="product__cart__item__text">';
                                echo'<h6>'.$v['nome'].'</h6><p></p> Tamanho '.$v['nometamanho'].'';
                                ?>
                                <h5 id="total_price"><?php $total_price=$v['preço']*$v['qnt']; echo number_format($total_price, 2, '.', '').'€'?></h5>
                                <?php
                                echo'</div>';
                                echo'</td>';
                                echo'<td class="quantity__item">';
                                echo'<div class="quantity">';
                                echo'<div class="pro-qty-2">';
                                ?>
                               
                                <?php
                                echo'<input  type="text" name="quantity" id="'.$v['idprod_tam'].'" value="'.$v['qnt'].'"onclick="saveCart(this);">';
                                echo'</div>';
                                echo'</div>';
                                echo'</td>';
                                ?>
                                <td class="cart__price" id="total_price"><?php $total_price=$v['preço']*$v['qnt']; echo number_format($total_price, 2, '.', '').'€' ?></td>
                                
                                <td class="cart__close"><a href="javascript:void(0)" onclick="removeCart('<?php echo $v['idprod_tam']?>','<?php echo $_SESSION['id']?>')" ><i class="fa fa-close"></a></i></td>
                                
                                
                                <?php
                                
                                echo'</tr>';
                            }
                           
                                ?>
                               
                            </tbody>
                            
                        </table>
                        <p></p>
                        <h6>* Portes de envio gratis a partir dos 100 € (5 €)</h6>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="index.php">Continuar a Comprar</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <?php
                        $total1=0;
                        foreach($arrqueryscart as $p)
                        { 

                        
                            $total1=$total1+$p['preço']*$p['qnt'];
                              
                           
                        
                        }
                       
                        $total2=$total1;
                        
                        ?>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Codigos de desconto</h6>
                        <form action="" method="POST">
                            <input type="text" name="desconto" value="" placeholder="Codigo de desconto">
                            <button type="submit" >Apply</button>
                        </form>
                        <?php  
                        if(isset($_POST['desconto'])){
                        $desconto=$_POST['desconto'];
                        

                        $querydesconto="SELECT * FROM cod_desconto WHERE codigo='$desconto' AND estado = 1";
                        $arrquerydesconto=db_query($querydesconto);
                        
                        foreach($arrquerydesconto as $d)
                        {
                           
                            $total2=$total1*$d['desconto'];
                            
                        }   
                    }
                        ?>
                    </div>
                    <div class="cart__total">
                    <form method="POST" action="checkout.php">
                        <h6>Cart total</h6>
                        <ul>
                        
                            <li>Subtotal <span name="totalprice"><?php echo number_format($total1, 2, '.', '').'€' ?></span></li>
                            <?php
                            if(isset($_POST['desconto']) && (count($arrqueryscart)>0)){
                                foreach($arrquerydesconto as $d)
                                {
                                    
                                    echo '<li>'.$d['titulo'].'</li>';
                                    echo '<input type="hidden" name="descontoname" value="'.$d['titulo'].'">';
                                
                                }   
                            }
                            if($total1<100){
                                $total2=$total2+5;
                            }
                            ?>
                            <li>Total <span><?php echo number_format($total2, 2, '.', '').'€' ?></span></li>
                            <input type="hidden" name="totalprice" value="<?php echo number_format($total2, 2, '.', '').'€' ?>">
                            <?php
                            if($total1<100){
                                ?>
                            <input type="hidden" name="portes" value="Portes de envio">
                            <input type="hidden" name="portesdinheiro" value="5.00€">
                            <?php
                            }
                            ?>
                        </ul>
                        <button style="width:100%"  type="submit" class="primary-btn">Proceed to checkout</button>
                    </div>
                    </form>
                </div>
                <?php
            }else 
            {
                ?>
                <div id="ajax_div1" class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table style="border: none;">
                            <thead>
                                <tr>
                                    <th>O Carrinho está vazio</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                        
                    </div>
                </div>
                <tbody style="border: none;">
                <tr id="ajax_tr" style="border: none;">
                <td class="product__cart__item" style="border:none;">
                <div class="product__cart__item__pic"style="border: none;">
                </tr>
               
                </div>
                </table>
                </tbody>
                <div class="row">
                
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="index.php">Continuar a Comprar</a>
                            </div>
                        </div>
                        
                    </div>
                <?php
            }
                ?>
            </div>
        </div>
    </section>
    <!-- XXping Cart Section End -->

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
    <script>
			function changeqty(qty, code) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log(this.responseText);
                document.getElementById("ajax_div1").innerHTML = this.responseText;
				}
				};
				xmlhttp.open("GET", "<?php echo $arrSETTINGS['url_site']; ?>/qty.update.php?qnt=" + qty + '&idprod_tam=' + code , true);
				xmlhttp.send();
                location.reload(true);
			}
			
			</script>
    <script>
    
function saveCart(obj) {
	var quantity = $(obj).val();
	var code = $(obj).attr("id");
	$.ajax({
		url: "qty.update.php",
		type: "POST",
		data: 'code='+code+'&quantity='+quantity,
		success: function(data, status){$("#total_price").html(data)},
		error: function () {alert("Problen in sending reply!")}
	});
    location.reload(true);
}
</script>
    

    
    <script>
    
			function removeCart(pid, uid) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				
				};
				xmlhttp.open("POST","remove_cart.php",true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("product_id=".concat(pid, "&user_id=",uid));
                location.reload(true);
			}
			
			
    
    //function removeCart(pid, uid) {
           // var xmlhttp=new XMLHttpRequest();
            //xmlhttp.onreadystatechange = function() {
              //  if (this.readyState == 4 && this.status == 200) {
               //     console.log(this.responseText);
                    
                //}
            //};
            
            //xmlhttp.open("POST","remove_cart.php",true);
            //xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //xmlhttp.send("product_id=".concat(pid, "&user_id=",uid));
            //location.reload(true);
        //}
    
    </script>
    
    </script>
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