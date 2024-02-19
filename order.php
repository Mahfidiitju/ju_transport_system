<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order</title>
    <link rel="stylesheet" href="order.css">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
</head>

<body>

<div class="container" id="form">
        <div class="max-width">
            <form action="" method="POST" enctype="multipart/form-data">
            <fieldset class="part">
                <legend>Selected Items</legend>

                        <?php
                                if(isset($_GET['product_id']))
                                {
                                    $conn=mysqli_connect("localhost","root","","project") or die(mysqli_error());
                                    $product_id=$_GET['product_id'];
                                    $sql="SELECT * FROM category where id=$product_id";
                                    $res=mysqli_query($conn,$sql);
                                    $count=mysqli_num_rows($res);
                                    if($count==1)
                                    {
                                        $row=mysqli_fetch_assoc($res);
                                        $title=$row['title'];
                                        $price=$row['price'];
                                        ?>
                                        <h3><?php echo $title;?></h3>
                                        <input type="hidden" name="product" value="<?php echo $title;?>">
                                        <h3><span class="taka">$</span><?php echo $price;?></h3>
                                        <input type="hidden" name=price value="<?php echo $price;?>">
                                        <?php
                                      
                                    }
                                }


                        ?>

                <h3>Quantity <br>
                  <input placeholder=" " type="number" name="qty" value="1" required>
                </h3>
            </fieldset>
            <br>
            <fieldset class="part">
                <legend>Order Details</legend>
                <h3>Full Name    <br>
                    <input name="full_name" placeholder="Enter your name"type="text">
                </h3>
                <h3>Phone Number <br>
                     <input name="contact" placeholder="Enter your phone number"type="tel">
                </h3>
                <h3>Email     <br>
                     <input name="email" placeholder="Enter your email" type="email">
                </h3>
                <h3>
                    Address <br>
                    <textarea name="address" id="address"rows="10" placeholder="Enter your Address" required></textarea>
                </h3>
                <input type="submit" name="submit" value="Confirm Order" class="button">
               
            </fieldset>
            </form>
        </div>
    </div>
</body>