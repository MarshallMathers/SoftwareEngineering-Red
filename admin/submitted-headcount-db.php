<?php

require_once("config_headcnt.php");

try{
    $connString = "mysql:host=" . DBHOST . ";dbname=" .DBNAME;
    $user=DBUSER;
    $pass=DBPASS;
    $pdo = null;
  }catch(PDOException $e){
    print "ERROR!: " . $e->getMessage() . "<br/>";
    
    die();
}
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script type="text/javascript" src="submitted-headcount.js"></script>
  <title>Submitted Count</title>
  <!-- change to what you want the tab's title to be -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Boston Code Camp</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark">Bob</a>
      <!--this will be the name of the logged in admin -->
    </nav>
    <a class="btn btn-outline-primary" href="#">Sign Out</a>
    <!-- remove the Username and Sign Out sections for the login page, they will be displayed after -->
  </div>
  <!-- your code goes below -->
  <div class="container">
    <CENTER>
      <h2>Room Count View</h2></CENTER>
    <br>
    <table class="table table-bordered">
    <thead>
        <!-- <th>RoomID</th>
        <th>Room</th>
        <th>Time Submitted</th>
        <th>HeadCount Type</th>
        <th>Headcount</th> -->






            <?php


              $pdo = new PDO($connString, $user, $pass);
              // $sql = "SELECT  `Forms`";
              $sql = "SELECT * FROM Forms";


              $result = $pdo->query($sql);

              echo 
              "<th>FormID</th>".
              "<th>RoomID</th>".
              "<th>TimeslotID</th>".
              "<th>Headcount Count</th>".
              "<th>UserID</th>".
              "<th>HeadcountType</th>".
              "<th>Timestamp</th>".
              "</thead>";
      
              // echo "tr"
              while($row = $result->fetch())
              {
                
                
              // FormID, RoomID, HeadcountCount, USERID, HeadcountType, timestamp
                
                $formid = $row['FormID'];
                $roomid = $row['RoomID'];
                $timeslotid = $row['TimeslotID'];
                $headcount = $row['HeadcountCount'];
                $userid = $row['UserID'];
                $headcounttype = $row['HeadcountType'];
                $tstamp = $row['Timestamp'];


                


                echo "<tr>".
                "<td>".$formid ."</td>". // FormID
                "<td>".$roomid ."</td>". // RoomID
                "<td>".$timeslotid ."</td>". // TimeslotID
                "<td>".$headcount ."</td>". // HeadcountCount
                "<td>".$userid ."</td>". // UserID
                "<td>".$headcounttype ."</td>". // Headcountype
                "<td>".$tstamp ."</td>". // Timestamp
                "</tr>";


              }







            ?>

            </div>
          
</body>