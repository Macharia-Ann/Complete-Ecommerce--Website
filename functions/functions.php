

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


/*----function to fetch and display all products----*/
function getAllProducts(){
    global $conn;
    if(!isset($_GET['brand_id'])){
        if(!isset($_GET['cat_id'])){
    
    $select_products='select * from `products`';
    $result_products=mysqli_query($conn,$select_products);
while($row_products=mysqli_fetch_assoc($result_products)){
    $product_id=$row_products['product_id'];
    $title=$row_products['product_title'];
    $descript=$row_products['product_descript'];
    $brand_id=$row_products['brand_id'];
    $image1=$row_products['product_image1'];
    $image2=$row_products['product_image2'];
    $image3=$row_products['product_image3'];
    $price=$row_products['product_price'];
    echo "<div class='card'>
            <img src='images/$image1'>
            <h3>$title</h3>
            <p>$descript</p>
            <p>$price/=</p>
    <button><a href='homepage.php?add-to-cart=$product_id'>Add to Cart</a></button><button class='view-more'><a href='admin_panel/view_more.php?product_id=$product_id'>View More</a></button>
        </div>";

}
}
 }
  }

//function to get specific brand and details
function getEachBrand(){
    global $conn;
    if(isset($_GET['brand_id'])){
        $brand_id=$_GET['brand_id'];
        $select="select * from `products` where brand_id=$brand_id";
        $result=mysqli_query($conn,$select);
        $num=mysqli_num_rows($result);
        if($num>0){
while($row_brand=mysqli_fetch_assoc($result)){
    $image1=$row_brand['product_image1'];
    $title=$row_brand['product_title'];
    $descript=$row_brand['product_descript'];
    $price=$row_brand['product_price'];
    $product_id=$row_brand['product_id'];

    echo "<div class='card' style='margin-right:10%;'>
    <img src='../images/$image1'>
    <h3>$title</h3>
    <p>$descript</p>
    <p>$price/=</p>
    <button><a href='../homepage.php?add-to-cart=$product_id'>Add to Cart</a></button><button class='view-more'><a href='../admin_panel/view_more.php?product_id=$product_id'>View More</a></button>
</div>";
}

}
else{
    echo "<h2 style='color:red';>This brand is empty</h2>";
}
}
}

//function to get details for specific catgories
function getEachCategory(){
    global $conn;
    if(isset($_GET['cat_id'])){
        $cat_id=$_GET['cat_id'];
        $select="select * from `products` where category_id=$cat_id";
        $result=mysqli_query($conn,$select);
        $num=mysqli_num_rows($result);
        if($num>0){
while($row_brand=mysqli_fetch_assoc($result)){
    $image1=$row_brand['product_image1'];
    $title=$row_brand['product_title'];
    $descript=$row_brand['product_descript'];
    $price=$row_brand['product_price'];
    $product_id=$row_brand['product_id'];
    echo "<div class='card' style='margin-right:10%;'>
    <img src='../images/$image1'>
    <h3>$title</h3>
    <p>$descript</p>
    <p>$price/=</p>
    <button><a href='../homepage.php?add-to-cart=$product_id'>Add to Cart</a></button><button class='view-more'><a href='../admin_panel/view_more.php?product_id=$product_id'>View More</a></button>
</div>";
}

}
else{
    echo "<h2 style='color:red';>This category is empty</h2>";
}
}
}

//function so search for specific data
function searchData(){
    global $conn;
    if(isset($_GET['searchbtn'])){
        $searchdata=$_GET['searchdata'];
        $select_search="select * from `products` where product_keywords like '%$searchdata%'";
        $res_search=mysqli_query($conn,$select_search);
        $num=mysqli_num_rows($res_search);
        if($num>0){
while($row_search=mysqli_fetch_assoc($res_search)){
    $product_id=$row_search['product_id'];
    $image1=$row_search['product_image1'];
    $title=$row_search['product_title'];
    $descript=$row_search['product_descript'];
    $price=$row_search['product_price'];
    echo "<div class='card' style='margin-right:10%;'>
    <img src='../images/$image1'>
    <h3>$title</h3>
    <p>$descript</p>
    <p>$price/=</p>
    <button><a href='homepage.php?add-to-cart=$product_id'>Add to Cart</a></button><button class='view-more'><a href='admin_panel/view_more.php?product_id=$product_id'>View More</a></button>
</div>";
}

}
else{
    echo "<h2 style='color:red';>no results found</h2>";
}
}
}


//Get ip address function in php
 
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

//Cart function-insert data into cart table
function insertIntoCart(){
    global $conn;
    $ip=getIPAddress();

    //check if the product exists in cart table
    if(isset($_GET['add-to-cart'])){
        echo "yes";
        $product_id=$_GET['add-to-cart'];
        $select_cart="select * from `cart` where product_id=$product_id and ip_address='$ip'";
        $res_cart=mysqli_query($conn,$select_cart);
        $num_cart=mysqli_num_rows($res_cart);
        if($num_cart>0){
            echo "<script>alert('This product exists in cart')</script>";
            echo "<script>window.open('homepage.php', '_self')</script>";

        }
else{
    //insert the product
    $insert="insert into `cart` (product_id,ip_address,quantity) values($product_id,'$ip',0)";
    $res_insert=mysqli_query($conn,$insert);
    if($res_insert){
        echo "<script>alert('product inserted to cart')</script>";
        echo "<script>window.open('homepage.php, _self')</script>";

   
    }
}
    }
}

//function to get the number of cart items
function countCartItems(){
global $conn;
$ip=getIPAddress();
$select_cart_items="select * from `cart` where ip_address='$ip'";
$res_cart_items=mysqli_query($conn,$select_cart_items);
$num_count_items=mysqli_num_rows($res_cart_items);
echo $num_count_items;
    
}

//function to get the total price of products in the cart
function getTotalPrice(){
global $conn;
$ip=getIPAddress();
$total_price=0;
$select_ip="select * from `cart` where ip_address='$ip'";
$res_ip=mysqli_query($conn,$select_ip);
    //fetch the ip
while($row=mysqli_fetch_assoc($res_ip)){
    $product_id=$row['product_id'];
    $select_price="select * from `products` where product_id=$product_id";
    $res_price=mysqli_query($conn,$select_price);
        //fetch price
    while($row_price=(mysqli_fetch_array($res_price))){
     $price=array($row_price['product_price']);
     $sum_price=array_sum($price);
    
    $total_price+=$sum_price;
     
}
}
echo $total_price;

}



//fetch pending orders
function getPendingOrders(){
    global $conn;
    if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
        //fetch user if from the users table
    $select_user_id="select * from `users` where user_name='$username'";
    $res_user_id=mysqli_query($conn,$select_user_id);
    $row_userid=mysqli_fetch_assoc($res_user_id);
    $user_id=$row_userid['user_id'];

    //fetch pending orders from the orders table
    $select_orders="select * from `orders` where order_status='pending' and user_id=$user_id";
    $res_orders=mysqli_query($conn,$select_orders);
    $num_orders=mysqli_num_rows($res_orders);
    if($num_orders>0){
        echo "<h3>You have <span> $num_orders </span>pending order(s)</h3>
        <p><a href='profile.php?my_orders'>order details</a></p>";
    }
    else{
        echo "<h3>You have <span> zero </span>pending orders</h3>
        <p><a href='../homepage.php'>Explore Products</a></p>";  
    }
}
}

}
    }
}


















?>

    
</body>
</html>