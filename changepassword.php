<?php
include 'connection.php';

$email = $_REQUEST['varname'];
//echo $email;
if(isset($_REQUEST['change']))
{


$password = $_REQUEST['pwd'];
 
$query = "UPDATE finalsignup SET password='$password' WHERE email='$email'";

    if(mysqli_query($con,$query))
    {
     $message = "Password has been changed";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/index.php';</script>";   

       
    }
    else
    {
      $message = "Failed to change password";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/index.php';</script>";  

    }
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | login</title>
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
      <a class="navbar-brand" href="#">TravelPedia</a>
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
    
    <input type="submit" class="btn btn-primary" name="change" value="Chnage Password"/>
      
   
  
  </form>
</div>

</body>
</html>