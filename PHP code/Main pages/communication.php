<html>
  <head>
    <meta charset="UTF-8">
    <title>Επικοινωνία</title>
    <link rel="stylesheet" href="/CSS code/style.css">
    <link rel="icon" type="image/png" href="\images\Browser icon.png" sizes="32x32">
    <div  class=section1>
      <img src="\images\logo.png"align="center" width="150" height="150" style="margin-left: 30px; position:relative; bottom:30px;">
      <h1 align="center" style=" font-size: 40px; position:relative; bottom: 150px; ">Επικοινωνία</h1>
      <button onclick="document.location='/PHP code/Main pages/index.php'"
              style="width:100px ; font-size: 20px;margin-left: 300px ; position:relative; left: 73%; bottom: 255px; ">
      Εξοδος</button>
    </div>

  </head>
  <body>
    <div style="display: flex; flex-direction: column; height: 100%;">
        <div style="display: flex; height: 100%; " >
            <div style="flex-direction: column; " class="section2">
              <h2 style="text-align:center; font-size: 35px; font-weight: bold;text-decoration-line:underline;">
                Επιλογές</h2>
                <button style="margin-top: 0px " onclick="document.location='/PHP code/Main pages/home.php'">Αρχική σελίδα</button>
                <button onclick="document.location='/PHP code/Main pages/announcements.php'">Ανακοινώσεις</button>
                <button onclick="document.location='/PHP code/Main pages/communication.php'">Επικοινωνία</button>
                <button onclick="document.location='/PHP code/Main pages/documents.php'">Έγγραφα μαθήματος</button>
                <button onclick="document.location='/PHP code/Main pages/homework.php'">Εργασίες</button>
                <?php
                    $mysqli = require dirname(dirname(__FILE__)) . "/database.php";

                    session_start();
                    if($_SESSION['role'] === 'tutor' ){
                      echo "<button onclick='document.location=\"/PHP code/Edit elements files/editUsers.php\"'>Επεξεργασία Χρηστών</button>";
                    }
                  ?>
            
            </div>
          <div align="left" class="section3" style="display: flex; flex-direction: column; height: 100%;">
            <div style="font-size: 25px;font-weight: normal; margin-top: 20px; margin-right: 170px; margin-left: 30px;">
              Αποστολή e-mail στον καθηγητή:<br><br>

              • Μέσω web φόρμας<br>
                  
              • Με χρήση e-mail διεύθυνσης
            </div>
            <h2 style="margin-left: 30px;text-decoration-line:underline;">
              Αποστολή e-mail μέσω web φόρμας:
            </h2>
            <div style="margin-left: 100px; ">
              <form style="font-size: 20px; font-weight: bold; ">

                <label for="sender" >Αποστολέας:</label>
                <input type="text" id="sender" name="sender" size="30" style="margin-top: 5px;"><br>

                <label for="subject">Θέμα:</label>
                <input type="text" id="subject" name="subject" size="15" style=" margin-top: 25px;" ><br><br>

                <label for="main">Κείμενο:</label><br>
                <textarea id="main" name="main" rows="4" cols="50" style="font-size: 15px;"></textarea><br>
                <input type="submit" value="Αποστολή">
              </form>
            </div>
              


            <h2 style="margin-left: 30px;text-decoration-line:underline;">
              Αποστολή e-mail με χρήση e-mail διεύθυνσης:
            </h2>
            <div style="margin-left: 100px; font-size: 25px;font-weight: normal; margin-right: 300px;">
              Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου <a href="mailto:tutor@csd.auth.test.gr">tutor@csd.auth.test.gr</a>
            </div>

          </div>
        </div>
      </div>
  </body>
</html>

