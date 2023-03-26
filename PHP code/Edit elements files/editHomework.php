<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require dirname(dirname(__FILE__)) . "/database.php";
        
        $targets = $_POST["targets"];
        $fileName = $_POST["fileName"];
        $filesToSend = $_POST["filesToSend"];
        $deadline = $_POST["date"];


        $stmt = $mysqli->prepare("UPDATE projects SET targets = ?, fileName = ? , filesToSend = ? , deadline=?  WHERE id = ?");
        $stmt->bind_param("ssssi", $targets, $fileName ,$filesToSend ,$deadline, $_GET['id']);
        $stmt->execute();

        $stmt->execute();
        header("Location: /PHP code/Main pages/homework.php");
        exit;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/CSS code/style2.css">
    
    <title>Επεξεργασία εργασίας</title>
</head>
<body>
    <div class="section1" >
        <i>Επεξεργασία εργασίας</i><br><br>
        <?php
            echo'
            <div class="flex-column mt">
            <form method="post">
                
                <label for="targets">Στόχοι:</label><br>
                <textarea id="targets" name="targets" rows="4" cols="50" style="font-size: 15px;" required>'.$_GET["targets"].'</textarea><br>

                <label for="fileName">Αρχείo εκφώνησης:</label><br>
                <input id="fileName" type="text" name="fileName" value='.$_GET["fileName"]. ' required><br>


                <label for="filesToSend">Παραδοτέα:</label><br>
                <textarea id="filesToSend" name="filesToSend" rows="4" cols="50" style="font-size: 15px;" required> '.$_GET["filesToSend"].'</textarea><br>

                <label for="date">Ημερομηνία:</label><br>
                <input id="date" type="date" name="date" value ='.$_GET["deadline"].' required><br>

                <button>Αναρτηση</button>
                
            </form>
        </div>'
        ?>
    </div>
    
    
    
</body>
</html>