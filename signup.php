<?php

include 'connection.php';

if(isset($_REQUEST['signup']))
{

$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$password = $_REQUEST['pwd'];
$cpwd = $_REQUEST['cpwd'];
$gender = $_REQUEST['gender'];
$age = $_REQUEST['age'];
$address = $_REQUEST['address'];
$province = $_REQUEST['province'];
$country = $_REQUEST['country'];
$postal = $_REQUEST['postal'];

echo "email=".$email;

$query = "SELECT * FROM finalsignup WHERE email='$email' AND flag=1";
$select = mysqli_query($con,$query);
if($select->num_rows > 0)
{
$message1 = "User already exists";
echo "<script type='text/javascript'>alert('$message1');window.location.href = 'https://varun1995.000webhostapp.com/WT/signup.php';</script></script>";
return false;
}

if($password != $cpwd)
{
$message = "Please make sure confirm password matches the password";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/signup.php';</script></script>";
return false;
}

$query = "insert into finalsignup (fname,lname,email,password,gender,age,flag,address,province,country,postal) values ('$fname','$lname','$email','$password','$gender','$age',0,'$address','$province','$country','$postal')";
   $insert =  mysqli_query($con,$query);
    
    if($insert)
    {
        $to = $email;;
$subject = "WebTech new user verification";
$text = "<b>Please click the link below to verify your self<b><br/><br/>";


$text .="https://varun1995.000webhostapp.com/WT/emailverify.php?varname=$email";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: webtechproject@webtech.com";

mail($to,$subject,$text,$headers);
      $message = "We have sent you a mail. Please verify yourself using that mail";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/index.php';</script></script>";
     
    }
else
{
echo "failed to sign up";
}
   
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | signup</title>
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
     
      <li><a href="index.php">LOG IN</a></li>
        
</ul>
  </div>
</nav>
    
  <form method="POST">
      <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter your firstname" name="fname" required>
    </div>
       <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter your lastname" name="lname" required>
    </div>
      
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
      <div class="form-group">
      <label for="cpwd">Confirm Password:</label>
      <input type="password" class="form-control" id="cpwd" placeholder="Enter confirm password" name="cpwd" required>
    </div>
       <div class="form-group">
      <label for="gender">Gender:</label><br>
      <input type="radio" name="gender" value="Male" checked> Male<br>
  <input type="radio" name="gender" value="Female"> Female<br>
  <input type="radio" name="gender" value="Other"> Other 
      </div>
       <div class="form-group">
      <label for="age">Age:</label>
      <input type="text" class="form-control" id="age" placeholder="Enter age" name="age" required>
    </div>

 <div class="form-group">
      <label>Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
    </div>
 <div class="form-group">
      <label>Province:</label>
      <input type="text" class="form-control" id="province" placeholder="Enter Province" name="province" required>
    </div>
 <div class="form-group">
      <label>Country:</label>
      <input type="text" class="form-control" id="country" placeholder="Enter country" name="country" required>
    </div>
 <div class="form-group">
      <label>Postal Code:</label>
      <input type="text" class="form-control" id="postal" placeholder="Enter postal code" name="postal" required>
    </div>

    <input type="submit" class="btn btn-primary" name="signup" value="Sign up"/>
  </form>
</div>
<br><br><br><br>
</body>
</html>