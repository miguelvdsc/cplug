<?php
$query = 'SELECT * FROM noticias WHERE estado = 1 ORDER BY ordem';
$arrnoticias = db_query($query);
foreach($arrnoticias as $k => $v) {
echo '<li class="col-md-4">';
echo '<figure>';
echo'<a href="'. $arrSETTINGS['url_site'] . '/noticias-singular.php?id='.$v['id'].'"><img src="images/'.$v['foto'].'" alt=""></a>';
echo'<figcaption class="wm-bgcolor">';
echo '</figure>';     
echo '</figcaption>';
echo'<div class="wm-newsgrid-text">';
echo '<ul class="wm-post-options">';
echo '<li>'.$v['data'].'</li>';
echo '</ul>';
echo '<h5><a href="'. $arrSETTINGS['url_site'] . '/noticias-singular.php?id='.$v['id'].'" class="wm-color">'.$v['titulo'].'</a></h5>';
echo '<p>'.$v['resumo'].'</p>';
echo '<a class="wm-banner-btn" href="'. $arrSETTINGS['url_site'] . '/noticias-singular.php?id='.$v['id'].'" class="wm-banner-btn">Ver Mais</a>';
echo '</div>';
echo '</li>';
}
?>
