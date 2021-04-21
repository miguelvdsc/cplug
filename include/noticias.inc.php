<?php
$query = 'SELECT * FROM noticias WHERE estado = 1 ORDER BY ordem';
$arrNoticias = db_query($query);

foreach ($arrNoticias as $k => $v) 

{
    echo '<div class="col-lg-4 col-md-6 col-sm-6">';
    echo '<div class="blog__item">';
    echo '<div class="blog__item__pic set-bg" data-setbg="img/blog/details/'.$v['foto'].'"></div>';
    echo '<div class="blog__item__text">';
    echo '<span><img src="img/icon/calendar.png" alt="">'.$v['data'].'</span>';
    echo '<h5>'.$v['titulo'].'</h5>';
    echo '<a href="'. $arrSETTINGS['url_site'] . '/blog-details.php?id='.$v['id'].'">Ler mais</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>