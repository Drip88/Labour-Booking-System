<?php 
define('TITLE', 'Edit Product');
define('PAGE', 'consmat');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else {
    echo "<script>location.href='adminlogin.php'</script>";
}
include('includes/header.php');
include('../dbConnection.php');
if(isset($_REQUEST['editprod'])){
    if(($_REQUEST['mname'] == "") 
    || ($_REQUEST['mdop'] == "") 
    || ($_REQUEST['mava'] == "") 
    || ($_REQUEST['mtotal'] == "") 
    || ($_REQUEST['moriginalcost'] == "") 
    || ($_REQUEST['msellingcost'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fields should not be empty</div>';
    }else{
        $mid = $_REQUEST['mid'];
        $mname = $_REQUEST['mname'];
        $mdop = $_REQUEST['mdop'];
       $mava = $_REQUEST['mava'];
       $mtotal = $_REQUEST['mtotal'];
       $moriginalcost = $_REQUEST['moriginalcost'];
       $msellingcost = $_REQUEST['msellingcost'];
       $sql = "UPDATE constmat_tb SET mname = '$mname',mdop = '$mdop',mava = '$mava',mtotal = '$mtotal',moriginalcost = '$moriginalcost',msellingcost = '$msellingcost' WHERE mid= '$mid'";
       if($conn->query($sql)== TRUE){
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Product updated successfully</div>';
    }else{
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Something went wrong</div>';
    }
    
}
}
?>


<!--start sec col--->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Products Details</h3>
<?php
if(isset($_REQUEST['edit'])){
    $sql = "SELECT * FROM constmat_tb WHERE mid = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
<form action="" method="POST">
<div class="form-group">
                <label for="mid">Product ID</label>
                <input type="text" name="mid" class="form-control" id="mis" 
                name="mid" value="<?php if(isset($row['mid'])) { echo $row['mid'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="mname">Name</label>
                <input type="text" name="mname" class="form-control" id="mname" 
                name="mname" value="<?php if(isset($row['mname'])) { echo $row['mname'];} ?>">
            </div>
            <div class="form-group">
                <label for="mdop">Date of Purchase</label>
                <input type="date" name="mdop" class="form-control" id="mdop" 
                name="mdop" value="<?php if(isset($row['mdop'])) { echo $row['mdop'];} ?>">
            </div>
            <div class="form-group">
                <label for="mava">Available</label>
                <input type="text" name="mava" class="form-control" id="mava" 
                name="mava" value="<?php if(isset($row['mava'])) { echo $row['mava'];} ?>">

            </div>
            <div class="form-group">
                <label for="mtotal">Total</label>
                <input type="text" name="mtotal" class="form-control" id="mtotal" 
                name="mtotal" value="<?php if(isset($row['mtotal'])) { echo $row['mtotal'];} ?>">
            </div>
            <div class="form-group">
                <label for="moriginalcost">Original Price</label>
                <input type="text" name="moriginalcost" class="form-control" id="moriginalcost" 
                name="moriginalcost" value="<?php if(isset($row['moriginalcost'])) { echo $row['moriginalcost'];} ?>">
            </div>
            <div class="form-group">
                <label for="msellingcost">Selling price</label>
                <input type="text" name="msellingcost" class="form-control" id="msellingcost" 
                name="msellingcost" onKeypress="isInputNumber(event)" value="<?php if(isset($row['msellingcost'])) { echo $row['msellingcost'];} ?>">
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-success" 
                id="editprod" name="editprod">Update</button>
                <a href="consmat.php" class="btn btn-secondary">Cancel</a>
             
            </div>
            <?php if(isset($msg)) {echo $msg;} ?>
        </form> 
</div>


<!--end sec col--->
 <!--numberfield-->
 <script>
function isInputNumber(evt){
    var ch= String.formCharCode(evt.which);
    if(!(/[0-9]/.test(ch))){
        evt.preventDefault();

    }
}
</script>
<?php include('includes/footer.php'); ?>