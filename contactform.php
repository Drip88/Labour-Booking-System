<?php
if(isset($_REQUEST['submit'])){
    if(($_REQUEST['name'] == "") || ($_REQUEST['subject'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['message'] == "")){
      $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fields should not be empty</div>';
    }else{
        $name = $_REQUEST['name'];
        $subject = $_REQUEST['subject'];
        $email = $_REQUEST['email'];
        $message = $_REQUEST['message'];

        $mailTo = $email;
        $headers = "From: Pukarkatwal1000@gmail.com";
            $txt = "Recieved an email from ". $name. ".\n\n".$message;
            mail($mailTo, $subject, $txt, $headers);
            $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">successfully sent</div>';
        }
    }

?>






<div class="col-md-8">
<form action="" method="POST">
            <input type="text" class="form-control" name="name" placeholder="Name"><br>
            <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
            <input type="email" class="form-control" name="email" placeholder="Email"><br>
            <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;"></textarea><br>
            <input type="submit" class="btn btn-success" value="Send" name="submit"><br><br>
        </form>

        </div>