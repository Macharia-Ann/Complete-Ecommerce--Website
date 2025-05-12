
<?php
include '../connect.php';

?>



<form method='post' action='' style='margin-left: 20%;'>

    <h3 style='text-align: center; color: green; font-size: 30px; margin:20px;'>All Orders</h3>
    <table>
        <?php
//fetch all orders from orders table
if(isset($_GET['all_orders'])){
    $select="select * from `orders`";
    $number=0;
    $res=mysqli_query($conn,$select);
    $num=mysqli_num_rows($res);
    if($num>0){
        echo " <thead style='background: rgb(0, 195, 255);'>
          <tr>
            <th>SI no</th>
            <th>Due Amount <Title></Title></th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
</thead>";
while($row=mysqli_fetch_assoc($res)){
    $amount=$row['amount'];
    $order_id=$row['order_id'];
    $invoice_number=$row['invoice_number'];
    $total_products=$row['total_products'];
    $order_date=$row['order_date'];
    $order_status=$row['order_status'];
$number++;

    echo "<tbody style='background: grey; color: white;'>
        <tr>
            <td>$number</td>
            <td>$amount</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='index.php?delete_order=$order_id' style='color: black;'><i class='fas fa-trash'></i></a></td>

        </tr>
</tbody>";

}
    }
    else{
        echo "<h2 style='color: red; font-size: 30px; text-align: center;'>No orders yet</h2>";
    }
}


?>

  
  


    </table>
</form>


<!------footer------->
<div class="footer">
    <p>designed by sherry with <span style='color:white;'>❤</span> &copy; copyright</p>
</div>
</body>
</html>