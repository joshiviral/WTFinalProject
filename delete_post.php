<?php

include 'connection.php';
session_start();

if($_SESSION["email"] == null || $_SESSION["password"] == null)
{
    header('location:adminlogin.php');
}
 $id= $_GET['id'];
$name = $_GET['name'];

if(mysqli_query($con,"delete from image_table where username='$id' AND name='$name'"))
{
$message = "Post has been deleted";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/admindeletepost.php';</script></script>";
}
else
{
$message = "Failed to delete post";
echo "<script type='text/javascript'>alert('$message');window.location.href = 'https://varun1995.000webhostapp.com/WT/admindeletepost.php';</script></script>";
}

?>