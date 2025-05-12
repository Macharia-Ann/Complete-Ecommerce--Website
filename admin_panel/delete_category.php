<?php
include '../connect.php';
//delete category
if(isset($_GET['delete_cat'])){
$delete_cat_id=$_GET['delete_cat'];
// echo $delete_cat;
$delete="delete from `categories` where category_id=$delete_cat_id";
$res=mysqli_query($conn,$delete);
if($res){
    echo "<script>alert('category deleted successfully')</script>";
    echo "<script>window.open('index.php', '_self')</script>";

}
}



?>