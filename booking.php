<?php
    session_start();
    $username = $_SESSION['Username'];
    echo "Welcome  " . $username;

    include('config.php');

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $departure = $_POST['cdepart'];
        $destination = $_POST['cdest'];
        $date = $_POST['cdate'];

        if(!empty($departure) && !empty($destination) && !is_numeric($departure))
        {

            $query = "INSERT into bookings (Username, departure, destination, date) values ('$username', '$departure', '$destination', '$date')";

            $result = mysqli_query($con, $query);

            echo "<script type='text/javascript'> alert('Information gathered!!!')</script>";
            header("Location: viewb.php");
            die;
        }
        else
        {
            echo "<script type='text/javascript'> alert('Information not recieved!')</script>";
        }

    }

?>

<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title> COOPER Airlines </title>
</head>

<body>
    <h1> WELCOME TO COOPER AIRLINES </h1>
    <hr>
    <a href="login.php">Logout</a>
    <form method="POST">
      <label for="cdepart">Departure of City:</label>
      <input type="text" placeholder="Depart" name="cdepart" required><br><br>

      <label for="cdest">Destination of City:</label>
      <input type="text" placeholder="Depart" name="cdest" required><br><br>
      
      <label for="cdate">Date:</label>
      <input type="date" placeholder="Date" name="cdate" required><br><br>
      
      
      <input type="submit" value="Book Now">


      <p>Want to view booking:</p> <a href = viewb.php> Click Here </a>

        
    
</form>
</body>
</html>

