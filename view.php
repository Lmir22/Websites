<?php
session_start();

include('config.php');

$username = $_SESSION["Username"];

?>


<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title> Cooper Airlines </title>
</head>

<body>
    <h1> WELCOME TO COOPER AIRLINES </h1>
    <hr>
    <a href="login.php">Logout</a>
    <form method="GET">
      <p>Booking:</p>
   <?php
      $query = "SELECT * FROM bookings WHERE Username = '$username'";
      $result = mysqli_query($con, $query);
      $cresult = mysqli_num_rows($result);

      if($cresult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
                echo $row['bookID'] . "<br>";
                echo $row['Username'] . "<br>";
                echo $row['departure'] . "<br>";
                echo $row['destination'] . "<br>";
                echo $row['date'] . "<br>";
        }
      }
     ?>
        <br>
        <p>More information about your plane ticket will come in a later date!</p>
        <br>
        <p>Thanks for booking with us!</p>
      

        
    
</form>
</body>
</html>


