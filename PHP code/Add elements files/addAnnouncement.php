<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require dirname(dirname(__FILE__)) . "/database.php";
        

        $sql = "INSERT INTO announcements (date, subject, mainText)
                VALUES (?, ?, ?)";

        $stmt = $mysqli->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param("sss",
                          date("Y/m/d"),
                          $_POST["subject"],
                          $_POST["main"]);
        $stmt->execute();
        header("Location: /PHP code/Main pages/announcements.php");
        exit;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/CSS code/style2.css">
    
    <title>Προσθήκη Ανακοίνωσης</title>
</head>
<body>
    <div class="section2" >
        <i style="font-size: 40px;">Συμπληρώστε τα πεδία</i><br><br>
        <div class="flex-column mt">
                <form method="post">
                    
                    <label for="subject">Θέμα:</label><br>
                    <input id='subject' type='text' name='subject' required><br>
                                    
                    <label for="main">Κείμενο:</label><br>  
                    <textarea id="main" name="main" rows="5" cols="50" required></textarea><br>
                    <button>Ανάρτηση</button>
                    
                </form>
        </div>
    </div>
    
    
</body>
</html>