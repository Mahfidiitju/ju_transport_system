<?php
      $conn=mysqli_connect("localhost","root","","final");
    $id =$_GET['id'];

    $sql = "DELETE FROM `admin` WHERE id=$id";

    $res = mysqli_query($conn,$sql);

    if($res==true){
            $_SESSION['delete'] = 'Admin Deleted Successfully';
            header('location:'.'http://localhost/ju_transport_system/'.'admin.php');
    }
    else{
        $_SESSION['delete'] = 'Failed to delete Admin';
        header('location:'.'http://localhost/ju_transport_system/'.'admin.php');
    }

?>