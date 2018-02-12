<?php

include 'connection.php';
session_start();

if($_SESSION["email"] == null || $_SESSION["password"] == null)
{
    header('location:adminlogin.php');
}


if(isset($_REQUEST['block']))
{
header("location:adminuserblock.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | Users Information</title>
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
      <li><a hrfnameminupload.php">MAKE POST</a></li>
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
<?php   
$i=1;
   $select = mysqli_query($con,"select * from finalsignup where flag=1");
while($row=mysqli_fetch_array($select))
{
 $fname=$row['fname'];
$lname = $row['lname'];
$email = $row['email'];
$password = $row['password'];
$gender = $row['gender'];
$age = $row['age'];
$address = $row['address'];
$province = $row['province'];
$country = $row['country'];
$postal = $row['postal'];
echo "<label>".$i."</label>";
 echo "<form method='POST'>
      <div class='form-group'>
      <label for='fname'>First Name:</label>";
      echo $fname;
 echo   "</div>";
echo "<div class='form-group'>";
echo      "<label for='lname'>Last Name:</label>";
       echo $lname;
 echo   "</div>
    <div class='form-group'>
      <label for='email'>Email:</label>";
      echo $email;
echo  "</div>
   <div class='form-group'>
      <label>Address:</label>";
    echo $address;
    
    echo "</div><div class='form-group'>
      <label>Province:</label>";
      echo $province; 
    echo "</div>
 <div class='form-group'>
      <label>Country:</label>";
     echo $country;
    echo "</div>
 <div class='form-group'>
      <label>Postal Code:</label>";
      echo $postal; 
    echo "</div>";

  echo "</form><br>";
   $i++;
    }
    ?>
    <form>
    <input type='submit' class='btn btn-primary' name='block' value='Block Users'/>
    </form>
</div>
<br><br><br>
</body>
</html>