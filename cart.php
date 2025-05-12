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

?>    <li><a href='contact.php.php'>Contact</a></li>
    
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
    <?php
if(!isset($_SESSION['username'])){
    echo "<h3>Welcome Guest</h3><p><a href='user_area/login.php'>Login</a></p>";
}
else{
    $username=$_SESSION['username'];
    echo "<h3>Welcome ".$_SESSION['username']."</h3><p><a href='user_area/logout.php'>Logout</a></p>";
}

?>
   </div>

   <!-------display products---->
   <div class='products_wrap'>
    <h2>Hidden Store</h2>
    <p style='text-align: center; font-size: 18px; margin-top: 5px; margin-bottom: 10px;'>Communication is at the heart of ecommerce community</p>
    <div class='products'>

    <?php
#the get all products function
insertIntoCart();
?>
<form method="post" action="">
<table>
   
            
            <tbody>
                <?php

   $total_price=0;
    $ip=getIPAddress();
    $select="select * from `cart` where ip_address='$ip'";
    $result=mysqli_query($conn,$select);
    $num=mysqli_num_rows($result);
    if($num>0){
echo "<thead>
            <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th>Operations</th>
    
            </tr>
        </thead>";

        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_price="select * from `products` where product_id=$product_id";
            $res=mysqli_query($conn,$select_price);
            while($row_price=mysqli_fetch_array($res)){
                $product_price=array($row_price['product_price']);
                $title=$row_price['product_title'];
                $image=$row_price['product_image1'];
                $specific_price=$row_price['product_price'];
                $price_sum=array_sum($product_price);
                $total_price += $price_sum;
           
   
 ?>
         
<tr>
     <td><?php echo $title ?></td>
                <td><img src='./images/<?php echo $image ?>' alt=''></td>
                <td><input type='text' name='quantity'></td>
                <?php
                $ip=getIPAddress();
if(isset($_POST['update'])){
    $ip=getIPAddress();
   $qty=$_POST['quantity'];
   $update="update `cart` set quantity=$qty where ip_address='$ip'";
   $result_qty=mysqli_query($conn,$update);
   $total_price= $specific_price * $qty;

}

                ?>
                <td>Price: <?php echo $specific_price ?></td>
                <td><input type='checkbox' name='remove_item[]' value='<?php echo $product_id ?>'></td>
                <td><button name='update' type='submit'>Update</button><button style='background: #333;' name='remove'>Remove</button></td>
            </tr>
        <?php
        }
        }
    }
    else{
        echo "<h1 style='text-align:center; color:red;'>Cart is empty</h1>";
    }
    ?>
        </tbody>
       
        </table>
        </form>

        <!-- function to remove an item from cart -->
        <?php

function removeItemCart(){
 global $conn;
 if(isset($_POST['remove'])){
    foreach($_POST['remove_item'] as $remove_id){
        // echo $remove_id;
        $delete="delete from `cart` where product_id=$remove_id";
        $res_delete=mysqli_query($conn,$delete);
        if($res_delete){
            echo "<script>alert('item removed from cart')</script";
        }
    }

 }           
}
removeItemCart();
?>

        <div class="total">
          <?php
  $ip=getIPAddress();
  $select="select * from `cart` where ip_address='$ip'";
  $result=mysqli_query($conn,$select);
  $num=mysqli_num_rows($result);
  if($num>0){
echo "<h3>Subtotal: <span>$total_price/=</span></h3>
<button><a href='homepage.php' style='text-decoration: none;'>Continue Shopping</a></button><a href='user_area/checkout.php'><button class='checkout'>Checkout</button></a>";
  }
 
    ?>

           
        </div>
</div>
</div>


    
   
</div>
</div>


        <!------footer------->
<div class="footer">
    <p>designed by sherry with <span style='color:white;'>❤</span> &copy; copyright</p>
</div>
</body>
</html>