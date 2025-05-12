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
include '../connect.php';
include '../functions/functions.php';


?>
    <!---------Header/nav bar----------->
  <div class="header">
    <nav>
<ul>
    <li><img src="../images/cart1.png"></li>
    <li><a href='../homepage.php'>Home</a></li>
    <li><a href='../user_area/register.php'>Register</a></li>
    <li><a href='contact.php.php'>Contact</a></li>
    <li><a href=''><img src="../images/cart4.png"></a></li>
    <li>Total Price:  <?php echo  getTotalPrice(); ?>/=</li>
</ul>        
    </nav>
    <form method="get" action="">
    <div class="search_bar">
        <input type="text" placeholder="search" name="searchdata"><button name="searchbtn">Search</button>
    </div>
    </form>

  </div>  

   <!---------login ----------->
   <div class="welcome_part">
   <h3>Welcome Guest</h3><p><a href="../user_area/login.php">Login</a></p>
   </div>

   <!-------display products---->
   <div class='products_wrap'>
    <h2>Hidden Store</h2>
    <p style='text-align: center; font-size: 18px; margin-top: 5px; margin-bottom: 10px;'>Communication is at the heart of ecommerce community</p>
    <div class='products'>

    <?php
#the get all products function
searchData();
getEachBrand();
getEachCategory();


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