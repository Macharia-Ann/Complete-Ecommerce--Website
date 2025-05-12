<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
include 'connect.php';
include 'functions/functions.php';
session_start();

?>
    <!---------Header/nav bar----------->
  <div class="header">
    <nav>
<ul>
    <li><img src="images/cart1.png"></li>
    <li><a href='homepage.php'>Home</a></li>

    <!-- interchange register and my account if user is logged in -->
    <?php
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    echo "<li><a href='user_area/profile.php'>My Account</a></li>";
}
else{
echo "<li><a href='user_area/register.php'>Register</a></li>";
}

?>
    <li><a href='contact.php.php'>Contact</a></li>
    <li><a href='cart.php'><img src="images/cart4.png"></a></li><sup style="margin-right:30px;"><?php echo countCartItems(); ?></sup>
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
    echo "<h3>Welcome Guest</h3><p><a href='user_area/login.php'>Login</a></p>";
}
else{
    $username=$_SESSION['username'];
    // $select_users="select * from `users` where user_name='$username'";
    // $result_users=mysqli_query($conn,$select_users);
    // $row_users=mysqli_fetch_assoc($result_users);
    // $username=$row_users['user_name'];
    echo "<h3>Welcome ".$_SESSION['username']."</h3><p><a href='user_area/logout.php'>Logout</a></p>";
}

?>
   </div>

   <!-------display products---->
   <div class="productsandsidebar"   style='margin-right:5%;'>
   <div class='products_wrap'>
    <h2>Hidden Store</h2>
    <p style='text-align: center; font-size: 18px; margin-top: 5px; margin-bottom: 10px;'>Communication is at the heart of ecommerce community</p>

    <div class='products'>

    <?php
#the get all products function

getAllProducts();

insertIntoCart();


?>
</div>
</div>

<!----sidebar------>
<div class="sidebar">
    <h3>Delivery Brands</h3>
    <?php
$select="select * from `brands`";
$result=mysqli_query($conn,$select);
while($row=mysqli_fetch_assoc($result)){
$brand_id=$row['brand_id'];
$brand_title=$row['brand_title'];
echo " <p><a href='user_area/specific_brand.php?brand_id=$brand_id' style='text-decoration:none; color: #fff;'>$brand_title</a></p>";
}
?>
   
    <h3>Categories</h3>
    <?php
$select_cat="select * from `categories`";
$result_cat=mysqli_query($conn,$select_cat);
while($row_cat=mysqli_fetch_assoc($result_cat)){
    $cat_id=$row_cat['category_id'];
    $cat_title=$row_cat['category_title'];
    echo "<p><a href='user_area/specific_category.php?cat_id=$cat_id' style='text-decoration:none; color: #fff;'>$cat_title</a></p>";
}

?>
    
   
</div>
</div>
<!------footer------->
<div class="footer">
    <p>designed by sherry with <span style='color:white;'>❤</span> &copy; copyright</p>
</div>

</body>
</html>