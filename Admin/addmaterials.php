<?php 
define('TITLE', 'Add Product');
define('PAGE', 'consmat');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else {
    echo "<script>location.href='adminlogin.php'</script>";
}
include('includes/header.php');
include('../dbConnection.php');
if(isset($_REQUEST['addprod'])){
    if(($_REQUEST['mname'] == "") 
    || ($_REQUEST['mdop'] == "") 
    || ($_REQUEST['mava'] == "") 
    || ($_REQUEST['mtotal'] == "") 
    || ($_REQUEST['moriginalcost'] == "") 
    || ($_REQUEST['msellingcost'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fields should not be empty</div>';
    }else{
        $mname = $_REQUEST['mname'];
        $mdop = $_REQUEST['mdop'];
       $mava = $_REQUEST['mava'];
       $mtotal = $_REQUEST['mtotal'];
       $moriginalcost = $_REQUEST['moriginalcost'];
       $msellingcost = $_REQUEST['msellingcost'];
       
       $sql = "INSERT INTO constmat_tb (mname,mdop,mava,mtotal,moriginalcost,msellingcost
       )VALUES('$mname','$mdop', '$mava', '$mtotal', '$moriginalcost',
       '$msellingcost')";
       if($conn->query($sql)== TRUE){
        $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Product added successfully</div>';
    }else{
        $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Something went wrong</div>';
    }
    
}
}
?>

<!--start sec col--->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Products</h3>

<form action="" method="POST">
            
            <div class="form-group">
                <label for="mname">Name</label>
                <input type="text" name="mname" class="form-control" id="mname" 
                name="mname" >
            </div>
            <div class="form-group">
                <label for="mdop">Date of Purchase</label>
                <input type="date" name="mdop" class="form-control" id="mdop" 
                name="mdop">
            </div>
            <div class="form-group">
                <label for="mava">Available</label>
                <input type="text" name="mava" class="form-control" id="mava" 
                name="mava">

            </div>
            <div class="form-group">
                <label for="mtotal">Total</label>
                <input type="text" name="mtotal" class="form-control" id="mtotal" 
                name="mtotal">
            </div>
            <div class="form-group">
                <label for="moriginalcost">Original Price</label>
                <input type="text" name="moriginalcost" class="form-control" id="moriginalcost" 
                name="moriginalcost">
            </div>
            <div class="form-group">
                <label for="msellingcost">Selling price</label>
                <input type="text" name="msellingcost" class="form-control" id="msellingcost" 
                name="msellingcost" onKeypress="isInputNumber(event)">
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-success" 
                id="addprod" name="addprod">Add</button>
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