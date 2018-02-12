<?php

include 'connection.php';
session_start();

if($_SESSION["email"] == null || $_SESSION["password"] == null)
{
    header('location:adminlogin.php');
}
 $id= $_GET['id'];
mysqli_query($con,"delete from image_table where username='$id'");
mysqli_query($con,"delete from feedback where username='$id'");
if(mysqli_query($con,"update finalsignup set flag=0 where email='$id'"))
{

$message = "User has been deleted";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/adminviewusers.php';</script></script>";
}
else
{
$message = "Failed to delete user";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/adminviewusers.php';</script></script>";
}
header('location:adminviewusers.php');
?>