<html>
  <head>
    <meta charset="UTF-8">
    <title>Εργασίες</title>
    <link rel="stylesheet" href="/CSS code/style.css">
    <link rel="icon" type="image/png" href="\images\Browser icon.png" sizes="32x32">
    <div class=section1>
      <img src="\images\logo.png"align="center" width="150" height="150" style="margin-left: 30px; position:relative; bottom:30px;">
      <h1 align="center" style=" font-size: 40px; position:relative; bottom: 150px; ">Εργασίες</h1>
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

          <div align="center" class="section3">

            <?php
              $mysqli = require dirname(dirname(__FILE__)) . "/database.php";

              $sql = "SELECT id, targets, fileName, filesToSend , deadline FROM projects;";
              $res = $mysqli->query($sql);

              if($_SESSION['role'] === 'tutor' ){
                echo '<div style="margin-top:30px; border-bottom: 3px solid black; width: 90%; ">
                          <h2 style="margin-left:30px; font-size: 25px; font-weight: bold;text-decoration-line:underline;">
                          <a href="/PHP code/Add elements files/addHomework.php">Προσθήκη νέας εργασίας</a></h2><br>
                      </div>';

                  while ($x = mysqli_fetch_row($res)) {
                    $id = $x[0];
                    echo 
                      '
                      <div style="margin-top:30px; border-bottom: 3px solid black; width: 90%; ">

                      <div style ="display:flex">
                          <h2 style="margin-left:30px; font-size: 25px; font-weight: bold;text-decoration-line:underline;">Εργασία '.$id.'</h2><br>
                          <a style="margin-left:10px; margin-top:27px ;font-size: 20px; font-weight: bold;text-decoration-line:underline;" href="/PHP code/Delete elements files/deleteHomework.php?id='.$id.'">[Διαγραφη]</a>
                          <a style="margin-left:10px; margin-top:27px ;font-size: 20px; font-weight: bold;text-decoration-line:underline;" href="/PHP code/Edit elements files/editHomework.php?fileName='.str_replace(' ', '&nbsp;', $x[2]).'&targets='.$x[1].'&id='.$id.'&filesToSend='.$x[3].'&deadline='.$x[4].'">[Eπεξεργασια]</a>
                      </div>
                      
                      
                      <div style="margin-left: 100px; margin-bottom: 30px;">
                        
                        <i style=" font-size: 22px;"><b>Στόχοι:</b> Οι στόχοι τις εργασίας είναι<br></i>
                        <div style="margin-left: 50px;">
                          <i style=" font-size: 22px; ">
                          '.nl2br($x[1]).'
                          </i>
                        </div><br>
        
                        <i style=" font-size: 22px;"><b>Εκφώνηση: </b></i><br>
                        <i style=" font-size: 22px; margin-left: 50px;">Κατεβάστε την εκφώνηση της εργασίας από <a  style="font-size: 25px;"; href="'.$x[2].'"download>εδώ.</a></i><br><br>
        
                        <i style=" font-size: 22px;"><b>Παραδοτέα:</b><br></i>
                        <div style="margin-left: 50px;">
                          <i style=" font-size: 22px; ">
                          '.nl2br($x[3]).'
                          </i>
                        </div> <br>
        
                        <i style=" font-size: 22px;"><b>Ημερομηνία παράδοσης: </b>'.$x[4].'</i><br>
                      </div>
                    </div>';
                  }
              }else{
                  while ($x = mysqli_fetch_row($res)) {
                    echo 
                      '
                      <div style="margin-top:30px; border-bottom: 3px solid black; width: 90%; ">

                      <h2 style="margin-left:30px; font-size: 25px; font-weight: bold;text-decoration-line:underline;">Εργασία '.$x[0].'</h2><br>
                      <div style="margin-left: 100px; margin-bottom: 30px;">
                        
                        <i style=" font-size: 22px;"><b>Στόχοι:</b> Οι στόχοι τις εργασίας είναι<br></i>
                        <div style="margin-left: 50px;">
                          <i style=" font-size: 22px; ">
                          '.nl2br($x[1]).'
                          </i>
                        </div><br>
        
                        <i style=" font-size: 22px;"><b>Εκφώνηση: </b></i><br>
                        <i style=" font-size: 22px; margin-left: 50px;">Κατεβάστε την εκφώνηση της εργασίας από <a  style="font-size: 25px;" href="'.$x[2].'" download>εδώ.</a></i><br><br>
        
                        <i style=" font-size: 22px;"><b>Παραδοτέα:</b><br></i>
                        <div style="margin-left: 50px;">
                          <i style=" font-size: 22px; ">
                          '.nl2br($x[3]).'
                          </i>
                        </div> <br>
        
                        <i style=" font-size: 22px;"><b>Ημερομηνία παράδοσης: </b>'.$x[4].'</i><br>
                      </div>
                    </div>';
                  }
              }
            ?>
            
            <div style="font-size: 25px; position:relative; left: 80%; top:10px; " class="scroll-top"> 
              <a class="scroll-top__link" href='/PHP code/Main pages/homework.php'>Top</a> 
            </div>

        </div>
      </div>
    </div>
  </body>
</html>

