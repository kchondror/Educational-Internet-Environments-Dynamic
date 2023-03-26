<?php

    $mysqli = require dirname(dirname(__FILE__)) . "/database.php";

    $id = $_GET['id']; 

    $sql = "DELETE FROM documents WHERE id=$id";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($sql);
    $stmt->execute();
    header("location: /PHP code/Main pages/documents.php"); 
    exit;

?>

