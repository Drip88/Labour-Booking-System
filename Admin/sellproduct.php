<?php 
define('TITLE', 'Material sold');
define('PAGE', 'consmat');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else {
    echo "<script>location.href='adminlogin.php'</script>";
}
include('includes/header.php');
include('../dbConnection.php');
if(isset($_REQUEST['msubmit'])){
    if(($_REQUEST['cname'] == "") ||($_REQUEST['cadd'] == "") || ($_REQUEST['mname'] == "") || ($_REQUEST['mquantity'] == "") || ($_REQUEST['msellingcost'] == "") || ($_REQUEST['total'] == "") || ($_REQUEST['selldate'] == "")){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fields should not be empty</div>';
      }else{
        $mid = $_REQUEST['mid'];
          $mava = $_REQUEST['mava'] - $_REQUEST['mquantity'];
          $cname = $_REQUEST['cname'];
          $cadd = $_REQUEST['cadd'];
          $cpname = $_REQUEST['mname'];
          $mquantity = $_REQUEST['mquantity'];
          $msellingcost = $_REQUEST['msellingcost'];
          $total = $_REQUEST['total'];
          $selldate = $_REQUEST['selldate'];
          $sql = "INSERT INTO customer_tb (cname,cadd,cpname,cpquant,cpeach,cptotal,cpdate
       )VALUES('$cname','$cadd', '$cpname', '$mquantity', '$msellingcost',
       '$total','$selldate')";
       if($conn->query($sql)== TRUE){
           $genid = mysqli_insert_id($conn);
         
              $_SESSION['myid'] = $genid;
              echo "<script> location.href='prodsellsuccess.php';</script>";
}
$sqlupd = "UPDATE constmat_tb SET mava = '$mava' WHERE mid = '$mid'";
$conn->query($sqlupd);
}
}
?>

<!--start sec col--->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Product Bill</h3>
<?php
if(isset($_REQUEST['sell'])){
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
                <label for="cname">Customer Name</label>
                <input type="text" name="cname" class="form-control" id="cname" 
                name="cname" >
            </div>
            <div class="form-group">
                <label for="cadd">Customer Address</label>
                <input type="text" name="cadd" class="form-control" id="cadd" 
                name="cadd" >
            </div>
            <div class="form-group">
                <label for="mname"> Product Name</label>
                <input type="text" name="mname" class="form-control" id="mname" 
                name="mname" value="<?php if(isset($row['mname'])) { echo $row['mname'];} ?>">
            </div>
            <div class="form-group">
                <label for="mava">Available</label>
                <input type="text" name="mava" class="form-control" id="mava" 
                name="mava" value="<?php if(isset($row['mava'])) { echo $row['mava'];} ?>">

            </div>
            <div class="form-group">
                <label for="mquantity">Quatntity</label>
                <input type="text" name="mquantity" class="form-control" id="mquantity" 
                name="mquantity">
            </div>
            <div class="form-group">
                <label for="msellingcost">Price each</label>
                <input type="text" name="msellingcost" class="form-control" id="msellingcost" 
                name="msellingcost" onKeypress="isInputNumber(event)" value="<?php if(isset($row['msellingcost'])) { echo $row['msellingcost'];} ?>">
            </div>
            <div class="form-group">
                <label for="total">Total Price </label>
                <input type="text" name="total" class="form-control" id="total" 
                name="total" onKeypress="isInputNumber(event)">
            </div>
            <div class="form-group col-md-4">
                <label for="inputDate">Date</label>
                <input type="date" name="selldate" class="form-control" id="inputDate" 
                name="selldate" >
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-success" 
                id="msubmit" name="msubmit">Submit</button>
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







<?php include('includes/footer.php')?>