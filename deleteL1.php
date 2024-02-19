<?php
      $conn=mysqli_connect("localhost","root","","final");
    $id =$_GET['id'];

    $sql = "DELETE FROM `campus to dhaka` WHERE id=$id";

    $res = mysqli_query($conn,$sql);

    if($res==true){
            $_SESSION['delete'] = ' Deleted Successfully';
            header('location:'.'http://localhost/ju_transport_system/'.'location1.php');
    }
    else{
        $_SESSION['delete'] = 'Failed to delete ';
        header('location:'.'http://localhost/ju_transport_system/'.'location1.php');
    }

?>