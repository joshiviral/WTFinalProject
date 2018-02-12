<?php
include "connection.php";

 session_start();

if($_SESSION["email"] == null || $_SESSION["password"] == null)
{
    header('location:index.php');
}
if(isset($_REQUEST["upload"]))
{
$username = $_SESSION["email"];
$comment = $_REQUEST["des"];
    for($i=0;$i<count($_FILES["file_img"]["tmp_name"]);$i++)
    {
        $filetmp = $_FILES["file_img"]["tmp_name"][$i];
        $filename= $_FILES["file_img"]["name"][$i];
        $filepath = "images/".$filename;
        
       $t = time();
        
     //  $curr_date = date('m/d/Y h:i:s');
        $curr_date=date('d/m/Y',$t);
      move_uploaded_file($filetmp,$filepath);
   $result = mysqli_query($con,"INSERT INTO image_table (username,folder,name,comment,time,flag) VALUES ('$username','$filepath','$filename','$comment','$curr_date',1)");
    }
    
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TravelPedia | Make Post</title>
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
    <label>Upload Image:</label> 
 <input type="file" name="file_img[]" multiple> <br>
    <label for="desc" align="center">Description:</label><br>
         <textarea name="des" rows="5" cols="159" style="vertical-align:middle;"> </textarea>
    <br><br>
 <input type="submit" class="btn btn-primary" name="upload" value="Upload">
</form>
   <br>
<h3>My Posts</h3>
<?php
$username = $_SESSION["email"];

$select = "select * from image_table where username='$username' ORDER BY id desc";
$var = mysqli_query($con,$select);
$i = 1;
while($row=mysqli_fetch_array($var))
{
 $path=$row['folder'];
    echo "<label>".$i."</label><br>";
 echo "<img src=".$path." width='100' height='100'><br>";
echo "<br><label>Description : ".$row['comment']."</label>";
echo "<br><label>Posted on : ".$row['time']."</label><br>";
$i++;
}
          
     
?>
 </div>
<br><br><br>
</body>
</html>