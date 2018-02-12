<?php

include 'connection.php';

if(isset($_REQUEST['submit']))
{

$email = $_REQUEST['email'];
$password = $_REQUEST['pwd'];
 
$query = "SELECT * FROM finaladmin WHERE username='$email' AND password='$password'";
$select = mysqli_query($con,$query);

		if($select->num_rows > 0)
        {
              session_start();
                   
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;
            header('location:adminhome.php');
			
	}
else
{
$message = "Login Failed";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/adminlogin.php';</script></script>";
}
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | Admin Login</title>
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
      <a class="navbar-brand" href="adminlogin.php">TravelPedia</a>
    </div>
    
  </div>
</nav>
    
  <form method="POST">
      <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter username" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    
    <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
  </form>
</div>

</body>
</html>