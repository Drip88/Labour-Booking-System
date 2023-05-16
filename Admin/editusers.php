<?php 
define('TITLE', 'Edit');
define('PAGE', 'users');
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
    <h3 class="text-center">Update Users Details</h3>
    <?php 
    if(isset($_REQUEST['edit'])){
        $sql = "SELECT * FROM userlogin_tb WHERE u_login_id={$_REQUEST['id']}";
        $result =$conn->query($sql);
        $row = $result->fetch_assoc();
       
    }
    if(isset($_REQUEST['userupdate'])){
        if(($_REQUEST['u_login_id'] == "") || 
        ($_REQUEST['u_name'] == "") || ($_REQUEST['u_email'] == "")){
          $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fields should not be empty</div>';
        }else{
            $uid = $_REQUEST['u_login_id'];
            $uname = $_REQUEST['u_name'];
            $uemail = $_REQUEST['u_email'];
            $sql = "UPDATE userlogin_tb SET u_login_id = '$uid', 
            u_name= '$uname', u_email = '$uemail' WHERE u_login_id = '$uid'";
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
                <label for="u_login_id">User Id</label>
                <input type="text" name="u_login_id" class="form-control" id="u_login_id" 
                Value="<?php if(isset($row['u_login_id'])){echo $row['u_login_id']; } ?>" readonly>
            </div>
            <div class="form-group">
                <label for="u_name">Name</label>
                <input type="text" name="u_name" class="form-control" id="u_name" 
                Value="<?php if(isset($row['u_name'])){echo $row['u_name']; } ?>" >
            </div>
            <div class="form-group">
                <label for="u_email">Email</label>
                <input type="email" name="u_email" class="form-control" id="u_email" 
                Value="<?php if(isset($row['u_email'])){echo $row['u_email']; } ?>">
            </div>
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-success" 
                id="userupdate" name="userupdate">Update</button>
                <a href="users.php" class="btn btn-secondary">Cancel</a>
             
            </div>
            <?php if(isset($msg)) {echo $msg;} ?>
        </form> 

</div>
<!--start sec col-->

<?php include('includes/footer.php') ?>