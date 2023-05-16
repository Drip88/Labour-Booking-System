<?php 
define('TITLE', 'WorkOrder');
define('PAGE', 'Work');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else {
    echo "<script>location.href='adminlogin.php'</script>";
}
include('includes/header.php');
include('../dbConnection.php');
?>


<!---start sec col-->
<div class="col-sm-9 col-md-10 mt-5">
<?php 
$sql = "SELECT * FROM workassign_tb";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead';
    echo '<tr>';
    echo '<th scope="col">Booking ID</th>';
    echo '<th scope="col">Booking Info</th>';
    echo '<th scope="col">Name</th>';
    echo '<th scope="col">Address</th>';
    echo '<th scope="col">City</th>';
    echo '<th scope="col">Mobile</th>';
    echo '<th scope="col">Labour</th>';
    echo '<th scope="col">Assign Date</th>';
    echo '<th scope="col">Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row['booking_id'].'</td>';
        echo '<td>'.$row['booking_info'].'</td>';
        echo '<td>'.$row['user_name'].'</td>';
        echo '<td>'.$row['user_add2'].'</td>';
        echo '<td>'.$row['user_city'].'</td>';
        echo '<td>'.$row['user_mobile'].'</td>';
        echo '<td>'.$row['assign_labour'].'</td>';
        echo '<td>'.$row['assign_date'].'</td>';
        echo '<td>';
        echo '<form action="viewworkassign.php" method="POST" class="d-inline mr-2">';
        echo '<input type="hidden" name="id" value='.$row['booking_id'].'><button class="btn btn-success" name="view" value="View" type="submit"><i class="far fa-eye"></i></button>';
        echo '</form>';
        echo '<form action="" method="POST" class="d-inline">';
        echo '<input type="hidden" name="id" value='.$row['booking_id'].'><button class="btn btn-secondary" name="Remove" value="Remove" type="submit"><i class="far fa-trash-alt"></i></button>';
        echo '</form>';
        echo '</td>';

        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}else{
    echo '0 Result';
}
if(isset($_REQUEST['Remove'])){
    $sql = "DELETE FROM workassign_tb WHERE booking_id={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content= "0;URL=?deleted"/>'; 
    }else{
        echo "Failed to Delete Data";
    }
}
?>
</div> <!--end sec col-->
<?php include('includes/footer.php') ?>







