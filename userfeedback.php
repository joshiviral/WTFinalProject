<?php
include "connection.php";
session_start();
if($_SESSION["email"] == null || $_SESSION["password"] == null)
{
    header('location:index.php');
}

if(isset($_REQUEST["feedback"]))
{
$username = $_SESSION["email"];
$feed = $_REQUEST['cmnt'];
$t = time();
        
     //  $curr_date = date('m/d/Y h:i:s');
        $curr_date=date('d/m/Y',$t);
 mysqli_query($con,"INSERT into feedback (username,feed,time) values ('$username','$feed','$curr_date');");

$message = "Feedback has been sent";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/userhome.php';</script>";   

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | Give Feedback</title>
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
   
  		
<form method="POST" enctype="multipart/form-data">
    <label>Feedback:</label> 

         <textarea name="cmnt" rows="5" cols="159" style="vertical-align:middle;"></textarea>
    <br><br>
 <input type="submit" class="btn btn-primary" name="feedback" value="Post">
</form>
    </div>
</body>
</html>