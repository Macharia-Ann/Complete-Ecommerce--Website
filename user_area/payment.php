<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
  <!-- interchange register and my account if user is logged in -->
  <?php
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    echo "<li><a href='profile.php'>My Account</a></li>";
}
else{
echo "<li><a href='register.php'>Register</a></li>";
}

?>    <li><a href='contact.php.php'>Contact</a></li>
    <li><a href='../cart.php'><img src="../images/cart4.png"></a></li><sup style="margin-right:30px;"><?php echo countCartItems(); ?></sup>
    <li>Total Price:  <?php echo  getTotalPrice(); ?>/=</li>
</ul>        
    </nav>
    <form method="get" action="admin_panel/searchdata.php">
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
 echo "<h3>Welcome Guest</h3><p><a href='login.php'>Login</a></p>";
}
else{
 $username=$_SESSION['username'];
 $select_users="select * from `users` where user_name='$username'";
 $result_users=mysqli_query($conn,$select_users);
 $row_users=mysqli_fetch_assoc($result_users);
 $username=$row_users['user_name'];
 $user_id=$row_users['user_id'];
 echo "<h3>Welcome $username</h3><p><a href='logout.php'>Logout</a></p>";
}

?>
</div>

   <!-------display products---->
   <div class='products_wrap'>
    <h2>Hidden Store</h2>
    <p style='text-align: center; font-size: 18px; margin-top: 5px; margin-bottom: 10px;'>Communication is at the heart of ecommerce community</p>
    

    <div class="payment">
    <h1>Payment Options</h1>  
<div class="payment-options">
<a href=""><img src="../images/upi.jpg" alt=""></a>
    <h2><a href="orders.php?user_id=<?php echo $user_id ?>">Pay Offline</a></h2>
</div>

    </div>
</div>

    <!------footer------->
<div class="footer">
    <p>designed by sherry with <span style='color:white;'>❤</span> &copy; copyright</p>
</div>
</body>
</html>