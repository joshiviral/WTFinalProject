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
if(isset($_REQUEST['submit']))
{
$fname= $_REQUEST['fname'];
$lname= $_REQUEST['lname'];
$address= $_REQUEST['address'];
$age= $_REQUEST['age'];
$province= $_REQUEST['province'];
$country= $_REQUEST['country'];
$postal= $_REQUEST['postal'];

if(mysqli_query($con,"update finalsignup set fname='$fname',lname='$lname',address='$address',age='$age',province='$province',country='$country',postal='$postal'
where email='$username'"))
{
$message = "Profile Information Changed Successfully";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/userinfo.php';</script></script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | Update Information</title>
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
   
  </div>
</nav>
    
  <form method="POST">
      <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" id="fname" value="<?php echo $fname; ?>" name="fname">
    </div>
       <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" id="lname" value="<?php echo $lname; ?>" name="lname">
    </div>
 <div class="form-group">
      <label>Age:</label>
      <input type="text" class="form-control"  value="<?php echo $age; ?>" name="age">
    </div>
<div class="form-group">
      <label>Address:</label>
      <input type="text" class="form-control"  value="<?php echo $address; ?>" name="address">
    </div>
<div class="form-group">
      <label>Province:</label>
      <input type="text" class="form-control"  value="<?php echo $province; ?>" name="province">
    </div>
<div class="form-group">
      <label>Country:</label>
      <input type="text" class="form-control"  value="<?php echo $country; ?>" name="country">
    </div>
<div class="form-group">
      <label>Postal Code:</label>
      <input type="text" class="form-control"  value="<?php echo $postal; ?>" name="postal">
    </div>
  
<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
  </form>
</div>

</body>
</html>