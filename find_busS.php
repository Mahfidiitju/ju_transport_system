<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/findBus.css">
</head>
<body>
    <div class="hero">
    <div class="main">
           <h1>Find location for Student</h1>
            <br>
            <form action="" method="POST">
      

                <p>Starting point</p>
                <input type="text" name="starting_point" placeholder="Enter starting point">
                <p>Starting Time</p>
                <input type="text" name="time" placeholder="Enter starting time">
                <input type="submit" name="submit" value="Find Location">
            </form>

            <?php
        if(isset($_POST['submit']))
        {

            $starting_point=$_POST['starting_point'];
            $time=$_POST['time'];
            $sql="SELECT current_location,time FROM `find_bus` WHERE `starting_point`
            LIKE '$starting_point' AND `typ` LIKE 'student' AND `starting_time` LIKE '$time' ORDER BY id DESC ";

            $conn=mysqli_connect("localhost","root","","final") or die(mysqli_error());
            $res=mysqli_query($conn, $sql);
            $count=mysqli_num_rows($res);
            if($count>=1)
            {
                $rows=mysqli_fetch_assoc($res);
                $find_bus=$rows['current_location'];
                $date=$rows['time'];
                echo $date;
                    ?>
                    <iframe class="map" src="https://maps.google.com/maps?q=<?php echo $find_bus ?>%20,dhaka%20%201342,%20Bangladesh
                        &t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen="" loading="lazy"></iframe>
                        <?php
            
            }
            else{

              
                echo "No location Shared";
            }
            

        }
        ?>
        </div>
    </div>
    

</body>
</html>











