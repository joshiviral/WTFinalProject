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
  <title>TravelPedia | Delete User</title>
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
      
  </div>
</nav>
<?php   
$i=1;   
$select = mysqli_query($con,"select * from finalsignup");
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
 
  echo "</form>";
  echo "<a href='delete_user.php?id=".$email."'>Delete User</a><br><br>";
 
$i++;
    }
echo "<br><a href='adminviewusers.php'>Cancel</a><br><br>"; 
    ?>
   
</div>
<br><br><br>
</body>
</html>