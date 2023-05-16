<?php 
define('TITLE', 'Book Labour');
define('PAGE', 'SubmitBooking');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script> location.href='UserLogin.php'</script>";
}
if(isset($_REQUEST['submitbooking'])){
    //is there any fileds empty or not
    if(($_REQUEST['bookingInfo'] == "") || ($_REQUEST['bookingDesc']== "") 
    || ($_REQUEST['userName']== "") || ($_REQUEST['useradd1']== "") 
    || ($_REQUEST['useradd2']== "") || ($_REQUEST['usercity']== "") 
    || ($_REQUEST['userstate']== "") || ($_REQUEST['userzip']== "") 
    || ($_REQUEST['useremail']== "") || ($_REQUEST['usersmobile']== "") 
    || ($_REQUEST['submitdate']== "")){
       $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Fill up all the fields</div>";
    } else {
       $binfo = $_REQUEST['bookingInfo'];
       $bdesc = $_REQUEST['bookingDesc'];
       $uname = $_REQUEST['userName'];
       $uadd1 = $_REQUEST['useradd1'];
       $uadd2 = $_REQUEST['useradd2'];
       $ucity = $_REQUEST['usercity'];
       $ustate = $_REQUEST['userstate'];
       $uzip = $_REQUEST['userzip'];
       $uemail = $_REQUEST['useremail'];
       $umobile = $_REQUEST['usersmobile'];
       $udate = $_REQUEST['submitdate'];
$sql ="INSERT INTO submitbooking_tb(booking_info, booking_desc, user_name, user_add1,
user_add2, user_city, user_state, user_zip, user_email,
user_mobile,submit_date)VALUES(' $binfo', '$bdesc', '$uname', ' $uadd1',
' $uadd2', '$ucity', '$ustate', '$uzip', ' $uemail', '$umobile','$udate' )";
if($conn->query($sql)== TRUE){
    $genid = mysqli_insert_id($conn);
    $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Your booking is submitted</div>"; 
    $_SESSION['myid']= $genid; 
    echo "<script> location.href='bookingsuccess.php'</script>";
}else{
    $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>something went wrong</div>";
}
    }
}




?>
  <div class="col-sm-9 col-md-10 mt-5" style="background-image:url(..images/2.jpeg);"><!--start submitbooking form's sec col-->
<form class="mx-5" action="" method="POST">
<div class="form-group">
    <label for="inputbookingInfo">Booking info</label>
    <input type="text" class="form-control" id="inputbookingInfo" placeholder="write your booking" name="bookingInfo">
</div>
<div class="form-group">
    <label for="inputbookingDescription">Booking Description</label>
    <input type="text" class="form-control" id="inputbookingDescription" placeholder="write description" name="bookingDesc">
</div>
<div class="form-group">
    <label for="inputName">Name</label>
    <input type="text" class="form-control" id="inputName" placeholder="Your Name" name="userName">
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputAddress1">Address 1</label>
    <input type="text" class="form-control" id="inputAddress1" placeholder="House no" name="useradd1">
    </div>
    <div class="form-group col-md-6">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Toll name" name="useradd2">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputCity">City</label>
    <input type="text" class="form-control" id="inputCity" placeholder="City name" name="usercity">
    </div>
    <div class="form-group col-md-4">
    <label for="inputState">State</label>
    <input type="text" class="form-control" id="inputState" placeholder="State name" name="userstate">
    </div>
    <div class="form-group col-md-2">
    <label for="inputzip">Zip</label>
    <input type="text" class="form-control" id="inputZip" placeholder="zipno" name="userzip" onkeypress="isInputNumber(event)">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" id="inputEmail"  name="useremail">
    </div>
    <div class="form-group col-md-2">
    <label for="inputMobile">Mobile No</label>
    <input type="text" class="form-control" id="inputmobile"  name="usersmobile" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group col-md-2">
    <label for="inputDate">Date</label>
    <input type="date" class="form-control" id="inputDate"  name="submitdate" >
    </div>
</div>
<button type="submit" class="btn btn-success" name="submitbooking">Submit</button>
<button type="reset" class="btn btn-secondary">Cancel</button>
</form>
<?php if(isset($msg)){
    echo $msg;} 
?>
  </div><!--end submitbooking form's sec col-->


  <!--numberfield-->
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
