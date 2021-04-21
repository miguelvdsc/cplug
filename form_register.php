<?php
require 'include/settings.inc.php';
include 'include/db.inc.php';
db_connect();
@session_start();

$nome=$_POST['nome'];
$apelido=$_POST['apelido'];
$email=$_POST['email'];
$morada=$_POST['morada'];
$codpostal=$_POST['codpostal'];
$distrito=$_POST['distrito'];
$telefone=$_POST['numero'];
$password=$_POST['password'];
$password2=$_POST['password2'];



$arrVer=db_query("SELECT * FROM utilizadores");



foreach($arrVer as $k => $v){
    if($v['email'] == $email){
        header('Location:register.php?erro=1');
        exit();
    }
}

if($password!=$password2)
{
    header('Location:register.php?erro=2');
    exit();
}


$password_encript = password_hash($password, PASSWORD_DEFAULT);

db_query("INSERT INTO `utilizadores`(`nome`, `apelido`, `email`, `morada`, `codpostal`, `distrito`, `telefone`, `password`) VALUES ('$nome','$apelido','$email','$morada','$codpostal','$distrito','$telefone','$password_encript')");

header('Location:login.php');
$_SESSION['nome_utilizador']=$nome;
db_close();
?>