
<?php
include '../connect.php';

if(isset($_GET['edit_category'])){
    $edit_id=$_GET['edit_category'];
    //display the category on thhe input bar
    $select="select * from `categories` where category_id=$edit_id";
    $res=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($res);
    $cat_title=$row['category_title'];
    echo "";

  

}
//update the category title
if(isset($_POST['update_category'])){
    //fetch the title from the input
    $inputCategory_title=$_POST['cat_title'];
    $update="update `categories` set category_title='$inputCategory_title' where category_id=$edit_id";
    $res_update=mysqli_query($conn,$update);
    if($res_update){
        echo "<script>alert('category updated successfully')</script>";
    }
    }



?>


<div class="insert-form">
    <h3>Edit Category</h3>
    <form method="post" action="">
   <input type="text" placeholder="insert category" name='cat_title' value='<?php echo $cat_title ?>'>
   <button name="update_category">Update category</button>
</form>
</div>