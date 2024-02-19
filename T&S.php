<?php include('menu.php'); ?>
 <div class="main">
    <div class="box">
     <h2>Teacher & Student List</h2>
     <br><br><br>

     <table class="tbl-full">
         <tr>

         <th>ID</th>
         <th>UserName</th>
         <th>Phone Number</th>
         <th>Type</th>
         <th>Actions</th>
         </tr>


         
     <?php
        $conn=mysqli_connect("localhost","root","","final");
        $sql="select id,username,phone,typ from sign_up";
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
                    $typ=$rows['typ'];
                    ?>

                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $phone;?></td>
                        <td><?php echo $typ;?></td>
                        <td>
                            <a href="<?php echo 'http://localhost/ju_transport_system/'?>updateS&T.php?id=<?php echo $id?>" class="btn-primary">Update</a>
                            <a href="<?php echo 'http://localhost/ju_transport_system/'?>deleteS&T.php?id=<?php echo $id?>" class="btn-secondary">Delete</a> 
                        </td>
                     
                    </tr>
                     <?php
                }
            }
        }
?>




     </table>
<br><br>
    <form action="" method="POST">
    <input type="submit" name ="send_msg" value="Send Message (Teacher)" class="btn-primary">
    </form>
    

    </div>
</div>
     <?php

    if(isset($_POST['send_msg']))
    {
        $n=0;
        $p=0;

         $conn=mysqli_connect("localhost","root","","final");

        $sql="SELECT * FROM `campus to dhaka` WHERE `typ`='teacher' ";
            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            
            if($count>0)
                {
                while($row=mysqli_fetch_assoc($res))
                {
                    $schedule[$n]=$row['schedule'];
                    $time[$n]=$row['time'];
                    $n++; 
                        
                }
            }

        $sql="SELECT * FROM `dhaka to campus` WHERE `typ`='teacher' ";
            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $schedule[$n]=$row['schedule'];
                    $time[$n]=$row['time'];
                    $n++; 
                    
                }
            }
            $string="Schedule: ";
            for($i=0;$i<$n;$i++)
            {
                $string.=$schedule[$i].' '.$time[$i].'  |  ';
            }


            $sql="SELECT phone FROM `sign_up` WHERE `typ`='teacher' ";
            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $phn[$p]=$row['phone'];   
                    $p++;                
                }
            }
            
            for($j=0;$j<$p;$j++)
            {
                $messege = $string;
                $mobile = $phn[$j];

                $apikey = '$2y$10$In6lKPuI3xQa31/svT/Z3eRgmzcNZvCqdAuiOu.CjdfBMO5O5H05i';
                $sendto = '88'.$mobile;
                $msg = urlencode($messege);
                
                $url='http://smsp1.durjoysoft.com/smsapi/non-masking?api_key='.$apikey.'&smsType=text&mobileNo='.$sendto.'&smsContent='.$msg.'';
                
                if ( !empty($mobile)  && !empty($apikey)) {
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                                CURLOPT_RETURNTRANSFER => 1,
                                CURLOPT_URL =>$url,
                                CURLOPT_USERAGENT =>'My Browser'
                            ));
                            $resp = curl_exec($curl);
                            curl_close($curl);
                }
             }
            
            
     }
?>


