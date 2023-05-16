<?php 
define('TITLE', 'Edit');
define('PAGE', 'labours');
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
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Labours Details</h3>
    <?php 
    if(isset($_REQUEST['edit'])){
        $sql = "SELECT * FROM labours_tb WHERE empid={$_REQUEST['id']}";
        $result =$conn->query($sql);
        $row = $result->fetch_assoc();
       
    }
    if(isset($_REQUEST['labourupdate'])){
        if(($_REQUEST['empid'] == "") ||($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fields should not be empty</div>';
          }else{
            $lid = $_REQUEST['empid'];
              $lname = $_REQUEST['empName'];
              $lcity = $_REQUEST['empCity'];
              $lmobile = $_REQUEST['empMobile'];
              $lemail = $_REQUEST['empEmail'];
              $sql = "UPDATE labours_tb SET empid = '$lid', 
              empName= '$lname',empCity= '$lcity', empMobile='$lmobile', empEmail = '$lemail' WHERE empid = '$lid'";
              if($conn->query($sql) == TRUE){
                  $msg = '<div class="alert alert-info col-sm-6 ml-5 mt-2">Successfully Updated</div>';
              }else{
                  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Something went wrong</div>';
              }
          }
      }
    
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="empid">Labour Id</label>
                <input type="text" name="empid" class="form-control" id="empid" 
                Value="<?php if(isset($row['empid'])){echo $row['empid']; } ?>" readonly>
            </div>
            <div class="form-group">
                <label for="empName">Name</label>
                <input type="text" name="empName" class="form-control" id="empName" 
                Value="<?php if(isset($row['empName'])){echo $row['empName']; } ?>" >
            </div>
            <div class="form-group">
                <label for="empCity">City</label>
                <input type="text" name="empCity" class="form-control" id="empCity" 
                Value="<?php if(isset($row['empCity'])){echo $row['empCity']; } ?>" >
            </div>
            <div class="form-group">
                <label for="empMobile">Mobile</label>
                <input type="text" name="empMobile" class="form-control" id="empMobile" 
                Value="<?php if(isset($row['empMobile'])){echo $row['empMobile']; } ?>" >
            </div>
            <div class="form-group">
                <label for="empEmail">Email</label>
                <input type="email" name="empEmail" class="form-control" id="empEmail" 
                Value="<?php if(isset($row['empEmail'])){echo $row['empEmail']; } ?>">
            </div>
            
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-success" 
                id="labourupdate" name="labourupdate">Update</button>
                <a href="labours.php" class="btn btn-secondary">Cancel</a>
             
            </div>
            <?php if(isset($msg)) {echo $msg;} ?>
        </form> 
</div>


<!--end sec col--->
<script>
function isInputNumber(evt){
    var ch= String.formCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();

    }
}
</script>


<?php include('includes/footer.php'); ?>