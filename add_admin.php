<?php include('menu.php'); ?>
<div class="main">
    <div class="box">
<h1>Add Admin</h1>
<br><br>
<form action="" method="POST">
<table>
    <tr>
        <td>Id</td>
        <td><input type="number" name="id" placeholder="enter your id"  required></td>
    </tr>

<tr>
    <td>Username:</td>
    <td>
        <input type="text" name="username" placeholder="enter your username"  required >
    </td>
    </tr>
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
        <input type="submit" class="btn-primary" name="submit" value="Add Admin">
    </td>
</tr>
</table>
</form>

</div>
</div>

<?php
if(isset($_POST['submit']))
{
      $id=$_POST['id'];
      $phone=$_POST['phone'];
      $username=$_POST['username'];
      $password=$_POST['password'];

      $sql="INSERT INTO admin values ('$id','$username','$phone','$password')"; 

    $conn=mysqli_connect("localhost","root","","final") or die(mysqli_error());
    $res=mysqli_query($conn, $sql);

    if($res)
    {
    
      header("location:".'http://localhost/ju_transport_system/'.'admin.php');
    }
    //else echo "not";

}

?>