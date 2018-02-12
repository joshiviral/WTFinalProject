<?php

include 'connection.php';
session_start();

if($_SESSION["email"] == null || $_SESSION["password"] == null)
{
    header('location:adminlogin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | Admin Delete Post</title>
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
      <a class="navbar-brand" href="adminhome.php">TravelPedia</a>
    </div>
      <ul class="nav navbar-nav">
      <li><a href="adminupload.php">MAKE POST</a></li>
      </ul>

<ul class="nav navbar-nav">
      <li><a href="adminviewfeedback.php">VIEW FEEDBACK</a></li>
      </ul>
<ul class="nav navbar-nav">
      <li><a href="adminviewusers.php">VIEW USERS</a></li>
      </ul>
      <ul class="nav navbar-nav">
      <li><a href="admindeletepost.php">DELETE POST</a></li>
      </ul>
    <ul class="nav navbar-nav">
      <li><a href="adminclose.php">LOG OUT</a></li>
    </ul>
  </div>
</nav>
 
     
      <h3>Delete Post:</h3><br>
      <?php
 
 $select = "select * from image_table ORDER BY id desc";

$var = mysqli_query($con,$select);
$i=1;
while($row=mysqli_fetch_array($var))
{
 $path=$row['folder'];
echo "<form method='POST'>";
    echo "<label>".$i."</label><br>";
 echo "<img src=".$path." width='100' height='100'><br>";
echo "<br><label>Description : ".$row['comment']."</label>";
$mail = $row['email'];

echo "<br><label>Posted by : ".$row['username']."</label>"; 
echo "<br><label>Posted on : ".$row['time']."</label><br>";
echo "<a href='delete_post.php?id=".$row['username']."&name=".$row['name']."'>Delete Post</a><br><br>";
echo " </form>";
$i++;
}
          
          
          ?>
 
    
    
 
</div>
<br><br><br>
</body>
</html>