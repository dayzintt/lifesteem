<?php
$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'life_steem_db';

$conex = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

if ($conex->connect_error) {
    die("Conexão falhou: " . $conex->connect_error);
}

$conex->set_charset("utf8");
?>
