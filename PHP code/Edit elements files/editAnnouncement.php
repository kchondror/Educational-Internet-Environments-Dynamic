<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require dirname(dirname(__FILE__)) . "/database.php";
        
        $subject = $_POST["subject"];
        $main = $_POST["main"];

        $stmt = $mysqli->prepare("UPDATE announcements SET subject = ?, mainText = ? WHERE id = ?");
        $stmt->bind_param("ssi", $subject, $main, $_GET['id']);
        $stmt->execute();

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
    
    <title>Επεξεργασία ανακοίνωσης</title>
</head>
<body>
<div class="section1" >
    <i>Επεξεργασία ανακοίνωσης</i><br><br>
    <?php
        echo'
            <div class="flex-column mt">
            <form method="post">
                
                <label for="subject">Θέμα</label><br>
                <input id="subject" type="text" name="subject" value='.$_GET["subject"].' required><br>
                                
                <label for="main">Κείμενο:</label><br>
                <textarea id="main" name="main" rows="4" cols="50" style="font-size: 15px;" required>'.$_GET["text"].'></textarea><br>
                <button>Ανάρτηση</button>
                
            </form>
        </div>'
    ?>
</div>
    
    
    
</body>
</html>