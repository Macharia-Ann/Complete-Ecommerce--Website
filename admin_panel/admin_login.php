
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







?>
<form method="post" action="" enctype="multipart/form-data" class='form'>
<h3>Admin Login</h3>

    <div class="admin-login-form">
    <div class="imageinput">
    <img src="../images/admin_login.jpeg" alt="" style='width: 350px; height: 350px; fit-contain: contain;'>
</div>
    <div class="admin-login">
    

           <div class="logininput">
           <label for="">Username</label>
            <input type="text" placeholder="Enter your username" name="username">
        </div>

        <div class="logininput">
            <label for="">Password</label>
            <input type="password" placeholder="Enter your password" name="password">
        </div>


        <button name="admin_login">Login</button>
        <p>Dont' have an account? <a href="admin_registration.php" style='color: red; text-decoration: none;'>Register</a></p>


</div>
</div>
<?php
session_start();
   //login 
   if(isset($_POST['admin_login'])){
    $name=$_POST['username'];
    $password=$_POST['password'];

    //check if user has registered.
    $select="select * from `admin` where admin_name='$name'";
    $res=mysqli_query($conn,$select);
    $num=mysqli_num_rows($res);
    $row=mysqli_fetch_assoc($res);

    if($num>0){
        //activate session
        $_SESSION['admin_name']=$name;

        //verify password
        if(password_verify($password, $row['admin_password'])){

            //activate session
            $_SESSION['admin_name']=$name;
            echo "<script>alert('logged in successfully!')</script>";
            echo "<script>window.open('index.php', '_self')</script>";

  
        }
        else{
            echo "<script>alert('invalid password!')</script>";

        }
    }
    else{
        echo "<script>alert('admin username not found!')</script>";

    }
}

   
?>
</form>