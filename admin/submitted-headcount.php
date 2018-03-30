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
        <th>RoomID</th>
        <th>Room</th>
        <th>Time Submitted</th>
        <th>HeadCount Type</th>
        <th>Headcount</th>


      </thead>

      <?php


              // Room Name/RoomID
              // Timestamp
              // Headcount type
              // HeadCount count
              // UserID


              $roomID = 1;
              $roomName = "room";
              $timestamp = "12:";
              $headCountType = "middle";
              $headcountCount = 1;


            for ($i = 0; $i < 6; $i++)
            {
              echo "<tr class='data'>" .
                  "<td class='roomID'>" . $i. "</td>" .
                  "<td class='room'>" . $roomName . "0" . $i . "</td>" .
                  "<td contenteditable='FALSE' class='time'>" . $timestamp . "0" . $i . "</td>" .
                  "<td contenteditable='FALSE' class='headcountType'>" . $headCountType . "</td>" .
                  "<td contenteditable='FALSE' class='headcountCount'>" . $headcountCount .$i . "</td>" .
                  "<td class='edit_btn'><button type='button' name='edit' class='btn-primary'  id='" . $i . "'' >Edit</button>";
              // "</tr>"

            }

            ?>
          </table> 
  </div>

</body>
