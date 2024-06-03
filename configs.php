<?php
$dbhost= 'localhost';
$dbusername= 'root';
$dbpassword= '';
$dbname= 'life_steem_db';

$conex= new mysqli($dbhost, $dbusername, $dbpassword, $dbname);

if ($conex->connect_errno){
    echo "erro";
}
else{
    echo"conectado";
}
?>