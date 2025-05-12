<?php
include '../connect.php';
//delete order
if(isset($_GET['delete_order'])){
    $delete_order_id=$_GET['delete_order'];
    echo $delete_order_id;
    $delete="delete from `orders` where order_id=$delete_order_id";
    $res=mysqli_query($conn,$delete);
    if($res){
        echo "<script>alert('order deleted successfully')</script>";
        echo "<script>window.open('index.php', '_self')</script>";

    }

}

?>