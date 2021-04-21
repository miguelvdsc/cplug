<?php
@session_start();

if($_SERVER['HTTP_HOST'] == 'web.colgaia.local') {
    $arrSETTINGS['dir_site'] = 'C:\wamp64\www\pap';
    $arrSETTINGS['url_site'] = 'http://localhost/pap';

    $arrSETTINGS['dir_site_admin'] = 'C:\wamp64\www\pap\admin';
    $arrSETTINGS['url_site_admin'] = 'http://localhost/site_escola/admin/';


    // definições de variáveis para ligar ao servidor MYSQL
    $arrSETTINGS['hostname'] = 'localhost';
    $arrSETTINGS['username'] = 'root';
    $arrSETTINGS['password'] = '';
    $arrSETTINGS['database'] = 'cplug';

} else {
    $arrSETTINGS['dir_site'] = 'C:\wamp64\www\pap';
    $arrSETTINGS['url_site'] = 'http://localhost/pap';

    // definições de variáveis para ligar ao servidor MYSQL
    $arrSETTINGS['hostname'] = 'localhost';
    $arrSETTINGS['username'] = 'root';
    $arrSETTINGS['password'] = '';
    $arrSETTINGS['database'] = 'cplug';
}
?>
