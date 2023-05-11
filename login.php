<?php
    session_start();

    include("config.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['uname'];
        $password = $_POST['pass'];

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            $query = "SELECT * FROM passenger WHERE Username = '$username' limit 1";
            $result = mysqli_query($con, $query);

                if(mysqli_num_rows($result) > 0) 
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['Password'] == $password)
                    {
                        $_SESSION["Username"] = $user_data["Username"];
                        header("Location: booking.php");
                        die;
                    }
                }
            echo "<script type='text/javascript'> alert('Incorrect Username or Password')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Invalid or Empty Username/Password')</script>";
        }
    }

?>



<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title> LOGIN </title>
    </head>
    <body>
        <div class="site">
        <form method="POST" class="site-content animate">
             <div class="img_container">
            <img src="Logpic.png" class="avatar">
            </div>
            <div class="container">
            <label>Username</label>
            <input type="text" placeholder="Username" name="uname" required>
            <br>

            <label>Password</label>
            <input type="password" placeholder="Password" name="pass" required>
            <br>

            <input type="checkbox">Remember me
            <input type="submit" name="" value="LOGIN">
            <label>
                <p>Don't have an account with us? <a href="signup.php">SIGN UP</a></p>
            </label>
        </div>
        </form>
    </div>
    </body>
</html>
