<?php 
$query = 'SELECT * FROM header WHERE estado = 1 ORDER BY ordem';
$arrHeader = db_query($query);
foreach ($arrHeader as $k => $v) {
       echo ' <div class="hero__items set-bg" data-setbg="img/header/'.$v['foto'].'">';
       echo ' <div class="container">';
       echo ' <div class="row">';
       echo '  <div class="col-xl-5 col-lg-7 col-md-8">';
       echo '    <div class="hero__text">';
       echo '      <h6 style="color:white">'.$v['texto'].'</h6>';
       echo '       <h2 style="color:white">'.$v['titulo'].'</h2>';
       echo '       <a href="#" class="primary-btn">'.$v['btn'].' <span class="arrow_right"></span></a>';
       echo '       <div class="hero__social">';
       echo '           <a href="#"><i class="fa fa-facebook"></i></a>';
       echo '           <a href="#"><i class="fa fa-twitter"></i></a>';
       echo '           <a href="#"><i class="fa fa-pinterest"></i></a>';
       echo '           <a href="#"><i class="fa fa-instagram"></i></a>';
       echo '          </div>';
       echo '      </div>';
       echo '    </div>';
       echo '      </div>';
       echo '     </div>';
       echo '  </div>';
}