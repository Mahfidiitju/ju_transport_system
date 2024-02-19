<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/sche.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="tbl">
<h1 class="h11">Schedule for Teacher</h1>
<form action="" method="POST">
 <input type="submit" class="submit_btn" name ="submit1" value="Dhaka to Campus">
 <input type="submit" class="submit_btn" name ="submit2" value="Campus to Dhaka">
 <br><br>
</form>

<?php
     if(isset($_POST['submit1']))
     {
        $sche=$_POST['submit1'];

        $conn=mysqli_connect("localhost","root","","final");

        $sql="SELECT * FROM `$sche` WHERE `typ`='teacher' ";
            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            $n=0;
            if($count>0)
             {
                while($row=mysqli_fetch_assoc($res))
                {
                    $schedule[$n]=$row['schedule'];
                    $time[$n]=$row['time'];
                    $n++; 
                     
                }
            }
         ?>
        <table style="width:800px" class="table">
         <thead>
            <tr>
                <th scope="col">Serial no</th>
                <th scope="col">Schedule</th>
                <th scope="col">Time</th>
            </tr>
          </thead>
            <?php for($i=0;$i<$n;$i++){?>
            <tr>
                        <th scope="row"><?php echo $i+1?></th>
                        <td><?php echo $schedule[$i]?></td>
                        <td>
                            <?php echo $time[$i]?>
                        </td>
                    </tr>
                    <?php }?>
            </table>
            <?php
       
     }
     if(isset($_POST['submit2']))
     {
        $sche=$_POST['submit2'];

        $conn=mysqli_connect("localhost","root","","final");

        $sql="SELECT * FROM `$sche` WHERE `typ`='teacher' ";
            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            $n=0;
            if($count>0)
             {
                while($row=mysqli_fetch_assoc($res))
                {
                    $schedule[$n]=$row['schedule'];
                    $time[$n]=$row['time'];
                    $n++; 
                     
                }
            }
         ?>
        <table style="width:800px" class="table">
         <thead>
            <tr>
                <th scope="col">Serial no</th>
                <th scope="col">Schedule</th>
                <th scope="col">Time</th>
            </tr>
          </thead>
            <?php for($i=0;$i<$n;$i++){?>
            <tr>
                        <th scope="row"><?php echo $i+1?></th>
                        <td><?php echo $schedule[$i]?></td>
                        <td>
                            <?php echo $time[$i]?>
                        </td>
                    </tr>
                    <?php }?>
            </table>
            <?php
       


     }



?>
    
</body>
</html>