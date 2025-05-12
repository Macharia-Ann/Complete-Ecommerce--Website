
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
   <?php
   include '../connect.php';

   
   //insert data into the admin table
   if(isset($_POST['admin_register'])){
   $username=$_POST['username'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   $pwd_hash=password_hash($password, PASSWORD_BCRYPT);
   $cPwd=$_POST['cPassword'];

   //check if the admin already exists in the db
   $select="select * from `admin` where admin_name='$username'";
   $res=mysqli_query($conn,$select);
   $num=mysqli_num_rows($res);
   if($num>0){
    echo "<script>alert('admin with a similar username exists!')</script>";
   }
   //check if passwords match
   else if($password != $cPwd ){
    echo "<script>alert('passwords do not match!')</script>";

   }
   else{
$insert="insert into `admin` (admin_name, admin_email, admin_password) values('$username', '$email','$pwd_hash')";
$res_insert=mysqli_query($conn,$insert);
if($res_insert){
    echo "<script>alert('admin registered successfully!')</script>";

}
   }

   

   }
   ?> 
<form method="post" action="" enctype="multipart/form-data" class='form'>
<h3>Admin Registration</h3>

    <div class="admin-login-form">
    <div class="imageinput">
    <img src="../images/admin.png" alt="" style='width: 480px; height: 480px; fit-contain: contain;'>
</div>
    <div class="admin-login">
    

           <div class="logininput">
           <label for="">Username</label>
            <input type="text" placeholder="Enter your username" name="username">
        </div>

        <div class="logininput">
           <label for="">Email</label>
            <input type="email" placeholder="Enter your email" name="email">
        </div>

        <div class="logininput">
            <label for="">Password</label>
            <input type="password" placeholder="Enter your password" name="password">
        </div>

        <div class="logininput">
            <label for="">Confirm Password</label>
            <input type="password" placeholder="confirm password" name="cPassword">
        </div>


        <button name="admin_register">Register</button>
        <p>Have an account? <a href="admin_login.php" style='color: red; text-decoration: none;'>Login</a></p>


</div>
</div>
</form>