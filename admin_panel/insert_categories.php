
<?php
include '../connect.php';
if(isset($_POST['insert_category'])){
    $cat_title=$_POST['cat_title'];
$select="select * from `categories` where category_title='$cat_title'";
$result=mysqli_query($conn, $select);
$num=mysqli_num_rows($result);
if($num>0){
    echo "<script>alert('category already exists')</script>";

}
else{
    $insert="insert into `categories` (category_title) values('$cat_title')";
    $result_insert=mysqli_query($conn,$insert);
    if($result){
        echo "<script>alert('category inserted successfully')</script>";

    }
}

}


?>




<div class="insert-form">
    <h3>Insert Category</h3>
    <form method="post" action="">
   <input type="text" placeholder="insert category" name='cat_title'>
   <button name="insert_category">Insert Category</button>
</form>
</div>