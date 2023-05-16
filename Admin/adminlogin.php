
<?php 
include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_adminlogin'])){
if(isset($_REQUEST['aEmail'])){
$aEmail = mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
$aPassword =mysqli_real_escape_string($conn,trim($_REQUEST['aPassword']));
$sql="SELECT a_email, a_password FROM adminlogin_tb WHERE a_email='".$aEmail."' AND a_password='".$aPassword."' limit 1";
$result=$conn->query($sql);
if($result->num_rows == 1){
  $_SESSION['is_adminlogin'] = true;
  $_SESSION['aEmail'] = $aEmail;
  echo  "<script> location.href='admindashboard.php';</script>";
  exit;
} else{
  $msg= '<div class="alert alert-warning mt-2">invalid password or email</div>';
}
} 
}else{
  echo "<script> location.href='admindashboard.php';</script>";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrapcsss-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="../css/all.min.css">
<style>
  body{
  background-image: url("../images/17.png");
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;
}
  
</style>
    <title>Login</title>
</head>
<body >
  <div class="mb-3 mt-5 text-center text-success  font-weight-bold custom-body " style="font-size: 35px;">
  <i class="fas fa-user"></i>
      <span>Labour Booking System</span>

  </div> 
  <p class="text-center text-success font-weight-bold " style="font-size:25px;"> <i class="fas fa-user-secret text-success" ></i> Admin Login Page</p> 
  <div class="container-fluid">
    <div class="row justify-content-center mt-5">
      <div class="col-sm-6 col-md-4">
        <form action="" class="shadow-lg p-4 bg-light" method="POST">
          <div class="form-group">
            <i class="fas fa-user"></i> <label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" placeholder="Email" name="aEmail">
          <small class="form-text">Emails are secured.</small>
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i> <label for="password" class="font-weight-bold pl-2">Password</label><input id="password" type="password" class="form-control" placeholder="Password" name="aPassword">
            <input type="checkbox" onclick="myFunction()">Show Password
   <script>
      function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  } 
}
      </script>

          </div>
          <button type="submit" class="btn btn-outline-success mt-3 font-weight-bold btn-block shadow-sm">Login</button>
          <?php 
          if(isset($msg)) {echo $msg;} 
          
          ?>

        </form>
<div class="text-center"><a href="../index.php" class="btn btn-dark mt-3 font-weight-bold shadow-sm">Back</a></div>
      </div>

    </div>
  </div>

  <!--jsfiles-->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>
</html>