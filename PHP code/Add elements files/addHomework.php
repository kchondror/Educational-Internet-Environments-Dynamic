<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require dirname(dirname(__FILE__)) . "/database.php";
        

        $sql = "INSERT INTO projects (targets, fileName, filesToSend ,deadline)
                VALUES (?, ?, ? ,?)";

        $stmt = $mysqli->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param("ssss",
                          $_POST["targets"],
                          $_POST["fileName"],
                          $_POST["filesToSend"],
                          $_POST["date"]);
        $stmt->execute();



        $sql= "SELECT MAX(id) FROM projects";
        $res = $mysqli->query($sql);
        $number = mysqli_fetch_array($res)[0];
        
        $subject = "Υποβλήθηκε η εργασία ".$number."";
        $mainText = "Η ".$number."η εργασία έχει ανακοινωθεί στην ιστοσελίδα<a href='/PHP code/Main pages/homework.php'>«Εργασίες»</a>.";
        
        $sql = "INSERT INTO announcements (date,subject, mainText)
                VALUES (?, ?, ?)";

        $stmt = $mysqli->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param("sss",
                          date("Y/m/d"),
                          $subject,
                          $mainText);
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
    
    <title>Προσθήκη εργασίας</title>
</head>
<body>
    <div class="section1" >
        <i>Συμπληρώστε τα πεδία</i><br><br>
        <div class="flex-column mt">
            <form method="post">
                
                <label for="targets">Στόχοι:</label><br>
                <textarea id="targets" name="targets" rows="5" cols="50" style="font-size: 15px;" required></textarea><br>

                <label for="fileName">Αρχείo εκφώνησης:</label><br>
                <input id='fileName' type='text' name='fileName' required><br>


                <label for="filesToSend">Παραδοτέα:</label><br>
                <textarea id="filesToSend" name="filesToSend" rows="5" cols="50" style="font-size: 15px;" required></textarea><br>

                <label for="date">Ημερομηνία:</label><br>
                <input id='date' type='date' name='date' required><br>

                <button>Ανάρτηση</button>
                
            </form>
        </div>
    </div>
    
    
</body>
</html>