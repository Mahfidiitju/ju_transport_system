<?php include('menu.php'); ?>
<div class="main">
    <div class="box">
     <h2>ADMINS</h2>
     <br><br><br>
     <a href="add_admin.php" class="btn-primary">Add Admin</a>
     <br><br>
    
    
     <br><br><br>
     <table class="tbl-full">
         <tr>

         <th>ID</th>
         <th>UserName</th>
         <th>Phone Num</th>
         <th>Actions</th>
         </tr>


         
     <?php
        $conn=mysqli_connect("localhost","root","","final");
        $sql="select id,username,phone from admin";
        $res=mysqli_query($conn,$sql);
        if($res==true)
        {
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                while($rows=mysqli_fetch_assoc($res))
                {
                    $id=$rows['id'];
                    $username=$rows['username'];  
                    $phone=$rows['phone'];
                    
                    ?>

                    <tr>
                        <td>
                            <?php echo $id; ?>
                        </td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td>
                        <a href="<?php echo 'http://localhost/ju_transport_system/'?>update_admin.php?id=<?php echo $id?>" class="btn-primary">Update Admin</a>
                        <a href="<?php echo 'http://localhost/ju_transport_system/'?>delete_admin.php?id=<?php echo $id?>" class="btn-secondary">Delete Admin</a> 
                        </td>
                    </tr>
                     <?php
                }
            }
        }
?>




     </table>



    </div>
    </div>

</body>
</html>