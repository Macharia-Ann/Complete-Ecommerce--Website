
<?php
include '../connect.php';
include '../functions/functions.php';

?>



<form mthod='post' action='' style='margin-left: 20%;'>

    <h3 style='text-align: center; color: green; font-size: 30px; margin:20px;'>All Products</h3>
    <table>
<?php

//fetch data from the products table
$select="select * from `products`";
$result=mysqli_query($conn,$select);
$num=mysqli_num_rows($result);
if($num>0){
    echo " <thead style='background: rgb(0, 195, 255);'>

        <tr>
            <th>Product Id</th>
            <th>Product <Title></Title></th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
</thead>";
    while($rows=mysqli_fetch_assoc($result)){
        $product_id=$rows['product_id'];
        $product_title=$rows['product_title'];
        $product_image=$rows['product_image1'];
        $product_price=$rows['product_price'];
        $product_status=$rows['product_status'];
        echo "";



    ?>
  
  <tbody style='background: grey; color: white;'>
        <tr>
            <td><?php echo $product_id ?></td>
            <td><?php echo $product_title ?></td>
            <td><img src='../images/<?php echo $product_image ?>'></td>
            <td><?php echo $product_price ?></td>
<?php
//fetch total products sold for each id in pending_orders table
$select_orders="select * from `pending_orders` where product_id=$product_id";
$res=mysqli_query($conn,$select_orders);
$num_rows=mysqli_num_rows($res);
if($num_rows){
    echo "";
}

?>
            <td><?php echo $num_rows ?></td>
            <td><?php echo $product_status ?></td>
            <td><a href='index.php?edit_product=<?php echo $product_id ?>' style='color: white;'><i class='fas fa-pen-to-square'></a></i></td>
            <td><a href='index.php?delete_product=<?php echo $product_id ?>' style='color: black;'><i class='fas fa-trash'></i></a></td>



        </tr>
</tbody>
<?php
}}
?>

    </table>
</form>


<!------footer------->
<div class="footer">
    <p>designed by sherry with <span style='color:white;'>❤</span> &copy; copyright</p>
</div>
</body>
</html>