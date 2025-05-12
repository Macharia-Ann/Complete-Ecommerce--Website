<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <?php
    @session_start();

include '../connect.php';
//check if a user is logged in
if(isset($_SESSION['username'])){
    include 'payment.php';
}
else{
    include 'login.php';
}

?>
    



</body>
</html>