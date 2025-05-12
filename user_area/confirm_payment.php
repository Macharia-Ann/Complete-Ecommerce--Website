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


<?php
//display data on the input bars from the orders table
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_orders="select * from `orders` where order_id=$order_id";
$res_orders=mysqli_query($conn,$select_orders);
while($rows=mysqli_fetch_assoc($res_orders)){
  $total_amount=$rows['amount'];
  $invoice_no=$rows['invoice_number'];
  echo "";  
}
}

//confirm payment by submitting data into payment table

    if(isset($_POST['confirm_payment'])){
        $invoice_number=$_POST['invoice_number'];
        $amount=$_POST['amount'];
        $payment_mode=$_POST['payment_mode'];
        $insert="insert into `user_payments` (order_id, invoice_number, amount, payment_mode) values($order_id,$invoice_number,$amount,'$payment_mode')";
        $res_insert=mysqli_query($conn,$insert);
        if($res_insert){
            echo "<script>alert('payment completed successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";

 
        }

        //update orders table from pending to complete
        $update_orders="update `orders` set order_status='Paid' where order_id=$order_id";
        $result=mysqli_query($conn,$update_orders);
    }


    
?>
<form method="post" action="" class="product-form" style="background: black; color: white; margin-bottom: 30px;">
    <h3 style="font-size: 35px;">Confirm Payment</h3>
    <div class="insert-product">

        <div class="firstinput">
        <label for="">Invoice number:</label>

            <input type="text"  name="invoice_number" value="<?php echo $invoice_no ?>">
</div>

        <div class="firstinput">
            <label for="">Amount:</label>
            <input type="text"  name="amount" value="<?php echo $total_amount ?>">
        </div>

        <div class="firstinput">
            <select name="payment_mode">
            <option>--select payment mode--</option>.
            <option>Offline</option>
            <option>UPI</option>
            <option>Netbanking</option>
            <option>Paypal</option>
            <option>Cash on Delivery</option>
</select>

</div>
<button name="confirm_payment" style="margin-left: 37%;">Submit Payment</button>
</div>


</form>
<!------footer------->
<div class="footer">
    <p>designed by sherry with <span style='color:white;'>❤</span> &copy; copyright</p>
</div>
</body>
</html>