<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Routine_output.css">
    
</head>
<body>
    <div class="main">
        <section class="header">
            <h2>Welcome to CRMS!</h2>  
                <h2>Class Routine at a glance </h2>
        </section>
        
        <section class="container">
            <article class="ar article article-1">
                <h3>DAY/TIME</h3>
            </article>
            <article class="ar article article-2">
                <h3>8:30-10:00</h3>
            </article>
            <article class="ar article article-3">
                <h3>10:00-11:30</h3>
            </article>
            <article class="ar article article-4">
                <h3>11:30-1:00</h3>
            </article>
            <article class="ar article article-5">
                <h3>1:00-2:00</h3>
            </article>
            <article class="ar article article-6">
                <h3>2:00-3:30</h3>
            </article>
            <article class="ar article article-7">
                <h3>3:30-5:00</h3>
            </article>
            <article class="ar article article-8">
                <h3>SUN</h3>
            </article>
            <article class="article article-9" id="Sunday8:30-10:00">
                <h3>time-9</h3>
            </article>
            <article class="article article-10"id="Sunday10:00-11:30">
                <h3>time-10</h3>
            </article>
            <article class="article article-11" id="Sunday11:30-1:00">
                <h3>time-11</h3>
            </article>
            <article class=" article-12">
                <h3>Lunch Break</h3>
            </article>
            <article class="article article-13" id="Sunday2:00-3:30">
                <h3>time-13</h3>
            </article>
            <article class="article article-14" id="Sunday3:30-5:00">
                <h3>time-14</h3>
            </article>
            <article class="ar article article-15">
                <h3>MON</h3>
            </article>
            <article class="article article-16" id="Monday8:30-10:00">
                <h3>time-16</h3>
            </article>
            <article class="article article-17" id="Monday10:00-11:30">
                <h3>time-17</h3>
            </article>
            <article class="article article-18" id="Monday11:30-1:00">
                <h3>time-18</h3>
            </article>
            <article class="article article-19" id="Monday2:00-3:30">
                <h3>time-19</h3>
            </article>
            <article class="article article-20" id="Monday3:30-5:00">
                <h3>time-20</h3>
            </article>
            <article class="ar article article-21" >
                <h3>TUES</h3>
            </article>
            <article class="article article-22" id="Tuesday8:30-10:00">
                <h3>time-22</h3>
            </article>
            <article class="article article-23" id="Tuesday10:00-11:30">
                <h3>time-23</h3>
            </article>
            <article class="article article-24" id="Tuesday11:30-1:00">
                <h3>time-24</h3>
            </article>
            <article class="article article-25" id="Tuesday2:00-3:30">
                <h3>time-25</h3>
            </article>
            <article class="article article-26" id="Tuesday3:30-5:00">
                <h3>time-26</h3>
            </article>
            <article class="ar article article-27">
                <h3>WED</h3>
            </article>
            <article class="article article-28" id="Wednesday8:30-10:00">
                <h3>time-28</h3>
            </article>
            <article class="article article-29" id="Wednesday10:00-11:30">
                <h3>time-29</h3>
            </article>
            <article class="article article-30" id="Wednesday11:30-1:00">
                <h3>time-30</h3>
            </article>
            <article class="article article-31" id="Wednesday2:00-3:30">
                <h3>time-31</h3>
            </article>
            <article class="article article-32" id="Wednesday3:30-5:00">
                <h3>time-32</h3>
            </article>
            <article class="ar article article-33">
                <h3>THURS</h3>
            </article>
            <article class="article article-34" id="Thursday8:30-10:00">
                <h3>time-34</h3>
            </article>
            <article class="article article-35" id="Thursday10:00-11:30">
                <h3>time-35</h3>
            </article>
            <article class="article article-36" id="Thursday11:30-1:00">
                <h3>time-36</h3>
            </article>
            <article class="article article-37" id="Thursday2:00-3:30">
                <h3>time-37</h3>
            </article>
            <article class="article article-38" id="Thursday3:30-5:00">
                <h3>time-38</h3>
            </article> 
            
        </section>
    </div>
   
    <?php
        $conn=mysqli_connect("localhost","root","","ourproje_e_learning");
        $sql="SELECT * FROM `routine` ORDER By day,time ASC ";
        $res=mysqli_query($conn,$sql);
        if($res==true)
        {
            $count=mysqli_num_rows($res);
            $n=0;
            if($count>0)
            {
                while($rows=mysqli_fetch_assoc($res))
                {
                    $day[$n]=$rows['day'];
                    $time[$n]=$rows['time'];
                    $teacher[$n]=$rows['teacher'];
                    $room[$n]=$rows['room'];  
                    $course_id[$n]=$rows['course_id'];
                    $n++;
                }
            }
            
        }?>

        <?php
         $k=0;
          for($i=0;$i<$n;$i++){
            $a=1;
                for($j=$i+1;$j<$n;$j++)
                {
                    if($day[$i]==$day[$j] && $time[$i]==$time[$j])
                    {
                        $a++;
                    }
                    else break;
                   
                }
                $cnt[$i]=$a;
                $i=$j-1;
            }
           
            
            ?>
           



                    <?php 

                    
                    for($i=0;$i<$n;){          
                        
                        if($cnt[$i]==3)
                        {
                        ?>

                            <script>
                                    document.getElementById("<?php echo "$day[$i]$time[$i]" ?>").innerText=
                                    "<?php echo $teacher[$i]?>"+" "+"<?php echo $room[$i]?>"+ " " +"<?php echo $course_id[$i]?>"+"\n "
                                    +"<?php echo $teacher[$i+1]?>"+" "+"<?php echo $room[$i+1]?>"+ " " +"<?php echo $course_id[$i+1]?>"+"\n"
                                    +"<?php echo $teacher[$i+2]?>"+" "+"<?php echo $room[$i+2]?>"+ " " +"<?php echo $course_id[$i+2]?>"
    
                            </script>
                        <?php $i=$i+3; }
                        else if($cnt[$i]==2)
                        {
                            
                        ?>
                                    
                            <script>
                                  document.getElementById("<?php echo "$day[$i]$time[$i]" ?>").innerText=
                                    "<?php echo $teacher[$i]?>"+" "+"<?php echo $room[$i]?>"+ " " +"<?php echo $course_id[$i]?>"+"\n "
                                    +"<?php echo $teacher[$i+1]?>"+" "+"<?php echo $room[$i+1]?>"+ " " +"<?php echo $course_id[$i+1]?>"
    
                            </script>
                        <?php $i=$i+2; }

                        else if($cnt[$i]==1)
                        {
                        ?>

                            <script>
                                    document.getElementById("<?php echo "$day[$i]$time[$i]" ?>").innerText=
                                    "<?php echo $teacher[$i]?>"+" "+"<?php echo $room[$i]?>"+ " " +"<?php echo $course_id[$i]?>"+"\n "

                            </script>
                        <?php $i=$i+1; }

                        else if($cnt[$i]==4)
                        {
                        ?>

                            <script>
                                    document.getElementById("<?php echo "$day[$i]$time[$i]" ?>").innerText=
                                    "<?php echo $teacher[$i]?>"+" "+"<?php echo $room[$i]?>"+ " " +"<?php echo $course_id[$i]?>"+"\n "
                                    +"<?php echo $teacher[$i+1]?>"+" "+"<?php echo $room[$i+1]?>"+ " " +"<?php echo $course_id[$i+1]?>"+"\n"
                                    +"<?php echo $teacher[$i+2]?>"+" "+"<?php echo $room[$i+2]?>"+ " " +"<?php echo $course_id[$i+2]?>"+"\n"
                                    +"<?php echo $teacher[$i+3]?>"+" "+"<?php echo $room[$i+3]?>"+ " " +"<?php echo $course_id[$i+3]?>"
    
                            </script>
                        <?php $i=$i+4; }

                        
                        ?>
                        
                        
                    <?php }?>

  
    


</body>
</html>