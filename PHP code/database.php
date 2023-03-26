<?php
    $host = "webpagesdb.it.auth.gr:3306";
    $dbname  = "student3812";
    $dbuser = "kchondror";
    $password = "Xhl~z201";


    $mysqli = new mysqli($host,$dbuser,$password,$dbname);

    if($mysqli -> connect_errno){
        die($mysqli -> connect_errno);
    }
    return $mysqli;
?>