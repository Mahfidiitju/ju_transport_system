<?php
      $conn=mysqli_connect("localhost","root","","final");
    $id =$_GET['id'];

    $sql = "DELETE FROM sign_up WHERE id=$id";

    $res = mysqli_query($conn,$sql);

    

?>