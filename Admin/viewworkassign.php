<?php 
define('TITLE', 'view');
define('PAGE', 'viewworkassign');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else {
    echo "<script>location.href='adminlogin.php'</script>";
}
include('includes/header.php');
include('../dbConnection.php');
?>
<!--start sec col-->
<div class="col-sm-6 mt-5 mx-3">
    <h3 class="text-center">Work Assigned Details</h3>
    <?php 
    if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM workassign_tb WHERE booking_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
            $row = $result->fetch_assoc(); ?>
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
            <form action="" class="mb-3 d-print-none d-inline" >
                <input class="btn btn-success"
                 type="submit" value="Print" onClick="window.print()" ></form>

               <form action="work.php" class="mb-3 d-print-none d-inline">  <input class="btn btn-secondary" type="submit" value="Close">
            </form>

        </div>
    <?php }?>
</div>
<!--end sec col-->
<?php include('includes/footer.php')?>