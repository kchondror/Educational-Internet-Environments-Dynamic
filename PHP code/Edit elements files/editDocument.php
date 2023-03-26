<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require dirname(dirname(__FILE__)) . "/database.php";
        
        $title = $_POST["title"];
        $description = $_POST["description"];
        $fileName = $_POST["fileName"];

        $stmt = $mysqli->prepare("UPDATE documents SET title = ?, description = ? , fileName = ? WHERE id = ?");
        $stmt->bind_param("sssi", $title, $description, $fileName,$_GET['id']);
        $stmt->execute();

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
    
    <title>Επεξεργασία εγγράφου</title>
</head>
<body>
    <div class="section1" >
        <i>Επεξεργασία εγγράφου</i><br><br>
        <?php
            echo'
                <div class="flex-column mt">
                <form method="post">
                    
                    <label for="title">Τίτλος</label><br>
                    <input id="title" type="text" name="title" value='.$_GET["title"].'required><br>
                                    
                    <label for="description">Κείμενο:</label><br>
                    <textarea id="description" name="description" rows="4" cols="50" style="font-size: 15px;" required>'.$_GET["description"].'</textarea><br>

                    <label for="fileName">Αρχείo εκφώνησης:</label><br>
                    <input id="fileName" type="text" name="fileName" value='.$_GET["fileName"].' required><br>

                    <button>Ανάρτηση</button>
                    
                </form>
            </div>'
        ?>
    </div>
    
    
    
</body>
</html>