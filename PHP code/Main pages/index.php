<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require dirname(dirname(__FILE__)) . "/database.php";
        

        $sql = sprintf("SELECT * FROM users
                        WHERE email = '%s'",
                        $mysqli->real_escape_string($_POST["email"]));

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();
        $_SESSION['role'] = $user['role'];
        if($user){
            if($_POST["pass"] === $user["password"]){
                header("Location: /PHP code/Main pages/home.php");
            }else{
                header("Location: /PHP code/Main pages/loginError.php");
            }
        }else{
            header("Location: /PHP code/Main pages/loginError.php");
        }
        

        exit;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/CSS code/style2.css">
    
    <title>Eίσοδος</title>
</head>
<body>
    <div  class="section2" >
        <i>Στοιχεία χρήστη</i><br>
        
        
        <form method=post>
            <label for = "email" >E-mail:</label><br>
            <input type="email" name="email" id="email" size="25" required><br>

            <label for="pass" >Κωδικός:</label><br>
            <input type="password" id="pass" name="pass" size="25" required><br>

            <button style="margin-top:15px ;">Eισοδος</button>
        </form>
    </div>
    

    
    
</body>
</html>