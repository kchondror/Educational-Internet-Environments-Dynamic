<html>
  <head>
    <meta charset="UTF-8">
    <title>Ανακοινώσεις</title>
    <link rel="stylesheet" href="/CSS code/style.css">
    <link rel="icon" type="image/png" href="\images\Browser icon.png" sizes="32x32">
    <div class=section1>
      <img src="\images\logo.png"align="center" width="150" height="150" style="margin-left: 30px; position:relative; bottom:30px;">
      <h1 align="center" style=" font-size: 40px; position:relative; bottom: 150px; ">Ανακοινώσεις</h1>
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
        <div align="center" class="section3 scrollbar">


          <?php
            $mysqli = require dirname(dirname(__FILE__)) . "/database.php";

            $sql = "SELECT id, date, subject, mainText FROM announcements;";
            $res = $mysqli->query($sql);

            if($_SESSION['role'] === 'tutor' ){
              echo '<div style="margin-top:30px; border-bottom: 3px solid black; width: 90%; ">
                        <h2 style="margin-left:30px; font-size: 25px; font-weight: bold;text-decoration-line:underline;">
                        <a href="/PHP code/Add elements files/addAnnouncement.php">Προσθήκη νέας ανακοίνωσης 1</a></h2><br>
                    </div>';
              
              while ($x = mysqli_fetch_row($res)) {
                $id = $x[0];
                echo '<div style="margin-top:30px; border-bottom: 3px solid black; width: 90%; ">
                        <div style ="display:flex">
                          <h2 style="margin-left:30px; font-size: 25px; font-weight: bold;text-decoration-line:underline;">Ανακοίνωση '.$id.'</h2>
                          <a style="margin-left:10px; margin-top:27px ;font-size: 20px; font-weight: bold;text-decoration-line:underline;" href="/PHP code/Delete elements files/deleteAnnouncement.php?id='.$id.'">[Διαγραφη]</a>
                          <a style="margin-left:10px; margin-top:27px ;font-size: 20px; font-weight: bold;text-decoration-line:underline;" href="/PHP code/Edit elements files/editAnnouncement.php?subject='.str_replace(' ', '&nbsp;', $x[2]).'&text='.$x[3].'&id='.$id.'">[Eπεξεργασια]</a>
                        </div>
                        
                        <br>
                        <i style="margin-left: 100px; font-size: 22px;"><b>Ημερομηνία : </b>'.$x[1].'</i><br><br>
                        <i style="margin-left: 100px; font-size: 22px;"><b>Θέμα: </b> '.$x[2].'</i><br><br><br>
                
                      <div style="margin-left:70px; margin-right: 200px; margin-bottom: 30px;" >
                        <i style="font-size: 22px;">'.$x[3].'</i>
                      </div>
                    </div>';
              }      
            }else{
              while ($x = mysqli_fetch_row($res)) {
                echo '<div style="margin-top:30px; border-bottom: 3px solid black; width: 90%; ">
                        <h2 style="margin-left:30px; font-size: 25px; font-weight: bold;text-decoration-line:underline;">Ανακοίνωση '.$x[0].'</h2>
                        
                        <br>
                        <i style="margin-left: 100px; font-size: 22px;"><b>Ημερομηνία : </b>'.$x[1].'</i><br><br>
                        <i style="margin-left: 100px; font-size: 22px;"><b>Θέμα: </b> '.$x[2].'</i><br><br><br>
                  
                        <div style="margin-left:70px; margin-right: 200px; margin-bottom: 30px;" >
                          <i style="font-size: 22px;">'.$x[3].'</i>
                        </div>
                      </div>';
              }
          }
      
          
          ?>
          <div style="font-size: 25px; position:relative; left: 80%; top:10px; " class="scroll-top"> 
            <a class="scroll-top__link" href='/PHP code/Main pages/announcements.php'>Top</a> 
          </div>
          
        </div>
      </div>
    </div>
  </body>
</html>