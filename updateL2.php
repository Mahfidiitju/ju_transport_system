<?php include('menu.php'); ?>
<div class="main">
    <div class="box">

        <h1>Update Schedule Dhaka to campus</h1> <br><br><br>
       <?php $id =$_GET['id'];?>

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
                    <input type="submit" class="btn-primary" name="submit" value="Update Schedule">
                </td>
            </tr>
        </table>
        </form>
        </div>
    </div>

<?php
    if(isset($_POST['submit'])){

        $schedule=$_POST['schedule'];
        $time=$_POST['time'];
        $typ=$_POST['typ'];
        $conn=mysqli_connect("localhost","root","","final");
            $sql = "UPDATE `dhaka to campus` SET
            schedule = '$schedule',
            time = '$time',
            typ='$typ'

            WHERE id='$id'
            ";


            $res = mysqli_query($conn,$sql);

            if($res==true){
                $_SESSION['update'] = 'Updated Successfully';
                header('location:'.'http://localhost/ju_transport_system/'.'location2.php');
                          }
        else{
            $_SESSION['update'] = 'Failed to update ';
            header('location:'.'http://localhost/ju_transport_system/'.'location2.php');
        }
            }
?>
