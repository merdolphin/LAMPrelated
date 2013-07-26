// written by lina on Fri Jul 26 16:40:44 SGT 2013
// Please change it to your password. 

     <form name = "create" action = "register.php" method = "post">
     Username :<br>  <input name = username type = "input" maxlength = 10 value = "" size = 30 class = "form"><br><br>
     First name :<br>  <input name = firstname type = "input" maxlength = 15 value = "" size = 30 class = "form"><br><br>
     Last name :<br>  <input name = lastname type = "input" maxlength = 15 value = "" size = 30 class = "form"><br><br>
     Institution :<br>  <input name = institution type = "input" maxlength = 25 value = "" size = 30 class = "form"><br><br>
     Email address :<br>  <input name = email type = "input" maxlength = 30 value = "" size = 30 class = "form"><br><br>
     Password:<br>  <input name = passwd type = "password" maxlength = 10 value = "" size = 30 class = "form"><br><br>
     Retype Password:<br>  <input name = passwd2 type = "password" maxlength = 10 value = "" size = 30 class = "form"><br><br>
     <input name = submit type = submit value = "Create" class = "genbuttons">
     </form>


<?php

$con=mysqli_connect("localhost","root","DurianLover","user_logs");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// if everything is empty then returns with message.
if (empty($_POST["username"]))
{
    echo "Please enter your username.<br>";
}

if (empty($_POST["firstname"]))
{
    echo "Please enter your firstname.<br>";
}


if (empty($_POST["lastname"]))
{
    echo "Please enter your lastname.<br>";
}


if (empty($_POST["institution"]))
{
    echo "Please enter your institution.<br>";
}


if (empty($_POST["email"]))
{
    echo "Please enter your Email.<br>";
}


if (empty($_POST["passwd"]))
{
    echo "Please enter your password.<br>";
}

if ($_POST["passwd"] != $_POST["passwd2"])
{
    echo "The passwords your input are different. <br>Please check your password.<br>";
}

// if values are properly posted, applied md5 hash to the password.
if (isset($_POST["username"]) && isset($_POST["firstname"]) && isset($_POST["lastname"])  && isset($_POST["institution"])  && isset($_POST["passwd"])  && isset($_POST["passwd2"]) )
{
    $username = $_POST["username"];
    $_POST["passwd"] = md5($_POST["passwd"]);
    $passwd = $_POST["passwd"];
    $email = $_POST["email"];

    // again when the value are properly posted, queries the database if the same username exists. If true then returns with message else writes on the database.

    $checkuser = mysqli_query($con,"SELECT username FROM user WHERE username='$username'");
    $checkemail = mysqli_query($con, "SELECT email FROM user WHERE email='$email'");

    $username_exist = mysqli_num_rows($checkuser);
    $email_exist = mysqli_num_rows($checkemail);

    if($username_exist > 0)
    {
        echo "The username you’ve request has already been taken, please try any other username.<br>";
    }
    
    if($email_exist > 0)
    {
        echo "The email you’ve request has already been registered, are you forgetting your password?.<br>";
    }
    else{
        $sql="INSERT INTO user (username, firstname, lastname, institution, email, password)
            VALUES
            ('$_POST[username]','$_POST[firstname]','$_POST[lastname]','$_POST[institution]','$_POST[email]','$_POST[passwd]')";

        if (!mysqli_query($con,$sql))
        {
            die('Error: ' . mysqli_error($con));
        }
        echo "Welcome $_POST[username], please login.<br>";
    }
}

mysqli_close($con);
?> 

