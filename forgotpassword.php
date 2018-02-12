<?php
include 'connection.php';
if(isset($_REQUEST['chnagepassword']))
{

$email = $_REQUEST['username'];
 $query = "SELECT * FROM finalsignup WHERE email='$email'";
$select = mysqli_query($con,$query);
		if($select->num_rows > 0)
        {		
$to = $email;
$subject = "Forgot password";
$text = "<b>Click on given link to set new password<b><br/><br/>";
$text .="https://varun1995.000webhostapp.com/WT/changepassword.php?varname=$email";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: webtechproject@webtech.com";

if(mail($to,$subject,$text,$headers))
                {
   header('location:page1.php'); 
}			
			
	}
else
{
$message = "No user found. Please check your email Id";
echo "<script type='text/javascript'>alert('$message');</script>";
}
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | Recover Password</title>
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
      <a class="navbar-brand" href="index.php">TravelPedia</a>
    </div>
   
  </div>
</nav>
    
  <form method="POST">
      <div class="form-group">
      <label for="username">Email Id</label>
      <input type="text" class="form-control" id="username" placeholder="Enter email id" name="username">
    </div>
    
    <input type="submit" class="btn btn-primary" name="chnagepassword" value="Send Recovery Password"/>

  
  </form>
</div>

</body>
</html>