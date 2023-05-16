<?php 
define('TITLE', 'Success');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script> location.href='UserLogin.php'</script>";
}
echo "<div class='alert alert-success col-sm-6 ml-5 mt-5 '>We have given you the details of the booking. You can check if your booking is successfully made or not by just typing your booking id in the search field inside the service status page. Thank you!</div>";
$sql = "SELECT * FROM submitbooking_tb WHERE booking_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    echo "<div class='ml-5 mt-5 ml-5'>
    <table class='table'>
    <tbody>
    <tr>
    <th>Booking ID</th>
    <td>".$row['booking_id']."</td>
    </tr>
    <tr>
    <th>Name</th>
    <td>".$row['user_name']."</td>
    </tr>
    <tr>
    <th>Email</th>
    <td>".$row['user_email']."</td>
    </tr>
    <tr>
    <th>Booking info</th>
    <td>".$row['booking_info']."</td>
    </tr>
    <tr>
    <th>Booking Description</th>
    <td>".$row['booking_desc']."</td>
    </tr>
    <tr>
    <td><form  class='mb-3 d-print-none' >
    <input class='btn btn-success'
     type='submit' value='Print' onClick='window.print()' >
    <input class='btn btn-secondary' type='submit' value='Close'>
</form></td>
</tr>
</tbody>
</table></div>";
} else {
    echo "Failed";
}
?>

<?php 
include('includes/footer.php');

?>