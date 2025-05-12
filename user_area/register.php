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
    <li><a href='cart.php'><img src="../images/cart4.png"></a></li><sup style="margin-right:30px;"><?php echo countCartItems(); ?></sup>
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
 

   <!-------display products---->
   <div class='products_wrap'>
    <h2>Hidden Store</h2>
    <p style='text-align: center; font-size: 18px; margin-top: 5px; margin-bottom: 10px;'>Communication is at the heart of ecommerce community</p>
    

<form method="post" action="" enctype="multipart/form-data" class="product-form" style='margin-left:25%;'>
    <?php
//insert data into users table
if(isset($_POST['register'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $image=$_FILES['user_image']['name'];
    $image_tmp=$_FILES['user_image']['tmp_name'];
move_uploaded_file($image_tmp,"../images/$image");
    $password=$_POST['password'];
    $hashedPassword=password_hash($password,PASSWORD_BCRYPT);

    $Cpassword=$_POST['Cpassword'];
    $address=$_POST['user_address'];
    $contact=$_POST['user_contact'];
    $ip=getIPAddress();

//check if user exists
$select="select * from `users` where user_name='$username'";
$result=mysqli_query($conn,$select);
$num=mysqli_num_rows($result);
if($num>0){
    echo "<script>alert('user with the same username already exists')</script>";
  
}
elseif($password != $Cpassword){
    echo "<script>alert('passwords do not match')</script>";
   
}

else{
    //insert data into the database
    $insert="insert into `users` (user_name, user_email, user_password, user_image, user_ip, user_address, user_mobile) values ('$username', '
    $email','$hashedPassword','$image','$ip','$address','$contact')";
    $result_insert=mysqli_query($conn,$insert);
    if($result_insert){
        echo "<script>alert('registration successfully')</script>";

    }

}

//check if the user has any items in cart
$select_cart="select * from `cart` where ip_address='$ip'";
$res=mysqli_query($conn,$select_cart);
$num_rows=mysqli_num_rows($res);
if($num_rows>0){
    echo "<script>alert('you have items in the cart')</script>";
  echo "<script>window.open('payment.php','_self')</script>";
}
else{
    echo "<script>window.open('../homepage.php', '_self')</script>";
}

}


?>
    <h3>User Registration</h3>
    <div class="insert-product">
        <div class="firstinput">
            <label for="">Username</label>
            <input type="text" placeholder="Enter your username" name="username">
        </div>

        <div class="firstinput">
            <label for="">Email</label>
            <input type="email" placeholder="Enter your email" name="email">
        </div>

        <div class="firstinput">
            <label for="">User Image</label>
            <input type="file"  name="user_image">
        </div>

        <div class="firstinput">
            <label for="">Password</label>
            <input type="password" placeholder="Enter your password" name="password">
        </div>

        <div class="firstinput">
            <label for="">Confirm password</label>
            <input type="password" placeholder="Confirm your password" name="Cpassword">
        </div>

        <div class="firstinput">
            <label for="">Address</label>
            <input type="text"  name="user_address" placeholder="Enter your address" >
        </div>

        <div class="firstinput">
            <label for="">Contact</label>
            <input type="text"  name="user_contact" placeholder="Enter your contact" >
        </div>
        <button name="register">Register</button>
        <p style='margin-left: 30%; margin-top: 10px; font-size: 19px;'>Have an account already? <a href="login.php" style='color: red; text-decoration: none;'>Login</a></p>
    </div>
</form>
</div>
<!------footer------->
<div class="footer">
    <p>designed by sherry with <span style='color:white;'>❤</span> &copy; copyright</p>
</div>