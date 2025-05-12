<?php
include '../connect.php';
//delete payment using payment id
if(isset($_GET['delete_payment'])){
    $delete_payment_id=$_GET['delete_payment'];
    // echo $delete_payment_id;

    $delete="delete from `user_payments` where payment_id=$delete_payment_id";
    $res=mysqli_query($conn,$delete);
    if($res){
        echo "<script>alert('payment info deleted successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";

    }
}


?>