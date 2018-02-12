<?php
include 'connection.php';

if(isset($_REQUEST['login']))
{

$email = $_REQUEST['username'];
$password = $_REQUEST['password'];

$query = "SELECT * FROM finalsignup WHERE email='$email' AND password='$password'";

$select = mysqli_query($con,$query);

		if($select->num_rows > 0)
        {
 
			while($row = mysqli_fetch_array($select))
            { 
			if($row['flag']==1)
                {
                    session_start();
                   
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;
                   
    
		 header("location:userhome.php");
        } 
else
{
$message = "Login Failed";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/index.php';</script></script>";
}

			} 
		}
else
{
$message = "Login Failed";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/index.php';</script></script>";
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
      <a class="navbar-brand" href="index.php">TravelPedia</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="signup.php">SIGN UP</a></li>
        
</ul>
  </div>
</nav>
    
  <form method="POST">
      <div class="form-group">
      <label for="username">Email id:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter email id" name="username">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    
    <input type="submit" class="btn btn-primary" name="login" value="Log in"/>
      
      
    
  <br><br>  <a href="forgotpassword.php">Forgot password?</a>
  
  </form>
</div>

</body>
</html>