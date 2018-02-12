<?php

include 'connection.php';
session_start();

if($_SESSION["email"] == null || $_SESSION["password"] == null)
{
    header('location:index.php');
}
$username = $_SESSION["email"];
$fname = mysqli_query($con,"select * from finalsignup where email = '$username'");
while($row=mysqli_fetch_array($fname))
{
 $fname=$row['fname'];
$lname = $row['lname'];
$email = $row['$email'];
$password = $row['$password'];
$gender = $row['gender'];
$age = $row['age'];
$address = $row['address'];
$province = $row['province'];
$country = $row['country'];
$postal = $row['postal'];
}
if(isset($_REQUEST['updateinfo']))
{
header("location:userupdateinfo.php");
}
if(isset($_REQUEST['updatepwd']))
{
header("location:userchangepwd.php");
}
if(isset($_REQUEST['closeaccount']))
{
mysqli_query($con,"update finalsignup set flag=0 where email='$username'");
mysqli_query($con,"delete from image_table where username='$username'");
mysqli_query($con,"delete from feedback where username='$username'");
header("location:close.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | User Information</title>
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
      <ul class="nav navbar-nav">
      <li><a href="upload.php">MAKE POST</a></li>
      </ul>
  <ul class="nav navbar-nav">
      <li><a href="userfeedback.php">GIVE FEEDBACK</a></li>
      </ul>
 <ul class="nav navbar-nav">
      <li><a href="userinfo.php">USER PROFILE</a></li>
      </ul>
    <ul class="nav navbar-nav">
      <li><a href="close.php">LOG OUT</a></li>
    </ul>
  </div>
</nav>
   
    
  <form method="POST">
      <div class="form-group">
      <label for="fname">First Name:</label>
     <?php echo $fname; ?>
    </div>
       <div class="form-group">
      <label for="lname">Last Name:</label>
       <?php echo $lname; ?>
    </div>
 <div class="form-group">
      <label for="age">Age:</label>
       <?php echo $age; ?>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <?php echo $username; ?>
    </div>
   <div class="form-group">
      <label>Address:</label>
     <?php  echo $address;?>
    </div>
     <div class="form-group">
      <label>Province:</label>
     <?php echo $province; ?>
    </div>
 <div class="form-group">
      <label>Country:</label>
     <?php echo $country; ?>
    </div>
 <div class="form-group">
      <label>Postal Code:</label>
     <?php echo $postal; ?>
    </div>
    
    <input type="submit" class="btn btn-primary" name="updatepwd" value="Change Password"/>
 <input type="submit" class="btn btn-primary" name="updateinfo" value="Update Information"/>
 <input type="submit" class="btn btn-primary" name="closeaccount" value="Close Account" onClick="return confirm('are you sure you want to close account??');"/>
  </form>
</div>
<br><br><br>
</body>
</html>