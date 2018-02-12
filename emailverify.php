<?php

include 'connection.php';
$email = $_REQUEST['varname'];


mysqli_query($con,"update finalsignup set flag = 1 where email='$email'");

 $message = "You have been varified. Now you can log in using your credentials";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/index.php';</script></script>";

?>