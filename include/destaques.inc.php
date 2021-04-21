<?php 
$query = 'SELECT * FROM destaques WHERE estado = 1 ORDER BY ordem';
$arrHeader = db_query($query);
foreach ($arrHeader as $k => $v) {

    echo '<div class="banner__item">';
    echo '<div class="banner__item__pic">';
    echo ' <img src="img/'.$v['foto'].'" alt="" style="height:100px">';
    echo '</div>';
    echo '<div class="banner__item__text">';
    echo '<h2>'.$v['titulo'].'</h2>';
    echo '<a href="catota">Shop now</a>';
    echo '</div>';
    echo '</div>';

}
?>
