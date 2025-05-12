
<?php
include '../connect.php';
//delete product with the selected product id
if(isset($_GET['delete_product'])){
    $product_id=$_GET['delete_product'];
    echo $product_id;
    $delete="delete from `products` where product_id=$product_id";
    $res=mysqli_query($conn,$delete);
    if($res){
        echo "<script>alert('product deleted successfully')</script>";
        echo "<script>window.open('index.php', '_self')</script>";

    }
}

?>