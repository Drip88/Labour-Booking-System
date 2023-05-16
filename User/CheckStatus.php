<?php 
define('TITLE', 'Status');
define('PAGE', 'CheckStatus');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_login'])){
    $aEmail = $_SESSION['rEmail'];
}else {
    echo "<script> location.href='UserLogin.php'</script>";
}
?>

<!---start sec col-->
<div class="col-sm-6 mt-5 mx-3">
    <form action="" method="post" class="form-inline">
        <div class="form-group mr-3 d-print-none">
            <label for="checkid">Enter Booking ID:</label>
            <input type="text" class="form-control" name="checkid" id="checkid"
            onkeypress="IsInputNumber(event)">


        </div>
        <button type="submit" class="btn btn-success d-print-none">GO</button>
    </form>
    <?php
    if(isset($_REQUEST['checkid'])){
        if($_REQUEST['checkid'] == ""){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Filed should not be empty </div>';
        }else{
            $sql = "SELECT * FROM workassign_tb WHERE booking_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if(($row['booking_id'] == $_REQUEST['checkid'])){
        ?>
        <h3 class="text-center mt-5">Work Assigned Details</h3>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Booking ID</td>
                    <td><?php if(isset($row['booking_id'])){echo $row['booking_id'];} ?></td>
                </tr>
                <tr>
                    <td>Booking Info</td>
                    <td><?php if(isset($row['booking_info'])){echo $row['booking_info'];} ?></td>
                </tr>
                <tr>
                    <td>Booking desc</td>
                    <td><?php if(isset($row['booking_desc'])){echo $row['booking_desc'];} ?></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><?php if(isset($row['user_name'])){echo $row['user_name'];} ?></td>
                </tr>
                <tr>
                    <td>Address 1</td>
                    <td><?php if(isset($row['user_add1'])){echo $row['user_add1'];} ?></td>
                </tr>
                <tr>
                    <td>Address 2</td>
                    <td><?php if(isset($row['user_add2'])){echo $row['user_add2'];} ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php if(isset($row['user_city'])){echo $row['user_city'];} ?></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php if(isset($row['user_state'])){echo $row['user_state'];} ?></td>
                </tr>
                <tr>
                    <td>Zip Code</td>
                    <td><?php if(isset($row['user_zip'])){echo $row['user_zip'];} ?></td>
                </tr>
                <tr>
                    <td>Email Address</td>
                    <td><?php if(isset($row['user_email'])){echo $row['user_email'];} ?></td>
                </tr>
                <tr>
                    <td>Mobile No</td>
                    <td><?php if(isset($row['user_mobile'])){echo $row['user_mobile'];} ?></td>
                </tr>
                <tr>
                    <td>Labour Name</td>
                    <td><?php if(isset($row['assign_labour'])){echo $row['assign_labour'];} ?></td>
                </tr>
                <tr>
                    <td>Assigned Date</td>
                    <td><?php if(isset($row['assign_date'])){echo $row['assign_date'];} ?></td>
                </tr>
                <tr>
                    <td>Customer Sign</td>
                </tr>
                <tr>
                    <td>Labour sign</td>
                </tr>
            </tbody>
        </table>
        <div class="text-center">
            <form action="" class="mb-3 d-print-none" >
                <input class="btn btn-success"
                 type="submit" value="Print" onClick="window.print()" >
                <input class="btn btn-secondary" type="submit" value="Close">
            </form>

        </div>
        <div class='alert alert-success col-sm-6 ml-5 mt-2'>We have assigned workers according to your booking.This is the Details of your request you can print the details. We will contact you and will send the workers to your place soon. Thankyou for your Patience</div>
      <?php  } else {
    echo '<div class="alert alert-info mt-4">Pending Request</div>';
    
      }
        }
        
}?>
<?php 
if(isset($msg)){ echo $msg;}

?>
</div> <!---end sec col-->
<!---Number Field-->
<script> 
function isInputNumber(evt){
    var ch= String.formCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();

    }
}
</script>





<?php 
include('includes/footer.php');

?>