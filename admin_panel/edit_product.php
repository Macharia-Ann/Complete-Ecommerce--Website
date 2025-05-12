
<?php
include '../connect.php';


?>

<form method="post" action="" enctype="multipart/form-data" class="product-form">
    <h3>Edit Product</h3>
    <div class="insert-product">
<?php

//display items on the input bars
if(isset($_GET['edit_product'])){
    $product_id=$_GET['edit_product'];
$select_products="select * from `products` where product_id=$product_id";
$res_product=mysqli_query($conn,$select_products);
$row_product=mysqli_fetch_assoc($res_product);
$title=$row_product['product_title'];
$product_descript=$row_product['product_descript'];
$product_keywords=$row_product['product_keywords'];
$brand_id=$row_product['brand_id'];
$category_id=$row_product['category_id'];
$product_price=$row_product['product_price'];
$image1=$row_product['product_image1'];
$image2=$row_product['product_image2'];
$image3=$row_product['product_image3'];
echo "";
}

?>
        <div class="firstinput">
            <label for="">Product Title</label>
            <input type="text" placeholder="Enter Product Title" name="product_title" value='<?php echo $title ?>'>
        </div>

        <div class="firstinput">
            <label for="">Product Description</label>
            <input type="text" placeholder="Enter Product Description" name="product_descript" value='<?php echo $product_descript ?>'>
        </div>

        <div class="firstinput">
            <label for="">Product Keywords</label>
            <input type="text" placeholder="Enter Product Keywords" name="product_keywords" value='<?php echo $product_keywords ?>'>
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

        <div class="firstinput" >
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
            <input type="text" placeholder="Enter Product Price" name="product_price" value='<?php echo $product_price ?>'>
        </div>
<?php

        ?>

        <button name="update-product">Edit Product</button>
        <?php
        // edit/update the products table
if(isset($_POST['update-product'])){
    $title=$_POST['product_title'];
$product_descript=$_POST['product_descript'];
$product_keywords=$_POST['product_keywords'];
$brand_id=$_POST['brand_id'];
$category_id=$_POST['category_id'];
$product_price=$_POST['product_price'];
$image1=$_FILES['product_image1']['name'];
$image2=$_FILES['product_image2']['name'];
$image3=$_FILES['product_image3']['name'];

$image1_tmp=$_FILES['product_image1']['tmp_name'];
$image2_tmp=$_FILES['product_image2']['tmp_name'];
$image3_tmp=$_FILES['product_image3']['tmp_name'];

move_uploaded_file($image1_tmp, "../images/$image1");
move_uploaded_file($image2_tmp, "../images/$image2");
move_uploaded_file($image3_tmp, "../images/$image3");

//update the data
$update="update `products` set product_title='$title',product_descript='$product_descript',product_keywords='$product_keywords',category_id=$category_id, brand_id=$brand_id,
  product_image1='$image1', product_image2='$image2', product_image3='$image3', product_price=$product_price where product_id=$product_id";
$res_update=mysqli_query($conn,$update);
if($res_update){
    echo "<script>alert('product updated successfully')</script>";
}
}

?>
    </div>
</form>