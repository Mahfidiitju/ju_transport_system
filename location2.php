<!-- dhaka to campus -->
<?php include('menu.php'); ?>
 <div class="main">
    <div class="box">
        <h1>Add Schedule(Dhaka to Campus)</h1>
        <br><br>
        <form action="" method="POST">
        <table>
        <tr>
            <td>Schedule:</td>
            <td><input type="text" name="schedule"
            placeholder="enter schedule"  required></td>
        </tr>
        <tr>
            <td>Time:</td>
            <td>
                <input type="text" name="time" placeholder="enter time"  required >
            </td>
        </tr>
        <tr>
        <td>Type:</td>
                <td>
                <select name="typ">
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
                </td>
        </tr>
            </tr>
            <td colspan="2">
                <input type="submit" class="btn-primary" name="submit" value="Add location">
            </td>
        </tr>
        </table>
        </form>



<?php
if(isset($_POST['submit']))
{

      $schedule=$_POST['schedule'];
      $time=$_POST['time'];
      $typ=$_POST['typ'];
      $sql="INSERT INTO `dhaka to campus` (`id`, `schedule`, `time`, `typ`) VALUES (NULL, '$schedule', '$time', '$typ')"; 
      echo $sql;

    $conn=mysqli_connect("localhost","root","","final") or die(mysqli_error());
    $res=mysqli_query($conn, $sql);

    if($res)
    {
      $_SESSION['add']="Location added successfully";
      header("location:".'http://localhost/ju_transport_system/'.'location2.php');
    }

}


?>
<table class="tbl-full">
         <tr>

         <th>Serial No</th>
         <th>Schedule</th>
         <th>Time</th>
         <th>Category</th>
         <th>Actions</th>
         </tr>
         <?php
        $conn=mysqli_connect("localhost","root","","final");
        $sql="select id,schedule,time,typ from `dhaka to campus` ";
        $res=mysqli_query($conn,$sql);
        $sn=1;
        if($res==true)
        {
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                while($rows=mysqli_fetch_assoc($res))
                {
                    $schedule=$rows['schedule'];
                    $time=$rows['time'];  
                    $typ=$rows['typ'];
                    $id=$rows['id'];
                    ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $schedule; ?></td>
                        <td><?php echo $time; ?></td>
                        <td><?php echo $typ; ?></td>
                        <td>
                            <a href="<?php echo 'http://localhost/ju_transport_system/'?>updateL2.php?id=<?php echo $id?>" class="btn-primary">Update</a>
                            <a href="<?php echo 'http://localhost/ju_transport_system/'?>deleteL2.php?id=<?php echo $id?>" class="btn-secondary">Delete</a> 
                        </td>
                    </tr>
                     <?php
                }
            }
        }
?>

</div>
    </div>