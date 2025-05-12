



<form method='post' action=''>

    <h3 style='text-align: center;'>All my orders</h3>
    <table class="table">
    <?php
//fetch the user_id from users
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
$select="select * from `users` where user_name='$username'";
$res=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($res);
$user_id=$row['user_id'];

//fetch data from orders table
$select_orders="select * from `orders` where user_id='$user_id'";
$result=mysqli_query($conn,$select_orders);
$num_rows=mysqli_num_rows($result);
if($num_rows>0){
    echo " <thead style='background: rgb(0, 195, 255);'>

        <tr>
            <th>SI no</th>
            <th>Amount due</th>
            <th>Total products</th>
            <th>Invoice no</th>
            <th>Date</th>
            <th>Complete/Confirm</th>
            <th>Status</th>
        </tr>
</thead>";

while($row_orders=mysqli_fetch_assoc($result)){
$order_id=$row_orders['order_id'];
$amount=$row_orders['amount'];
$invoice_number=$row_orders['invoice_number'];
$total_products=$row_orders['total_products'];
$date=$row_orders['order_date'];
$status=$row_orders['order_status'];
echo "<tbody style='background: grey; color: white;'>
        <tr>
            <td>$order_id</td>
            <td>$amount</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$date</td>";
            ?>
            <?php
            //interchange confirm with complete if status == paid
if($status=='Paid'){
    echo "<td>Complete</td>";
}
else{
    echo "<td><a href='confirm_payment.php?order_id=$order_id'>confirm</a></td>";
   
}
?>

<?php
         echo "<td>$status</td>

        </tr>
</tbody>";

}
}
else{
    echo "<h3 style='color: red;'>You have no orders yet</h3>";
}
}
?>
       


    </table>
</form>
