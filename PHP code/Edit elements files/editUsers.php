<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $mysqli = require dirname(dirname(__FILE__)) . "/database.php";
        
        $id = $_POST["id"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $password = $_POST["pass"];
        $role = $_POST["role"];

        try{
            $stmt = $mysqli->prepare("UPDATE users SET name = ?, surname = ? , email = ? , password=? , role=? WHERE id = ?");
            $stmt->bind_param("sssssi", $name, $surname ,$email ,$password, $role,$id);

            $stmt->execute();
        }catch(Exception $e){
            header("Location: editUsers.php");
            exit;
        };
        
        header("Location: /PHP code/Edit elements files/editUsers.php");
        exit;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/CSS code/style2.css">
    
    <title>Επεξεργασία Χρηστών</title>
    
</head>
<body>
    <div class="flex-direction: row;">
        <button onclick="document.location='/PHP code/Main pages/home.php'"
                style="width:200px ; font-size: 20px;position:relative; left: 85%; ">
        Αρχική σελίδα</button>
        <div class="section3" >
            <i>Επεξεργασία Χρηστών</i><br><br>
            <?php
                $mysqli = require dirname(dirname(__FILE__)) . "/database.php";

                $sql = "SELECT id ,name ,surname ,email ,password ,role FROM users WHERE role = 'student';";
                $res = $mysqli->query($sql);

                while ($x = mysqli_fetch_row($res)) {
                    echo '
                        <div class="flex-column mt">
                            <b style="font-size: 30px;" >Χρήστης : '.$x[0].'</b>
                            <a style="margin-left:10px; margin-top:27px ;font-size: 20px; font-weight: bold;text-decoration-line:underline;" href="/PHP code/Delete elements files/deleteUser.php?id='.$x[0].'">[Διαγραφη]</a><br><br>
                            <form method="post">

                                <label for="id">id:  </label>
                                <input style="color:#7d7d7d; " id="id" type="id" name="id" value='.$x[0].' readonly><br><br>

                                <label for="name">Όνομα:  </label>
                                <input id="name" type="name" name="name" value='.$x[1].' required><br><br>

                                <label for="surname">Επώνυμο:  </label>
                                <input id="surname" type="surname" name="surname" value='.$x[2].' required><br><br>

                                <label for="email">E-mail:  </label>
                                <input id="email" type="email" name="email" value='.$x[3].' required><br><br>

                                <label for="pass">Password:  </label>
                                <input id="pass" type="pass" name="pass" value='.$x[4].' required><br><br>

                                <label for="role">Ρόλος:  </label>
                                <select name="role" id="role">
                                    <option value="student">student</option>
                                    <option value="tutor">tutor</option>
                                </select><br>
                                                
                                <button>Ανάρτηση</button><br><br><br>
                            
                            </form>
                        </div>';
                }
            ?>
        </div>

        <div class="section4">
            <i>Προσθήκη Χρήστη</i><br><br>
            <form action="/PHP code/Add elements files/addUser.php" method="post">
                <label for="name">Όνομα:  </label>
                <input id="name" type="name" name="name" ><br><br>

                <label for="surname">Επώνυμο:  </label>
                <input id="surname" type="surname" name="surname" ><br><br>

                <label for="email">E-mail:  </label>
                <input id="email" type="email" name="email"><br><br>

                <label for="pass">Password:  </label>
                <input id="pass" type="pass" name="pass"><br><br>

                <label for="role">Ρόλος:  </label>
                <select name="role" id="role">
                    <option value="student">student</option>
                    <option value="tutor">tutor</option>
                </select><br>
                                
                <button>Ανάρτηση</button><br><br><br>
        </div>
    </div>
    
    
    
</body>
</html>