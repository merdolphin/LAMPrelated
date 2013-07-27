<?php

// written by lina on Sat Jul 27 13:02:41 SGT 2013

 $con=mysqli_connect("localhost","root","DurianL0ver","user_logs") or die ("cannot connect to databse, please check with web administor.");

// Check if the cookie exists, if true then verifies it with database.

if (isset($_COOKIE['user']) && isset($_COOKIE['pass']))
    {
    
    $usar=$_COOKIE['user'];
    $pswd=$_COOKIE['pass'];
    echo "$usar<br>";
    
    $sql="SELECT * FROM user WHERE username='$usar'";
    $result=mysqli_query($con,$sql);
    $info=mysqli_fetch_array($result);

    // if verified redirects your page to memeber.php
    if(mysqli_num_rows($result)==1 && $pswd==$info[password])
    {
        header("Location:member.php");
      
    }
    
    }

$user=$_POST["username"];
$pwd=($_POST["passwd"]);
$sql="SELECT * FROM user WHERE username='$user'";
$result=mysqli_query($con, $sql);
$info=mysqli_fetch_array($result);


if (mysqli_num_rows($result)==1 && $pwd==$info[password])
{
    $hour=time() + 60;
    setcookie(user, $_POST['username'],$hour);
    setcookie(pass, $_POST['passwd'],$hour);
    header ("Location: member.php");
}else{
    echo "Access denied. Try re-entering your username and password. 
    <br><br>If you haven't registered yet, <a href='register.php'>Click here to register</a>";
    echo "<br><br><h3>Login module</h3>";
    echo "<form action='login2.php' method='post'>";
    echo "Name: <input type='input' name='username' /><br><br>";
    echo "password: <input type='password' name='passwd' /><br><br>";
    echo "<input type='submit' name=submit/>";
    echo "</form>";
}



?>
