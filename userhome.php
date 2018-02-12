<?php
include "connection.php";
 session_start();

if($_SESSION["email"] == null || $_SESSION["password"] == null)
{
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | Home</title>
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
      <h3>All Posts:</h3><br>
      <?php
          $select = "select * from image_table order by id desc";
$username = $_SESSION["email"];
$var = mysqli_query($con,$select);

$i=1;
while($row=mysqli_fetch_array($var))
{
 $path=$row['folder'];
    echo "<label>".$i."</label><br>";
 echo "<img src=".$path." width='100' height='100'><br>";
echo "<br><label>Description : ".$row['comment']."</label>";
echo "<br><label>Posted by : ".$row['username']."</label>";
echo "<br><label>Posted on : ".$row['time']."</label><br>";
$i++;
}
          
          ?>
    </div>
    
    
  </form>
</div>

</body>
</html>