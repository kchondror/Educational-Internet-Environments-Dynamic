<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require dirname(dirname(__FILE__)) . "/database.php";
        

        $sql = "INSERT INTO documents (title, description, fileName)
                VALUES (?, ?, ?)";

        $stmt = $mysqli->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param("sss",
                          $_POST["title"],
                          $_POST["description"],
                          $_POST["fileName"]);
        $stmt->execute();
        header("Location: /PHP code/Main pages/documents.php");
        exit;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/CSS code/style2.css">

    
    <title>Προσθήκη εγγράφου</title>
</head>
<body>
    <div class="section1" >
        <i>Συμπληρώστε τα πεδία</i><br><br>
        <div class="flex-column mt">
                <form method="post">
                    
                    <label for="title">Τίτλος:</label><br>
                    <input id='title' type='text' name='title' required><br>
                                    
                    <label for="description">Περιγραφή:</label><br>
                    <textarea id="description" name="description" rows="5" cols="50" style="font-size: 15px;" required></textarea><br>

                    <label for="fileName">Αρχείo εκφώνησης:</label><br>
                    <input id='fileName' type='text' name='fileName' required><br>

                    <button>Ανάρτηση</button>
                    
                </form>
        </div>
    </div>
    
    
</body>
</html>