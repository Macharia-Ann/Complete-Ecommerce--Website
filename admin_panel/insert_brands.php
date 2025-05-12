
<?php
include '../connect.php';


?>






<div class="insert-form">
    <h3>Insert Brand</h3>
    <form method="post" action="">
        <?php
        if(isset($_POST['insert_brand'])){
            $brand_title=$_POST['brand_title'];
            $select="select * from `brands` where brand_title='$brand_title'";
            $result=mysqli_query($conn,$select);
            $num=mysqli_num_rows($result);
            if($num>0){
                echo "<script>alert('brand already exists')</script>";
   
            }
            else{
        
                $insert_query="insert into `brands` (brand_title) values('$brand_title')";
                $result_insert=mysqli_query($conn,$insert_query);
                if($result_insert){
                    echo "<script>alert('brand inserted successfully')</script>";
              
                }
            }
        }
            ?>
   <input type="text" placeholder="insert brand" name="brand_title">
   <button name="insert_brand">Insert Brand</button>
</form>
</div>