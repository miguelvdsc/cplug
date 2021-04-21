<?php
require 'include/settings.inc.php';
include $arrSETTINGS['dir_site'].'/include/db.inc.php';
db_connect();
@session_start();
$url = $_SERVER['REQUEST_URI'];

$product_ID = $_POST['product_id'];
$user_ID = $_POST['user_id'];
//$is_favorite = $_POST['favorite']



function IsFavorite($pid, $uid)
{
    $query = "SELECT count(*) as 'num_favorites' FROM favoritos WHERE idprod = $pid AND idutilizador = $uid";
    $result = db_query($query);
    foreach ($result as $r){
        if($r['num_favorites'] > 0){
        
            return 1;
        }else{
            return 0;
        }
    }
}

// SQL Update
if (IsFavorite($product_ID, $user_ID) == 1)
{
    //REMOVE
    $query = "DELETE FROM favoritos WHERE idutilizador = '$user_ID' AND idprod = '$product_ID'";
    unset($_SESSION['fav']);
    
}
else
{
    //ADD
    $query = "INSERT INTO favoritos(idprod, idutilizador) VALUES ('$product_ID', '$user_ID')";
    $_SESSION['fav'] = 1;
}

$result = db_query($query);
if($result == 1){
    if (IsFavorite($product_ID, $user_ID) == 1){
        echo 1;
    }else{
        echo 0;
    }
}
else{
    echo -1;
}
?>
