
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


   <!-------display products---->
   <div class='products_wrap'>
    <h2>Hidden Store</h2>
    <p style='text-align: center; font-size: 18px; margin-top: 5px; margin-bottom: 10px;'>Communication is at the heart of ecommerce community</p>
    
<?php


if(isset($_POST['login'])){
//    session_start();
   $ip=getIPAddress();
   $username=$_POST['username'];
   $pwd=$_POST['password'];
$select="select * from `users` where user_name='$username'";
$result=mysqli_query($conn,$select);

//check if user has items in the cart
$select_cart="select * from `cart` where ip_address='$ip'";
$result_cart=mysqli_query($conn,$select_cart);
$num_rows_cart=mysqli_num_rows($result_cart);

//fetch password from the database
$row=mysqli_fetch_assoc($result);

//check is username exists/valid
$num_rows=mysqli_num_rows($result);
if($num_rows>0){
    //activate session
    $_SESSION['username']=$username;

//verify password
if(password_verify($pwd,$row['user_password'])){

  //check if user has items in cart
  if($num_rows_cart>0){
    
    //activate session
    $_SESSION['username']=$username;
    echo "<script>alert('logged in successfully')</script>";
    echo "<script>window.open('payment.php', '_self')</script>"; 
  }
  else{
    //activate session
    $_SESSION['username']=$username;
    echo "<script>alert('logged in successfully')</script>";
    echo "<script>window.open('profile.php', '_self')</script>"; 
  } 
}
else{
    echo "<script>alert('invalid password')</script>";
  
}
}
else{
    echo "<script>alert('invalid username')</script>";

}
}





?>
<form method="post" action=""  class="product-form" style='margin-left:25%;'>
    <h3>User Login</h3>
    <div class="insert-product">

        <div class="firstinput">
            <label for="">Username</label>
            <input type="text" placeholder="Enter your username" name="username">
        </div>

        <div class="firstinput">
            <label for="">Password</label>
            <input type="password" placeholder="Enter your password" name="password">
        </div>
        <p style='margin-left: 30%; margin-bottom: 10px; font-size: 19px;'><a href="register.php">forgot password</a></p>

        <button name="login">Login</button>
        <p style='margin-left: 30%; margin-top: 10px; font-size: 19px;'>Don't have an account? <a href="register.php" style='color: red; text-decoration: none;'>Register</a></p>

</div>
</form>
</div>
</div>
   
<!------footer------->
<div class="footer">
    <p>designed by sherry with <span style='color:white;'>❤</span> &copy; copyright</p>
</div>