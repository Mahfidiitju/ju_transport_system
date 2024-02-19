<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Routine</title>
    <link rel="stylesheet" href="Routine_input.css">
</head>

<body>
   
<div class="container" id="form">
    <div class="max-width">
        <form action="" method="POST" enctype="multipart/form-data">
        <fieldset class="part">
            <legend>Add Routine</legend>
            <h3>Course Id</h3>
          

            
            <select id="course_id" name="course_id" class="course_id" >
                <option value="ict-3204">ict-3204</option>
                <option value="ict-3201">ict-3201</option>
                <option value="ict-3202">ict-3202</option>
                <option value="ict-3203">ict-3203</option>
                <option value="ict-3205">ict-3205</option>

                <option value="ict-3207">ict-3207</option>
                <option value="ict-3209">ict-3209</option>
                <option value="ict-2101">ict-2101</option>
                <option value="ict-2103">ict-2103</option>
                <option value="ict-2105">ict-2105</option>

                <option value="ict-2106">ict-2106</option>
                <option value="ict-2107">ict-2107</option>
                <option value="ict-2109">ict-2109</option>
                <option value="ict-1201">ict-1201</option>
                <option value="ict-1104">ict-1104</option>
                <option value="ict-1104">ict-1106</option>
            </select>



            <h3>Teacher name</h3>
            <select name="teacher" class="teacher" id="teacher" >
                <option value="RTH">RTH</option>
                <option value="MAY">MAY</option>
                <option value="SAM">SAM</option>
                <option value="MSK">MSK</option>
                <option value="FKP">FKP</option>
                <option value="JA">JA</option>
                <option value="KMA">KMA</option>
                <option value="FT">FT</option>
                <option value="MSR">MSR</option>
                <option value="RM">RM</option>
                <option value="MA">MA</option>
                <option value="MBH">MBH</option>
                <option value="MR">MR</option>
                <option value="AA">AA</option>
            </select>

            

            

            <h3>Enter Day</h3>

            <select id="day" name="day" class="day" >
                <option value="Sunday">Sunday</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
            </select>
            <h3>Enter Time</h3>
            <select id="time" name="time" class="time" >
                <option value="8:30-10:00">8:30-10:00</option>
                <option value="10:00-11:30">10:00-11:30</option>
                <option value="11:30-1:00">11:30-1:00</option>
                <option value="2:00-3:30">2:00-3:30</option>
                <option value="3:30-5:00">3:30-5:00</option>
            </select>
            <?php
            if(isset($_POST['time']))
            {
                $day=$_POST['day'];
                $time=$_POST['time'];
                echo $day;
                echo $time;
            }
            ?>



            <h3>Enter Class Room</h3>
            <select  id="room_id" name="room" class="room">
                <option value="Lab1">Lab1</option>
                <option value="Lab2">Lab2</option>
                <option value="Lab3">Lab3</option>
                <option value="Lab4">Lab4</option>
                <option value="LabD">LabD</option>
            </select>


            <br><br>
            <input type="submit" class="btn-primary" name="submit" value="Add Routine"id='button'>

            <input type="submit" class="btn-primary" name="update" value="Update Routine"id='button'>


            <br> <br><br>
            
            <input type="submit" class="btn-primary" name="delete" value="Delete Routine  by Course_id" id='button'>
            <select  name="course" class="course">
                <option value="ict-3204">ict-3204</option>
                <option value="ict-3201">ict-3201</option>
                <option value="ict-3202">ict-3202</option>
                <option value="ict-3203">ict-3203</option>
                <option value="ict-3205">ict-3205</option>

                <option value="ict-3207">ict-3207</option>
                <option value="ict-3209">ict-3209</option>
                <option value="ict-2101">ict-2101</option>
                <option value="ict-2103">ict-2103</option>
                <option value="ict-2105">ict-2105</option>

                <option value="ict-2106">ict-2106</option>
                <option value="ict-2107">ict-2107</option>
                <option value="ict-2109">ict-2109</option>
                <option value="ict-1201">ict-1201</option>
                <option value="ict-1104">ict-1104</option>
                <option value="ict-1104">ict-1106</option>
            </select>
           
        </fieldset>
        </form>
    </div>


</div>
</body>

</html>



<?php
if(isset($_POST['submit']))
{
      $day=$_POST['day'];
      $time=$_POST['time'];
      $teacher=$_POST['teacher'];
      $room=$_POST['room'];
      $course_id=$_POST['course_id'];
      
      $conn=mysqli_connect("localhost","root","","ourproje_e_learning") or die(mysqli_error());

      $sql1=" SELECT  `teacher`,`room`, `course_id` FROM `routine` WHERE day='$day' and time='$time' ";
      $res1=mysqli_query($conn, $sql1);
      if($res1==true)
        {
            $count=mysqli_num_rows($res1);
            $n=0;
            if($count>0)
            {
                while($rows=mysqli_fetch_assoc($res1))
                {
                    $tutor[$n]=$rows['teacher'];
                    $r[$n]=$rows['room'];  
                    $c_id[$n]=$rows['course_id'];
                    $n++;
                }
            }
            
        }



        $f=0;
        for($i=0;$i<$n;$i++)
        {
            if($tutor[$i]==$teacher)
            {
                $f=1;
                echo "Teacher name is already taken ";       
            }
            if($r[$i]==$room)
            {
                $f=1;
                echo "This Room is already taken ";
               
            }
            if($c_id[$i]==$course_id)
            {
                $f=1;
                echo "Duplicate course id";
               
            }
        }
        if($f==0)
        {
            $sql2="INSERT INTO `routine` (`day`, `time`,`teacher`, `room`, `course_id`) VALUES ('$day', '$time','$teacher', '$room', '$course_id')"; 
            $res2=mysqli_query($conn, $sql2);
        }
 

}
else if(isset($_POST['update']))
{
      $day=$_POST['day'];
      $time=$_POST['time'];
      $teacher=$_POST['teacher'];
      $room=$_POST['room'];
      $course_id=$_POST['course_id'];


      $sql="UPDATE `routine` SET `day`='$day',`time`='$time',`teacher`='$teacher',`room`='$room',`course_id`='$course_id' WHERE course_id='$course_id' "; 

    $conn=mysqli_connect("localhost","root","","ourproje_e_learning") or die(mysqli_error());
    $res=mysqli_query($conn, $sql);

 

}

else if(isset($_POST['delete']))
{
    
      $course=$_POST['course'];


      $sql="DELETE FROM `routine` WHERE course_id='$course' "; 

    $conn=mysqli_connect("localhost","root","","ourproje_e_learning") or die(mysqli_error());
    $res=mysqli_query($conn, $sql);

 

}


?>




<!-- <script>
                var day = document.getElementById("day");
                var time= document.getElementById("time");
                function Func() {
                    var dayTime=day.value+time.value;
                    console.log(dayTime);
                    }

            </script> -->
