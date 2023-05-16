<?php
   require "../dbConnection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\PHPMailer-master\src\Exception.php';
require 'C:\xampp\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\PHPMailer-master\src\SMTP.php';
      if (session_id() == "") {
       session_start();
   }
   if (isset($_SESSION["is_adminlogin"])) {
       $aEmail = $_SESSION["aEmail"];
   } else {
       echo "<script> location.href='adminlogin.php'</script>";
   }
   if (isset($_REQUEST["view"])) {
       $sql = "SELECT * FROM submitbooking_tb WHERE booking_id={$_REQUEST["id"]}";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
   }
   if (isset($_REQUEST["close"])) {
       $sql = "DELETE FROM submitbooking_tb WHERE booking_id = {$_REQUEST["id"]}";
       if ($conn->query($sql) == true) {
           echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
       } else {
           echo "Unable to Delete";
       }
   }
   if (isset($_REQUEST["assign"])) {
       if (
           $_REQUEST["booking_id"] == "" ||
           $_REQUEST["bookingInfo"] == "" ||
           $_REQUEST["bookingDesc"] == "" ||
           $_REQUEST["userName"] == "" ||
           $_REQUEST["useradd1"] == "" ||
           $_REQUEST["useradd2"] == "" ||
           $_REQUEST["usercity"] == "" ||
           $_REQUEST["userstate"] == "" ||
           $_REQUEST["userzip"] == "" ||
           $_REQUEST["useremail"] == "" ||
           $_REQUEST["usersmobile"] == "" ||
           $_REQUEST["assignlabour"] == "" ||
           $_REQUEST["submitdate"] == ""
       ) {
           $msg =
               '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fields should not be empty</div>';
       } else {
           $bid = $_REQUEST["booking_id"];
           $binfo = $_REQUEST["bookingInfo"];
           $bdesc = $_REQUEST["bookingDesc"];
           $uname = $_REQUEST["userName"];
           $uadd1 = $_REQUEST["useradd1"];
           $uadd2 = $_REQUEST["useradd2"];
           $ucity = $_REQUEST["usercity"];
           $ustate = $_REQUEST["userstate"];
           $uzip = $_REQUEST["userzip"];
           $uemail = $_REQUEST["useremail"];
           $umobile = $_REQUEST["usersmobile"];
           $assign = $_REQUEST["assignlabour"];
           $udate = $_REQUEST["submitdate"];
           $sql = "INSERT INTO workassign_tb (booking_id,booking_info,booking_desc,user_name,user_add1,
          user_add2,user_city,user_state,user_zip,user_email,
          user_mobile,assign_labour,assign_date)VALUES('$bid','$binfo', '$bdesc', '$uname', ' $uadd1',
          '$uadd2', '$ucity', '$ustate', '$uzip', '$uemail', '$umobile','$assign','$udate')";
           if ($conn->query($sql) == true) {
                $msg ='<div class="alert alert-success col-sm-6 ml-5 mt-2">Work has been assigned completely </div>'; 

                //sending email
      $assign= $_REQUEST["assignlabour"];
      $sql2 = "SELECT empEmail FROM labours_tb WHERE empName = '$assign'";

      $result2 = $conn->query($sql2);
      if ($result2->num_rows > 0) {
         while($row = $result2->fetch_assoc()) {
            $email = $row["empEmail"];
         }
    $mail = new PHPMailer();
    //$mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->Username = 'Pukarkatwal1000@gmail.com';
    $mail->Password = 'vidgouyqfdfrmmrb';
    $mail->addAddress($email);
    $mail->setFrom('Pukarkatwal1000@gmail.com', 'Mazdur.com');  
    $mail->isHTML(true);                                 
    $mail->Subject = 'Labor Assigned';
    $mail->Body    = '<div> ' .'Booking ID : ' . $_REQUEST["booking_id"] . '</div> </ br>'.
    '<div> ' .'Booking Info: ' . $_REQUEST["bookingInfo"]. '</div> </ br>'.
    '<div> ' .'Booking Description : ' . $_REQUEST["bookingDesc"]. '</div> </ br>'.
    '<div> ' .'UserName: ' . $_REQUEST["userName"]. '</div> </ br>'.
    '<div> ' .'Address 1 : ' . $_REQUEST["useradd1"]. '</div> </ br>'.
    '<div> ' .'Address 2 : ' . $_REQUEST["useradd2"]. '</div> </ br>'.
    '<div> ' .'City : ' . $_REQUEST["usercity"]. '</div> </ br>'.
    '<div> ' .'State : ' .  $_REQUEST["userstate"]. '</div> </ br>'.
    '<div> ' .'Zipcode : ' .  $_REQUEST["userzip"]. '</div> </ br>'.
    '<div> ' .'Useremail: ' . $_REQUEST["useremail"]. '</div> </ br>'.
    '<div> ' .'User mobile: ' . $_REQUEST["usersmobile"]. '</div> </ br>'.
    '<div> ' .'Assgined Labour: ' . $_REQUEST["assignlabour"]. '</div> </ br>'.
    '<div> ' .'Submit Date : ' .  $_REQUEST["submitdate"] . '</div> </ br>' ;

    $mail->AltBody = 'None';
    if($mail->send()){
      $msg = $msg . "Email sent successfully to labour";
    };

  } else {
    echo "0 results";
    echo "No email found. Please Try again";
  }       
           }   
        }
    }
   
   ?>
<div class="col-sm-5  mt-5 jumbotron">
   <!--start assignwork 3rd col col-->
   <form class="mx-5" action="" method="POST">
      <h5 class="text-center">Work Assign Order Booking</h5>
      <div class="form-group">
         <label for="booking_id">Booking ID</label>
         <input type="text" class="form-control" id="booking_id" name="booking_id" value="<?php if (
            isset($row["booking_id"])
            ) {
            echo $row["booking_id"];
            } ?>" readonly>
      </div>
      <div class="form-group">
         <label for="inputbookingInfo">Booking info</label>
         <input type="text" class="form-control" id="inputbookingInfo" placeholder="write your booking" name="bookingInfo" value="<?php if (
            isset($row["booking_info"])
            ) {
            echo $row["booking_info"];
            } ?>">
      </div>
      <div class="form-group">
         <label for="inputbookingDescription">Booking Description</label>
         <input type="text" class="form-control" id="inputbookingDescription" placeholder="write description" name="bookingDesc" value="<?php if (
            isset($row["booking_desc"])
            ) {
            echo $row["booking_desc"];
            } ?>">
      </div>
      <div class="form-group">
         <label for="inputName">Name</label>
         <input type="text" class="form-control" id="inputName" placeholder="Your Name" name="userName" value="<?php if (
            isset($row["user_name"])
            ) {
            echo $row["user_name"];
            } ?>">
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="inputAddress1">Address 1</label>
            <input type="text" class="form-control" id="inputAddress1" placeholder="House no" name="useradd1" value="<?php if (
               isset($row["user_add1"])
               ) {
               echo $row["user_add1"];
               } ?>">
         </div>
         <div class="form-group col-md-6">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Toll name" name="useradd2" value="<?php if (
               isset($row["user_add2"])
               ) {
               echo $row["user_add2"];
               } ?>">
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" placeholder="City name" name="usercity" value="<?php if (
               isset($row["user_city"])
               ) {
               echo $row["user_city"];
               } ?>">
         </div>
         <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <input type="text" class="form-control" id="inputState" placeholder="State name" name="userstate" value="<?php if (
               isset($row["user_state"])
               ) {
               echo $row["user_state"];
               } ?>">
         </div>
         <div class="form-group col-md-2">
            <label for="inputzip">Zip</label>
            <input type="text" class="form-control" id="inputZip" placeholder="zipno" name="userzip"   value="<?php if (
               isset($row["user_zip"])
               ) {
               echo $row["user_zip"];
               } ?>" onkeypress="isInputNumber(event)">
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail"  name="useremail" value="<?php if (
               isset($row["user_email"])
               ) {
               echo $row["user_email"];
               } ?>">
         </div>
         <div class="form-group col-md-2">
            <label for="inputMobile">Mobile No</label>
            <input type="text" class="form-control" id="inputmobile"  name="usersmobile"   value="<?php if (
               isset($row["user_mobile"])
               ) {
               echo $row["user_mobile"];
               } ?>" onkeypress="isInputNumber(event)">
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-6">
            <label for="assignlabour">Assign to Labour</label>
            <input type="text" class="form-control" id="assignlabour" name="assignlabour" >
         </div>
         <div class="form-group col-md-6">
            <label for="inputDate">Date</label>
            <input type="date" class="form-control" id="inputDate"  name="submitdate"  >
         </div>
      </div>
      <div class="float-right">
         <button type="submit" class="btn btn-success" name="assign">Assign</button>
         <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
   </form>
   <?php if (isset($msg)) {
      echo $msg;
 
    
      } ?>
</div>
<!--end work assign 3rd col--> 
<!--numberfield-->
<script>
   function isInputNumber(evt){
       var ch= String.formCharCode(evt.which);
       if(!(/[0-9]/.test(ch))){
           evt.preventDefault();
   
       }
   }
</script>