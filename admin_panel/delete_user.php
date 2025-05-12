<?php
include '../connect.php';
//delete user using their user_id
if(isset($_GET['delete_user'])){
    $delete_user_id=$_GET['delete_user'];
    // echo $delete_user_id;

    $delete="delete from `users` where user_id=$delete_user_id";
    $res=mysqli_query($conn,$delete);
    if($res){
        echo "<script>alert('user deleted successfully')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
  
    }
}

?>

