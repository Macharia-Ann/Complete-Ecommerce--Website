
<?php
include '../connect.php';

?>



<form method='post' action='' style='margin-left: 20%;' onsubmit='return confirmDelete();'>

    <h3 style='text-align: center; color: green; font-size: 30px; margin:20px;'>All Users</h3>
    <table>
        <?php
//list all users
if(isset($_GET['list_users'])){
    $select="select * from `users`";
    $res=mysqli_query($conn,$select);
    $number=0;
    $num=mysqli_num_rows($res);
    if($num>0){
        echo "<thead style='background: rgb(0, 195, 255);'>
          <tr>
            <th>SI no</th>
            <th>Username</th>
            <th>User Email</th>
            <th>User Image </th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>Delete</th>
        </tr>
</thead>";

while($row=mysqli_fetch_assoc($res)){
    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $user_email=$row['user_email'];
    $user_image=$row['user_image'];
    $user_address=$row['user_address'];
    $user_mobile=$row['user_mobile'];
    $number++;

    echo "<tbody style='background: grey; color: white;'>
        <tr>
            <td>$number</td>
            <td>$user_name</td>
            <td>$user_email</td>
            <td><img src='../images/$user_image'></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href='index.php?delete_user=$user_id' style='color: black;'><i class='fas fa-trash'></i></a></td>

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
<script>
    function confirmDelete(){
confirm('Are you sure you want to delete this user? Action cannot be undone.');
    }
</script>
</html>