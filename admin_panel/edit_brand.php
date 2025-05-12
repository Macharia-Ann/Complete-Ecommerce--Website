
<?php
include '../connect.php';
//display the brand title on the input bar
if(isset($_GET['edit_brand'])){
    $edit_brand=$_GET['edit_brand'];
    $select="select * from `brands` where brand_id=$edit_brand";
    $res=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($res);
    $brand_title=$row['brand_title'];
    echo "";
}
//update brands
if(isset($_POST['update_brand'])){
    $inputBrand_title=$_POST['brand_title'];
    $update="update `brands` set brand_title='$inputBrand_title' where brand_id=$edit_brand";
    $res_update=mysqli_query($conn,$update);
    if($res_update){
        echo "<script>alert('brand updated successfully')</script>";
    }
}

?>


<div class="insert-form">
    <h3>Edit Brand</h3>
    <form method="post" action="">
   <input type="text" placeholder="insert brand" name='brand_title' value='<?php echo $brand_title ?>'>
   <button name="update_brand">Update Brand</button>
</form>
</div>