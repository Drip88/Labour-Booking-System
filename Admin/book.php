<?php 
define('TITLE', 'Bookings');
define('PAGE', 'Bookings');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else {
    echo "<script> location.href='adminlogin.php'</script>";
}
include('includes/header.php');
include('../dbConnection.php');

?>

<!---start 2nd col-->
<div class="col-sm-4 mb-5 ">
<?php 
$sql ="SELECT booking_id, booking_info, booking_desc, submit_date FROM submitbooking_tb"; 
$result = $conn->query($sql);
if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        echo '<div class="card mt-5 mx-5">';
        echo '<div class="card-header">';
        echo 'Booking ID:'. $row['booking_id'];
        echo '</div>';
        echo '<div>';
         echo '<h5 class=card-title">Booking Info: '.$row
         ['booking_info'];
         echo '</h5>';
         echo '<p class="card-text">'.$row['booking_desc'];
         echo '</p>';
         echo '<p class="card-text">Submit Date: '.$row['submit_date'];
         echo '</p>';
         echo '<div class="float-right">';
        echo '<form action="" method="POST">';
        echo '<input type="hidden" name="id" value='.$row["booking_id"].'>';
        echo  '<input type="submit" class="btn btn-success mr-3" value="View" name="view">';
        echo  '<input type="submit" class="btn btn-secondary " value="Close" name="close">';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>

</div><!--end sec col--> 









<?php
include('workassign.php');
include('includes/footer.php');
?>