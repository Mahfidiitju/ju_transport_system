<?php include('menu.php'); ?>
<div class="main">
    <div class="box">

        <h1>Update Admin</h1> <br><br><br>
       <?php $id =$_GET['id'];?>

        <form action="" method="POST">
        <table>


            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" placeholder="enter your username"  required >
                </td>
                </tr>
                <tr>
                <tr>
                <td>Phone Number:</td>
                <td>
                    <input type="text" name="phone" placeholder="enter your phone number"  required >
                </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="give password" required>
                    </td>
                </tr>
            <tr>
                
                <td colspan="2">
                    <input type="submit" class="btn-primary" name="submit" value="Update">
                </td>
            </tr>
        </table>
        </form>
        </div>
    </div>

<?php
    if(isset($_POST['submit'])){

        $username=$_POST['username'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $conn=mysqli_connect("localhost","root","","final");
            $sql = "UPDATE admin SET
            userName = '$username',
            phone = '$phone',
            password='$password'

            WHERE id='$id'
            ";


            $res = mysqli_query($conn,$sql);

            if($res==true){
                $_SESSION['update'] = 'Updated Successfully';
                header('location:'.'http://localhost/ju_transport_system/'.'admin.php');
                          }
        else{
            $_SESSION['update'] = 'Failed to update Admin';
            header('location:'.'http://localhost/ju_transport_system/'.'admin.php');
        }
            }
?>
