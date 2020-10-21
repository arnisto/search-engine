<?php
//$conn = mysqli_connect('anothezlamjed.mysql.db', 'anothezlamjed', 'Beja07041997', 'anothezlamjed');
//$con = mysqli_connect('127.0.0.1', 'root', '', 'anothezlamjed');
//mysqli_set_charset($conn,"utf8");

$conn = mysqli_connect('127.0.0.1', 'root', '', 'moteur_de_recherche');
mysqli_set_charset($conn,"utf8");
if(!$conn){
    die ("connection failed:".mysqli_connect_error($conn));
}

?>