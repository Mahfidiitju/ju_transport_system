<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/shareloc.css">
</head>
<body>
  <div class="hero">
      <div class="main">
      <h1>Share location for teacher</h1>
        <br><br>
        <form action="" method="POST">
                <p>Starting point</p>
                <input type="text" name="starting_point" placeholder="enter starting point"  required>
                <p>Current Location</p>
                    <input type="text" name="current_location" placeholder="enter current location"  required >
                <!-- <p>Type</p>
                    <input type="text" name="typ" placeholder="enter type"  required > -->
                <p>Time</p>
                    <input type="text" name="time" placeholder="enter time"  required >
                    <input type="submit" name="submit" value="Add current location">
        </form>
      </div>
  </div>
       


<?php
if(isset($_POST['submit']))
{

      $starting_point=$_POST['starting_point'];
      $current_location=$_POST['current_location'];
      $time=$_POST['time'];
      $typ='teacher';
      $date=date("Y-m-d h:i:sa");
      $sql="INSERT INTO `find_bus` (`id`, `starting_point`, `current_location`, `typ`, `starting_time`,`time`)
       VALUES (NULL, '$starting_point', '$current_location', '$typ', '$time','$date')"; 
      echo $sql;

    $conn=mysqli_connect("localhost","root","","final") or die(mysqli_error());
    $res=mysqli_query($conn, $sql);

    if($res)
    {
      $_SESSION['add']="Location added successfully";
      header("location:".'http://localhost/ju_transport_system/'.'teacher_page.php');
    }

}
?>  
</body>
</html>





