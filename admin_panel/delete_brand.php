<?php
include '../connect.php';
//delete brand
if(isset($_GET['delete_brand'])){
    $delete_brand_id=$_GET['delete_brand'];
    $delete="delete from `brands` where brand_id=$delete_brand_id";
    $res=mysqli_query($conn,$delete);
    if($res){
        echo "<script>alert('brand deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";

    }
}


?>