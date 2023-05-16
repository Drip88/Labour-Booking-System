<?php 
define('TITLE', 'Add');
define('PAGE', 'adduser');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else {
    echo "<script>location.href='adminlogin.php'</script>";
}
include('includes/header.php');
include('../dbConnection.php');
if(isset($_REQUEST['adduser'])){
    if(($_REQUEST['u_name'] == "") || ($_REQUEST['u_email'] == "") || ($_REQUEST['u_password'] == "")){
      $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fields should not be empty</div>';
    }else{
        $uname = $_REQUEST['u_name'];
        $uemail = $_REQUEST['u_email'];
        $upass = $_REQUEST['u_password'];
        $sql = "INSERT INTO userlogin_tb(u_name, u_email, u_password)  VALUES ('$uname','$uemail','$upass')";
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
    <h3 class="text-center">Add New Users</h3>

<form action="" method="POST">
            
            <div class="form-group">
                <label for="u_name">Name</label>
                <input type="text" name="u_name" class="form-control" id="u_name" 
                name="u_name" >
            </div>
            <div class="form-group">
                <label for="u_email">Email</label>
                <input type="email" name="u_email" class="form-control" id="u_email" 
                name="u_email">
            </div>
            <div class="form-group">
                <label for="u_password">Password</label>
                <input type="password" name="u_password" class="form-control" id="u_password" 
                name="u_password">
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-success" 
                id="adduser" name="adduser">Add</button>
                <a href="users.php" class="btn btn-secondary">Cancel</a>
             
            </div>
            <?php if(isset($msg)) {echo $msg;} ?>
        </form> 
</div>


<!--end sec col--->





<?php include('includes/footer.php'); ?>