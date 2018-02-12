<?php
include 'connection.php';
session_start();

if($_SESSION["email"] == null || $_SESSION["password"] == null)
{
    header('location:index.php');
}
$email = $_SESSION["email"];

if(isset($_REQUEST['change']))
{
$password = $_REQUEST['pwd'];
$cpwd = $_REQUEST['cpwd'];

if($password != $cpwd)
{
$message = "Please make sure confirm password matches the password";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/userchangepwd.php';</script></script>";
return false;
}

 $query = "UPDATE finalsignup SET password='$password' WHERE email='$email'";
    if(mysqli_query($con,$query))
    {
     $message = "Password has been changed";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/userinfo.php';</script></script>";   
    }
    else
    {
      $message = "Failed to change password";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/userinfo.php';</script>";  
    }
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | Change Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br/>
<div class="container">
  
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="userhome.php">TravelPedia</a>
    </div>
   
  </div>
</nav>
    
  <form method="POST">
      <div class="form-group">
      <label for="pwd">New password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter new password" name="pwd">
    </div>
    <div class="form-group">
      <label for="password">Confirm New Password:</label>
      <input type="password" class="form-control" id="cpwd" placeholder="Enter new Confirmed password" name="cpwd">
    </div>
    
    <input type="submit" class="btn btn-primary" name="change" value="Change Password"/>
      
   
  
  </form>
</div>

</body>
</html>