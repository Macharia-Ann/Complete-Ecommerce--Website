
<?php
include '../connect.php';

?>



<form method='post' action='' style='margin-left: 20%;'>

    <h3 style='text-align: center; color: green; font-size: 30px; margin:20px;'>All Payments</h3>
    <table>
        <?php
//fetch all payment details from user_payments table
if(isset($_GET['all_payments'])){
    $select="select * from `user_payments`";
    $res=mysqli_query($conn,$select);
    $number=0;
    $num=mysqli_num_rows($res);
    if($num>0){
        echo " <thead style='background: rgb(0, 195, 255);'>
          <tr>
            <th>SI no</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Payment Date</th>
            <th>Delete</th>
        </tr>
</thead>";
while($row=mysqli_fetch_assoc($res)){
    $payment_id=$row['payment_id'];
    $invoice_number=$row['invoice_number'];
    $amount=$row['amount'];
    $payment_mode=$row['payment_mode'];
    $payment_date=$row['payment_date'];
    $number++;

    echo "<tbody style='background: grey; color: white;'>
        <tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$payment_date</td>
            <td><a href='index.php?delete_payment=$payment_id' style='color: black;'><i class='fas fa-trash'></i></a></td>

        </tr>
</tbody>";



}
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