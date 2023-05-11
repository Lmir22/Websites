<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }

include('config.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $gmail = $_POST['email'];
    $address = $_POST['add'];
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    
    if (strlen($_POST["pass"]) < 7) {
        echo("Password must be at least 7 characters");
        die;
    }
    
    if ( ! preg_match("/[a-z]/i" , $_POST["pass"])) {
        echo("Password must contain at least one letter");
        die;
    }
    
    if ( ! preg_match("/[0-9]/i" , $_POST["pass"])) {
        echo("Password must contain at least one #");
        die;
    }
    
    if ( $_POST["pass"] !== $_POST["repass"]) {
        echo("Password must be identical");
        die;
    }


    if(!empty($username) && !empty($password) && !is_numeric($username))
    {

        $query = "INSERT into passenger (Username, Password, First_Name, Last_Name, Email, Address) values ('$username', '$password', '$firstname', '$lastname', '$gmail', '$address')";

        mysqli_query($con, $query);

        echo "<script type='text/javascript'> alert('Successfully signed up')</script>";
    }
    else
    {
        echo "<script type='text/javascript'> alert('Go back and enter valid information.')</script>";
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title> SIGN UP </title>
    </head>

    <body>
        <div class="signup">
        <form method="POST">
            <h1>SIGN UP HERE</h1>
            <p> Please fill out everything in this 
                form to create your account</p>
            <hr>

            <lable>First Name</lable>
            <input type="text" placeholder="First Name" name="fname" required>
            <br>

            <lable>Last Name</lable>
            <input type="text" placeholder="Last Name" name="lname" required>
            <br>

            <lable>Email</lable>
            <input type="email" placeholder="Email" name="email" required>
            <br>

            <lable>Address</lable>
            <input type="text" placeholder="Address" name="add" required>
            <br>

            <lable>Username</lable>
            <input type="text" placeholder="Username" name="uname" required>
            <br>

            <lable>Password</lable>
            <input type="password" placeholder="Password" name="pass" required>
            <br>

            <lable>Renter Password</lable>
            <input type="password" placeholder="Re-Password" name="repass" required>
            <br>

            <input type="submit" name="" value="SIGN UP">

            <p>By creating this account, you have read and agreed to out <a href="https://www.booking.com/content/terms.html">Customer Terms Of Service</a></p>
            </div>
            <div class="login">
            <p>If you already have an account? <a href="login.php">LOGIN</a></p>
        </form>
        </div>
    </body>

</html>
