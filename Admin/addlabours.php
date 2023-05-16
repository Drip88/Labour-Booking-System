<?php 
define('TITLE', 'Add');
define('PAGE', 'labours');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else {
    echo "<script>location.href='adminlogin.php'</script>";
}
include('includes/header.php');
include('../dbConnection.php');
if(isset($_REQUEST['addlabour'])){
    if(($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")){
      $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fields should not be empty</div>';
    }else{
        $lname = $_REQUEST['empName'];
        $lcity = $_REQUEST['empCity'];
        $lmobile = $_REQUEST['empMobile'];
        $lemail = $_REQUEST['empEmail'];
        $sql = "INSERT INTO labours_tb (
        empName, empCity, empMobile, empEmail)  VALUES ('$lname','$lcity','$lmobile','$lemail')";
        if($conn->query($sql) == TRUE){
            $msg = '<div class="alert alert-info col-sm-6 ml-5 mt-2">Successfully Added</div>';
        }else{
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Something went wrong</div>';
        }
    }
}
?>
<!--start sec col--->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Labours</h3>

<form action="" method="POST">
            
            <div class="form-group">
                <label for="empName">Name</label>
                <input type="text" name="empName" class="form-control" id="empName" 
                name="empName" >
            </div>
            <div class="form-group">
                <label for="empCity">City</label>
                <input type="text" name="empCity" class="form-control" id="empCity" 
                name="empCity">
            </div>
            <div class="form-group">
                <label for="empMobile">Mobile</label>
                <input type="text" name="empMobile" class="form-control" id="empMobile" 
                name="empMobile" onKeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="empEmail">Email</label>
                <input type="email" name="empEmail" class="form-control" id="empEmail" 
                name="empEmail">
            </div>
            
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-success" 
                id="addlabour" name="addlabour">Add</button>
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