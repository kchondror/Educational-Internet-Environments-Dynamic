<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require dirname(dirname(__FILE__)) . "/database.php";
        

        $sql = "INSERT INTO users (name ,surname ,email ,password ,role)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $mysqli->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param("sssss",
                          $_POST["name"],
                          $_POST["surname"],
                          $_POST["email"],
                          $_POST["pass"],
                          $_POST["role"]);

        try{                  
            $stmt->execute();
        }catch(Exception $e){
            header("Location: /PHP code/Edit elements files/editUsers.php");
            exit;
        };
        header("Location: /PHP code/Edit elements files/editUsers.php");
        exit;
    }

?>