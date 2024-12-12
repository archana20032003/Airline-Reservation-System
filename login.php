<?php

include("connect.php");

if(isset($_POST["submit"]))
{
$email = $_POST['email'];
$password = $_POST['password'];

if(!empty($email) && !empty($password) && !is_numeric($email))
{
  $query= "select * from signup where email='$email' limit 1";
  $result=mysqli_query($conn,$query);

if($result)
{
  if($result && mysqli_num_rows($result)>0)
  {
      $user_data= mysqli_fetch_assoc($result);

      if($user_data['password']== $password)
      {
          echo "<script type='text/javascript'> alert('Successfully Logined....')</script>";
          header("location: home.php");
          die();
           
            
        }
    }
  }
  echo "<script type='text/javascript'> alert('Wrong username or password....')</script>";
  }
  else{
    echo "<script type='text/javascript'> alert('Wrong username or password....')</script>";
}

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="b.css">
</head>
<body>
    <div class="d1">
            <h1><u>SIGN IN</u></h1>
            <div class="d2">
            <input type="email" placeholder="Username">
            </div>
            <div class="d2">
            <input type="password" placeholder="Password">
            </div>
            <button class="btn2" onclick="window.location.href='home.php'">SUBMIT</button>
            <div class="diya">
                <p>Don't have an account ???<a href="signup.php">Sign Up</a></p>
            </div>
    </div>
</body>
</html>