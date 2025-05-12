
<?php
include '../connect.php';


?>



<form mthod='post' action='' style='margin-left: 20%;'>

    <h3 style='text-align: center; color: green; font-size: 30px; margin:20px;'>All Brands</h3>
    <table style='width: 800px;'>
        <?php
//fetch brands from brands table
$select="select * from `brands`";
$res=mysqli_query($conn,$select);
$number=0;
$num=mysqli_num_rows($res);
if($num>0){
    echo "<thead style='background: rgb(0, 195, 255);'>

        <tr>
            <th>SI no</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
</thead>";
while($row=mysqli_fetch_assoc($res)){
    $brand_id=$row['brand_id'];
    $brand_title=$row['brand_title'];
    $number++;
    echo " <tbody style='background: grey; color: white;'>
        <tr>
            <td>$number</td>
            <td>$brand_title</td>
            <td><a href='index.php?edit_brand=$brand_id' style='color: white;'><i class='fas fa-pen-to-square'></a></i></td>
            <td><a href='index.php?delete_brand=$brand_id' style='color: black;'><i class='fas fa-trash'></i></a></td>
        </tr>
</tbody>";

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