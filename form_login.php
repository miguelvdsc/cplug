<?php
require 'include/settings.inc.php';
include 'include/db.inc.php';
db_connect();
@session_start();

$email=$_POST['email'];
$password=$_POST['password'];
$arrlogin = db_query("SELECT * FROM utilizadores WHERE email= '$email'");


if(isset($arrlogin[0])) {
    $hash = $arrlogin[0]['password'];
    if(password_verify($password, $hash)) {
        $_SESSION['login_ok'] = 1;
        $_SESSION['nome_utilizador']=$arrlogin[0]['nome'];
        $_SESSION['id']=$arrlogin[0]['id'];
        header('Location: ' . $arrSETTINGS['url_site'] . '/conta.php');
        exit();
    }
  
}

header('Location: ' . $arrSETTINGS['url_site'] . '/login.php?erro=1');
exit();

db_close();
?>