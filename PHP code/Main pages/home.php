<html>
  <head>
    <meta charset="UTF-8">
    <title>Αρχική σελίδα</title>
    <link rel="stylesheet" href="../../CSS code/style.css">
    <link rel="icon" type="image/png" href="..\..\images\Browser icon.png" sizes="32x32">
    <div class=section1>
      <img src="../../images\logo.png"align="center" width="150" height="150" style="margin-left: 30px; position:relative; bottom:30px;">
      <h1 align="center" style=" font-size: 40px; position:relative; bottom: 150px; ">Αρχική σελίδα</h1>
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
          <div style = "margin-top: 50px; margin-left: 50px; margin-right: 50px;" >
              <em style="font-size: 24px;">
                Το μάθημα της Τεχνολογίας Βάσεων Δεδομένων διδάσκεται στο 6ο εξάμηνο 
                σπουδών του Προπτυχιακού Προγράμματος Σπουδών του Τμήματος Πληροφορικής. <br> <br>
                Σκοπός του μαθήματος είναι η μελέτη τρόπων οργάνωσης των δεδομένων, διαχείρισης, βελτιστοποίησης ερωτημάτων, 
                με στόχο την αποτελεσματική και αποδοτική επεξεργασία από ένα Σύστημα Διαχείρισης Βάσεων Δεδομένων. <br> 
                Επίσης, θα ασχοληθούμε με τεχνικές λεπτομέρειες υλοποίησης πραγματικών συστημάτων και θα μελετήσουμε θέματα 
                διαχείρισης συναλλαγών (transactions) και τεχνικές ανάκαμψης (recovery). <br> 
                Ακόμη, θα μελετήσουμε θέματα που αφορούν στην παράλληλη και κατανεμημένη διαχείριση δεδομένων και θα 
                συζητήσουμε και για τις σύγχρονες τάσεις που επιβάλουν τη χρήση τεχνικών Big Data. 
              </em>
            </div>
              <img src="../../images\dbt.png"align="center" width="900" height="150"  style="margin-top:30px; margin-left: 80px;">
        </div>
      </div>
    </div>
  </body>
</html>

