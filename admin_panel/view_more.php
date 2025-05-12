<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php
include '../connect.php';
include '../functions/functions.php';
@session_start();


?>
    <!---------Header/nav bar----------->
  <div class="header">
    <nav>
<ul>
    <li><img src="../images/cart1.png"></li>
    <li><a href='../homepage.php'>Home</a></li>
    <li><a href='../user_area/register.php'>Register</a></li>
    <li><a href='../contact.php.php'>Contact</a></li>
    <li><a href=''><img src="../images/cart4.png"></a></li>
    <li>Total Price:  <?php echo  getTotalPrice(); ?>/=</li>
</ul>        
    </nav>
    <form method="get" action="../admin_panel/searchdata.php">
    <div class="search_bar">
        <input type="text" placeholder="search" name="searchdata"><button name="searchbtn">Search</button>
</form>
    </div>
  </div>  

     <!---------login ----------->
     <div class="welcome_part">

<!-- interchange login and logout -->
 <?php

if(!isset($_SESSION['username'])){
 echo "<h3>Welcome Guest</h3><p><a href='../user_area/login.php'>Login</a></p>";
}
else{
 $username=$_SESSION['username'];
 // $select_users="select * from `users` where user_name='$username'";
 // $result_users=mysqli_query($conn,$select_users);
 // $row_users=mysqli_fetch_assoc($result_users);
 // $username=$row_users['user_name'];
 echo "<h3>Welcome ".$_SESSION['username']."</h3><p><a href='../user_area/logout.php'>Logout</a></p>";
}

?>
</div>

   <!-------display products---->
   <div class="productsandsidebar"   style='margin-right:5%;'>
   <div class='products_wrap'>
    <h2>Hidden Store</h2>
    <p style='text-align: center; font-size: 18px; margin-top: 5px; margin-bottom: 10px;'>Communication is at the heart of ecommerce community</p>
    <h3 class="related-products-header" style='text-align:center; color:rgb(0, 195, 255);margin:20px;font-size:27px;'>Related products</h3>
    
    <div class='products'>
        <?php
 if(isset($_GET['product_id'])){
    $product_id=$_GET['product_id'];
    $select_more="select * from `products` where product_id=$product_id";
    $result=mysqli_query($conn,$select_more);
    $row=mysqli_fetch_assoc($result);
    $image2=$row['product_image2'];
    $image3=$row['product_image3'];
    $image1=$row['product_image1'];


    $title=$row['product_title'];
    $descript=$row['product_descript'];
    $price=$row['product_price'];
    echo "";
 }
 getEachBrand();
getEachCategory();
 
        ?>
        
        <div class="card">
<img src="../images/<?php echo $image1 ?>" alt="">
<h3><?php echo $title ?></h3>
<p><?php echo $descript ?></p>
<p>Price: <?php echo $price ?>/=</p>

<button><a href='../homepage.php?add-to-cart=<?php echo $product_id ?>'>Add to Cart</a></button><button class='view-more' name='view_more'><a href='../homepage.php'>Home</a></button>
        </div>

        <div class="card" style='padding-bottom: 15px;'>
            <img src="../images/<?php echo $image2 ?>" alt="">

            <button style='margin-left:30%;'><a href='../homepage.php?add-to-cart=<?php echo $product_id ?>'>Add to Cart</a></button>
            </div>

                    <div class="card">
                        <img src="../images/<?php echo $image3 ?>" alt="">
                    
                        <button style='margin-left:30%;'><a href='../homepage.php?add-to-cart=<?php echo $product_id ?>'>Add to Cart</a></button>
                        </div>
        </div>
        <?php
 
        ?>
</div>
   
</div>
</div>
<!------footer------->
<div class="footer">
    <p>designed by sherry with <span style='color:white;'>❤</span> &copy; copyright</p>
</div>

</body>
</html>