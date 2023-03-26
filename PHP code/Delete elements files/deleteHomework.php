<?php

    $mysqli = require dirname(dirname(__FILE__)) . "/database.php";

    $id = $_GET['id']; 

    $sql = "DELETE FROM projects WHERE id=$id";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($sql);
    $stmt->execute();
    header("location: /PHP code/Main pages/homework.php"); 
    exit;

?>

