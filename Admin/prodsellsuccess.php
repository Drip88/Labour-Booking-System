<?php 
define('TITLE', 'Success');
define('PAGE', 'consmat');
session_start();
if($_SESSION['is_adminlogin']){
    $rEmail=$_SESSION['aEmail'];
}else{
    echo "<script> location.href='adminlogin.php'</script>";
}
include('includes/header.php');
include('../dbConnection.php');


$sql = "SELECT * FROM customer_tb WHERE cid = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    echo "<div class='ml-5 mt-5'>
    <h3 class='text-center'?Customer Bill</h3>
    <table class='table'>
    <tbody>
    <tr>
    <th>Customer ID</th>
    <td>".$row['cid']."</td>
    </tr>
    <tr>
    <th>Name</th>
    <td>".$row['cname']."</td>
    </tr>
    <tr>
    <th>Address</th>
    <td>".$row['cadd']."</td>
    </tr>
    <tr>
    <th>Product</th>
    <td>".$row['cpname']."</td>
    </tr>
    <tr>
    <th>Quantity</th>
    <td>".$row['cpquant']."</td>
    </tr>
    <tr>
    <tr>
    <th>Price</th>
    <td>".$row['cptotal']."</td>
    </tr>
    <tr>
    <th>Date</th>
    <td>".$row['cpdate']."</td>
    </tr>
    <tr>
    <tr>
    <td><form  class='mb-3 d-print-none' >
    <input class='btn btn-success'
     type='submit' value='Print' onClick='window.print()' ></form></td>
    <td><a href='consmat.php' class='btn btn-secondary d-print-none'>Close</a></td>

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