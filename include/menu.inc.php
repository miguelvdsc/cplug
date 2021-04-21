<?php
@session_start();
$query = "SELECT * FROM menu WHERE pai=0 AND estado=1 ORDER BY ordem";
$parents = db_query($query);

?>
<nav class="classy-navbar justify-content-between" id="nikkiNav">
<a href="index.php" class="nav-brand"><img src="img/logo.jpg" alt="" style="wi"></a>
    <div class="classy-navbar-toggler">
        <span class="navbarToggler"><span></span><span></span><span></span></span>
    </div>

    <!-- Menu -->
    <div class="classy-menu">

        <!-- close btn -->
        <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
        </div>

        <!-- Nav Start -->
        <div class="classynav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                    foreach($parents as $parent) {
                        $queryChild = "SELECT * FROM menu WHERE pai=" . $parent['id'] . " AND estado=1 ORDER BY ordem";
                        $childs = db_query($queryChild);

                        echo '<li><a href="#">' . $parent['nome'] . '</a>';
                        echo '<div class="megamenu">';

                        foreach($childs as $child) {
                            $queryChildren = "SELECT * FROM menu WHERE pai=" . $child['id'] . " AND estado=1 ORDER BY ordem";
                            $childrens = db_query($queryChildren);

                            echo '<ul class="single-mega cn-col-4">';

                            if($parent['nome'] == "Saldos")
                                echo '<li><h4><a href="' . $arrSETTINGS['url_site'] . '/shop-ramos.php?ctgr='.$child['nome'].'&genero='.$parent['nome'].'">' . $child['nome'] . '</a></h4></li>';
                            else
                                echo '<li><h4>' . $child['nome'] . '</h4></li>';

                            foreach($childrens as $children) {
                                echo '<li><h4><a href="' . $arrSETTINGS['url_site'] . '/shop.php?ctgr='.$children['nome'].'&genero='.$parent['nome'].'">' . $children['nome'] . '</a></h4></li>';
                            }
                            echo '</ul>';
                        }
                        echo '</div>';
                    }
                ?>
                <li><a href="blog.php">Blog</a></li>
            </ul>

            <!-- Search Form -->
            <div class="search-form">
                <form action="search.php" method="get">
                    <input type="search" name="query" id="query" class="form-control" placeholder="Pesquisar">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <!-- Social Button -->
            <div class="top-social-info">
                <?php
                if(isset($_SESSION['login_ok']))
                {
                    echo '<a href="conta.php" data-toggle="tooltip" data-placement="bottom" title="A minha conta"><i class="fa fa-user" aria-hidden="true"></i></a>';
                }else
                {
                     echo '<a href="login.php" data-toggle="tooltip" data-placement="bottom" title="A minha conta"><i class="fa fa-user" aria-hidden="true"></i></a>';
                }
                
                if(isset($_SESSION['login_ok']))
                {
                    echo '<a href="favoritos.php" data-toggle="tooltip" data-placement="bottom" title="Favoritos"><i class="fa fa-heart" aria-hidden="true"></i></a>';
                }else
                {
                     echo '<a href="login.php" data-toggle="tooltip" data-placement="bottom" title="Favoritos"><i class="fa fa-heart" aria-hidden="true"></i></a>';
                }
                if(isset($_SESSION['login_ok']))
                {
                    echo '<a href="shopping-cart.php" data-toggle="tooltip" data-placement="bottom" title="Carrinho"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>';
                }else
                {
                     echo '<a href="login.php" data-toggle="tooltip" data-placement="bottom" title="Carrinho"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>';
                }
                ?>
            </div>

        </div>
        <!-- Nav End -->
    </div>
</nav>