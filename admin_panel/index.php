<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
    <?php 
    //interchange admin with the real admin name, when logged in
    session_start();

    ?>
    <div class="admin">
        <img src="../images/cart1.png">
        <?php
if(isset($_SESSION['admin_name'])){
    $name=$_SESSION['admin_name'];
    echo "<h3 style='font-size: 27px;'>Welcome <span style='color: white; font-size: 27px;margin-left: 15px;'>$name</span></h3>";
}
else{
    echo "<h3 style='font-size: 27px;'>Welcome <a href='admin_login.php?login' style='border-bottom: 1px solid black; text-decoration: none; margin-bottom: 5px; color: white; font-size: 27px;margin-left: 15px;'>Admin</a></h3>";
}

?>
    </div>
    <h3 style="margin: 20px; font-size: 25px; text-align: center;">Manage Details</h3>
    <div class="admin-operations">
      
        <div class="operation">
            <div class="admin-image">
                <img src="../images/dp.png">

            </div>
            <button><a href="index.php?insert_product">Insert Product</a> </button>
            <button><a href="index.php?view_products">View product</a></button>
            <button><a href="index.php?insert_brand">Insert Brand</a></button>
            <button><a href="index.php?view_brands">View Brand</a></button>
            <button><a href="index.php?insert_category">Insert Category</a></button>
            <button><a href="index.php?view_category">View Category</a></button>
            <button><a href="index.php?all_orders">All Orders</a></button>
            <button><a href="index.php?all_payments">All payments</a></button>
            <button><a href="index.php?list_users">List users</a></button>
            <button><a href="admin_logout.php">Logout</a></button>

        </div>
    </div>
    <!--------include insert forms------->
    <?php
if(isset($_GET['insert_brand'])){
    include 'insert_brands.php';
}

if(isset($_GET['insert_category'])){
    include 'insert_categories.php';
}

if(isset($_GET['insert_product'])){
    include 'insert_products.php';
}

if(isset($_GET['view_products'])){
    include 'view_products.php';
}

if(isset($_GET['edit_product'])){
    include 'edit_product.php';
}

if(isset($_GET['delete_product'])){
    include 'delete_product.php';
}

if(isset($_GET['view_category'])){
    include 'view_categories.php';
}

if(isset($_GET['view_brands'])){
    include 'view_brands.php';
}

if(isset($_GET['edit_category'])){
    include 'edit_category.php';
}

if(isset($_GET['edit_brand'])){
    include 'edit_brand.php';
}

if(isset($_GET['delete_cat'])){
    include 'delete_category.php';
}

if(isset($_GET['delete_brand'])){
    include 'delete_brand.php';
}

if(isset($_GET['all_orders'])){
    include 'all_orders.php';
}

if(isset($_GET['delete_order'])){
    include 'delete_order.php';
}

if(isset($_GET['all_payments'])){
    include 'all_payments.php';
}

if(isset($_GET['delete_payment'])){
    include 'delete_payment.php';
}

if(isset($_GET['list_users'])){
    include 'all_users.php';
}
if(isset($_GET['delete_user'])){
    include 'delete_user.php';
}

// login page for the admin
if(isset($_GET['login'])){
    include 'admin_login.php';
}

?>
    
</body>
</html>