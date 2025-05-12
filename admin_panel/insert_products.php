
<?php
include '../connect.php';
if(isset($_POST['insert-product'])){
$title=$_POST['product_title'];
$product_descript=$_POST['product_descript'];
$product_keywords=$_POST['product_keywords'];
$brand_id=$_POST['brand_id'];
$category_id=$_POST['category_id'];
$product_price=$_POST['product_price'];
$product_status='true';

#accessing image name
$product_image1=$_FILES['product_image1']['name'];
$product_image2=$_FILES['product_image2']['name'];
$product_image3=$_FILES['product_image3']['name'];
#accessing image tmp name
$product_image1_tmp=$_FILES['product_image1']['tmp_name'];
$product_image2_tmp=$_FILES['product_image2']['tmp_name'];
$product_image3_tmp=$_FILES['product_image3']['tmp_name'];
#move the images
move_uploaded_file($product_image1_tmp,"../images/$product_image1");
move_uploaded_file($product_image2_tmp,"../images/$product_image2");
move_uploaded_file($product_image3_tmp,"../images/$product_image3");

#check if the product exists
$select_product="select * from `products` where product_title='$title'";
$result_product=mysqli_query($conn,$select_product);
$num_products=mysqli_num_rows($result_product);
if($num_products>0){
    echo "<script>alert('product already exists')</script>";
  
}

#insert the products
else{
$insert="insert into `products` (product_title,product_descript,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,product_status) values('$title','$product_descript','$product_keywords','$category_id','$brand_id','$product_image1','$product_image2','$product_image3',$product_price,NOW(),'$product_status')";
$result_insert=mysqli_query($conn,$insert);
if($result_insert){
    echo "<script>alert('product inserted successfully')</script>";
}
}


}


?>

<form method="post" action="" enctype="multipart/form-data" class="product-form">
    <h3>Insert Products</h3>
    <div class="insert-product">

        <div class="firstinput">
            <label for="">Product Title</label>
            <input type="text" placeholder="Enter Product Title" name="product_title">
        </div>

        <div class="firstinput">
            <label for="">Product Description</label>
            <input type="text" placeholder="Enter Product Description" name="product_descript">
        </div>

        <div class="firstinput">
            <label for="">Product Keywords</label>
            <input type="text" placeholder="Enter Product Keywords" name="product_keywords">
        </div>

        <div class="firstinput">
            <select name="brand_id">
            <option>--select brand--</option>

                <?php
$select="select * from `brands`";
$result=mysqli_query($conn,$select);
while($row=mysqli_fetch_assoc($result)){
    $brand_id=$row['brand_id'];
    $brand_title=$row['brand_title'];
    echo "<option value='$brand_id'>$brand_title</option>";
}

?>
               
            </select>
        </div>

        <div class="firstinput">
            <select name="category_id">
                <option>--select category--</option>
                <?php
$select_cat="select * from `categories` ";
$res=mysqli_query($conn,$select_cat);
while($row_cat=mysqli_fetch_assoc($res)){
    $cat_id=$row_cat['category_id'];
    $cat_title=$row_cat['category_title'];
    echo "<option value='$cat_id'>$cat_title</option>";
}

?>
              
            </select>
        </div>

        <div class="firstinput">
            <label for="">Product Image 1</label>
            <input type="file"  name="product_image1">
        </div>

        <div class="firstinput">
            <label for="">Product Image 2</label>
            <input type="file"  name="product_image2">
        </div>

        <div class="firstinput">
            <label for="">Product Image 3</label>
            <input type="file"  name="product_image3">
        </div>

        <div class="firstinput">
            <label for="">Product Price</label>
            <input type="text" placeholder="Enter Product Price" name="product_price">
        </div>

        <button name="insert-product">Insert Product</button>
    </div>
</form>