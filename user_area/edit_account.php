

<?php
//access/display data on the inputs before updating
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
$select="select * from `users` where user_name='$username'";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($result);
    $user_id=$row['user_id'];
$username=$row['user_name'];
$email=$row['user_email'];
$address=$row['user_address'];
$contact= $row['user_mobile'];
$image=$row['user_image'];

echo "";
}
//update the data
if(isset($_POST['update-account'])){
$username=$_POST['username'];
$email=$_POST['email'];
$address=$_POST['address'];
$contact= $_POST['contact'];
$image=$_FILES['image']['name'];
$image_tmp=$_FILES['image']['tmp_name'];
move_uploaded_file($image_tmp,"../images/$image");
    $update= "update `users` set user_name='$username', user_email='$email', user_image='$image', user_address='$address', user_mobile='$contact' where user_id=$user_id";
    $result_update=mysqli_query($conn,$update);
    if($result_update){
        echo "<script>alert('account updated successfully!')</script>";
        echo "<script>window.open('logout.php','_self')</script>";

    }
}



?>

<form method="post" action="" enctype="multipart/form-data" class="product-form" style='margin-right: 15%;'>
    <h3>Edit Account</h3>
    <div class="insert-product">

        <div class="firstinput">
            <input type="text" placeholder="Enter your name" name="username" value='<?php echo $username?>'>
        </div>

        <div class="firstinput">
            <input type="text" placeholder="Enter your email" name="email" value='<?php echo $email?>'>
        </div>

        <div class="firstinput">
            <input type="file"  name="image">
        </div>

        <div class="firstinput">
            <input type="text" placeholder="Enter your address" name="address" value='<?php echo $address?>'>
        </div>

        <div class="firstinput">
            <input type="text" placeholder="Enter your contact" name="contact" value='<?php echo $contact?>'>
        </div>

        <button name="update-account">Edit acount</button>


</div>
</form>