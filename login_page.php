<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/loginPage.css">
</head>

<body>
    <div class="hero">
        <div class="form_box">
            <div class="button_box">
                <div id="btn"></div>
                <button type="button" class="toggle_btn"onclick="signup()">Sign Up</button>
                <button type="button" class="toggle_btn"onclick="signin()">Sign In</button>
            </div>
          
            <div class="icon">
                <img src="image/pic.png" alt="">
                <img src="image/pic2.png" alt="">
                <img src="image/pic3.png" alt="">
            </div>
            <form id="signup" class="input_group" method="POST">
                <input type="text" class="input_field" name="id" placeholder="User Id"required>
                <input type="text" class="input_field" name="username" placeholder="User Name">
                <input type="text" class="input_field" name="phone" placeholder="Phone">
                <input type="password" class="input_field" name="password" placeholder="Enter password" required>
                <!-- <input type="text" class="input_field" name="typ" placeholder="Enter category" required> -->
                <p>Enter Category</p>
            
            <select name="typ" class="value">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
                <button type="submit" class="submit_btn" name="submit1">Sign Up</button>
            </form>
            <form id="signin" class="input_group" method="POST">
                <input type="text" class="input_field" name="username" placeholder="User Name"required>
                <input type="password" class="input_field" name="password" placeholder="Enter password" required>
                <!-- <input type="text" class="input_field" name="typ" placeholder="Enter category" required> -->

             <p>Enter Category</p>
            
                <select name="typ" class="value">
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
            


                <button type="submit"class="submit_btn" name="submit2">Sign In</button>
                <br><br><br><br>
            </form>
        </div>
    </div>

    <?php
if(isset($_POST['submit1']))
{
      $id=$_POST['id'];
      $username=$_POST['username'];
      $phone=$_POST['phone'];
      $typ=$_POST['typ'];
      $password=$_POST['password'];

      $sql="INSERT INTO `sign_up` (`id`, `username`,`phone`, `typ`, `password`) VALUES ('$id', '$username','$phone', '$typ', '$password')"; 

    $conn=mysqli_connect("localhost","root","","final") or die(mysqli_error());
    $res=mysqli_query($conn, $sql);

    if($res)
    {
      $_SESSION['add']="Sign up successfully";
      header("location:".'http://localhost/ju_transport_system/'.'login_page.php');
    }
    //else echo "not";

}


?>

<?php
if(isset($_POST['submit2']))
 {
      $username=$_POST['username'];
 
      $password =$_POST['password'];
      $typ=$_POST['typ'];

      $conn=mysqli_connect("localhost","root","","final");

     $sql="SELECT * FROM sign_up WHERE username='$username' AND password='$password' AND typ='$typ' ";

     $res=mysqli_query($conn,$sql);
     $count=mysqli_num_rows($res);
     if($typ=='student' && $count==1)
     {

            header("location:".'http://localhost/ju_transport_system/'.'student.php');
     }
     else if($typ=='teacher' && $count==1){

        header("location:".'http://localhost/ju_transport_system/'.'teacher_page.php');
     }
     else{
         echo "Login failed. Try again.";
     }
 }
?>


    <script src="javascript/script.js"></script>


</body>

</html>