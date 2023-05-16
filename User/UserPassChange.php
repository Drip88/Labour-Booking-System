<?php 
define('TITLE', 'Change Password');
define('PAGE', 'UserPassChange');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script> location.href='UserLogin.php'</script>";
}
if(isset($_REQUEST['passupdate'])){
    if($_REQUEST['rPassword'] == ""){
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fields should not be empty</div>';
    }else{
        $rPass = $_REQUEST['rPassword'];
        $sql = "UPDATE userlogin_tb SET u_password = '$rPass' WHERE u_email = '$rEmail'";
        if($conn->query($sql) == TRUE){
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Password Updated Successfully</div>';
        }else{
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Something went wrong</div>';
        }
    }
   
}


?>
<div class="col-sm-9 col-md-10"> <!----start user change password form sec col--->
<form class="mt-5 mx-5" action="" method="POST">
    <div class="form-group">
        <label for="inputEmail">Email</label>
        <input type="email" class="frm-control" id="inputEmail" value="<?php echo $rEmail ?>" readonly>

    </div>
    <div class="form-group">
      <label for="inputnewpassword">New Password</label>
      <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="rPassword">



    </div>
    <button type="submit" class="btn btn-success mr-4 mt-4" name="passupdate">Change</button>
    <button type="reset" class="btn btn-secondary mt-4">Reset</button>
<?php if(isset($passmsg)){echo $passmsg;} ?> 

</form>
</div><!----end user change password form sec col--->
<?php 
include('includes/footer.php');

?>