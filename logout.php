<?php
include 'include/settings.inc.php';

unset($_SESSION['login_ok']);
session_destroy();

header('Location: ' . $arrSETTINGS['url_site'] . '/index.php');
?>