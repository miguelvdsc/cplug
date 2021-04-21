<?php
include 'settings.inc.php';
include $arrSETTINGS['dir_site'] . '/include/db.inc.php';
db_connect();

$id=$_POST['id'];
$nome=$_POST['nome'];
$apelido=$_POST['apelido'];
$email=$_POST['email'];
$morada=$_POST['morada'];
$codpostal=$_POST['codpostal'];
$distrito=$_POST['distrito'];
$telefone=$_POST['telefone'];
$cardname=$_POST['cardname'];
$cardnum=$_POST['cardnum'];
$val=$_POST['val'];
$csv=$_POST['csv'];
$notes=$_POST['notes'];
$password=$_POST['password'];
var_dump($_POST);
die();

if(trim($password)!='')
{
    $nova_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE utilizadores SET nome = '$nome', apelido = '$apelido', email = '$email', morada = '$morada', codpostal = '$codpostal', distrito = '$distrito', telefone = '$telefone', password = '$nova_password' WHERE id =$id";
}else {
    $query = "UPDATE utilizadores SET nome = '$nome', apelido = '$apelido', email = '$email', morada = '$morada', codpostal = '$codpostal', distrito = '$distrito', telefone = '$telefone' WHERE id =$id";
    
}


$res = db_query($query);

db_close();
header('Location: ' . $arrSETTINGS['url_site'] . '/conta.php');
?>