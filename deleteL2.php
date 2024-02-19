<?php
      $conn=mysqli_connect("localhost","root","","final");
    $id =$_GET['id'];

    $sql = "DELETE FROM `dhaka to campus` WHERE id=$id";

    $res = mysqli_query($conn,$sql);

    if($res==true){
            $_SESSION['delete'] = ' Deleted Successfully';
            header('location:'.'http://localhost/ju_transport_system/'.'location2.php');
    }
    else{
        $_SESSION['delete'] = 'Failed to delete ';
        header('location:'.'http://localhost/ju_transport_system/'.'location2.php');
    }

?>