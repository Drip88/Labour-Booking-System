<?php

include('dbConnection.php');
if(isset($_REQUEST['rSignup'])){
    if(($_REQUEST["rName"] == "") || ($_REQUEST["rEmail"] == "") || ($_REQUEST["rPassword"] == "")){
      $errmsg= '<div class="alert alert-warning mt-2" role="alert">Fill up all the Fields</div>';  
    } else{ //email already registered
      $sql= "SELECT u_email FROM userlogin_tb WHERE u_email='".$_REQUEST['rEmail']."'";
      $result = $conn->query($sql);
      if($result->num_rows==1){
          $errmsg= '<div class="alert alert-danger mt-2" 
          role="alert">Already registered</div>';
      }else{ 
$rName= $_REQUEST['rName'];
$rEmail= $_REQUEST['rEmail'];
$rPassword= $_REQUEST['rPassword'];
$sql="INSERT INTO userlogin_tb(u_name,u_email,u_password) VALUES('$rName', '$rEmail', '$rPassword')";
if($conn->query($sql) == TRUE){
    $errmsg = '<div class="alert alert-success mt-2" 
    role="alert">Account Registered</div>';
} 
else{
    $errmsg = '<div class="alert alert-warning mt-2" 
    role="alert">Unable to create account</div>';
}
      }
    }
}
?>



<div class="container pt-5" id="Registration">
    <h2 class="text-center">Create an Account</h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <form action="" class="shadow-lg p-4" method="POST">
                <div class="form-group">
                    <i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-2">Name</label> <input type="text" class="form-control" placeholder="Name" name="rName">
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i> <label for="email" class="font-weight-bold pl-2">Email</label> <input type="email" class="form-control" placeholder="Email" name="rEmail">
                    <small>Your email is safe here</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i> <label for="Password" class="font-weight-bold pl-2">New Password</label> <input type="password" id="password" class="form-control" placeholder="Password" name="rPassword">
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
                <button type="submit" class="btn btn-success mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
                <em style="font-size:13px;">Note- By clicking Sign Up, you agree to our Terms, Data Policy and Cookie Policy</em>
                
                <?php if(isset($errmsg)) {echo $errmsg;} ?>
            </form>
        </div>
</div>
</div>