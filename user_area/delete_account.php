




<form method="post" action="" class="product-form" style="margin-bottom: 30px;" onsubmit="return confirmDelete();">
    
    <h3 style="font-size: 35px;">Delete Account</h3>
    <div class="insert-product">

        <div class="firstinput">
            <input type="submit"  name="delete" value="Delete">
        </div>

      
</div>

</form>
<script>
   function confirmDelete(){
        return confirm('Are you sure you want to delete your account? This action cannot be undone.');
    }
</script>


<?php
if(isset($_POST['delete'])){
    if(isset($_SESSION['username'])){
$username=$_SESSION['username'];
   
//fetch the user id from users table
$select="select * from `users` where user_name='$username'";
$res=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($res);
$user_id=$row['user_id'];

//now delete the fetch user with the latter user id
$delete="delete from `users` where user_id=$user_id";
$res_delete=mysqli_query($conn,$delete);
if($res_delete){
    session_unset();
    echo "<script>alert('Sad to see you go😒 Account deleted')</script>";
    echo "<script>window.open('../homepage.php','_self')</script>";

}
}
}



?>
