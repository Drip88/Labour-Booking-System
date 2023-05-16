<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!--bootstrapcss-->
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="../css/custom.css">

    <style>
  body{
  
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;
}
  
</style>
   
    <title><?php echo TITLE ?></title>
   
</head>
<body>
    <!--navbar-->
    <nav class="navbar navbar-dark fixed-top bg-success flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="UserProfile.php">MAZDUR</a></nav>
         <!--container-->
        <div class="container-fluid" style="margin-top:40px;height:100%">
            <div class="row"> <!--start row-->
                <nav class="col-sm-2 bg-light sidebar py-5 d-print-none" style="height:700px"> <!---sidebar--> 
                    <!---1st column--> 
                    <div class="sidebar-sticky" >
                        <ul class="nav flex-column"  >
                        <li class="nav-item">
                                <a class="nav-link active" style="color:#0e0e0e;font-size: 18px"  href="UserProfile.php">
                                    <i class="fas fa-user"></i>Profile
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:#0e0e0e;font-size: 18px"   href="SubmitBooking.php">
                                    <i class="fas fa-book"></i>Submit Booking
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"style="color:#0e0e0e;font-size: 18px"  href="CheckStatus.php">
                                    <i class="fas fa-check"></i>Service status
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:#0e0e0e;font-size: 18px"  href="UserPassChange.php">
                                    <i class="fas fa-key"></i> Change password
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:#0e0e0e;font-size: 18px"  href="../logout.php">
                                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>Logout
                                </a>
                            </li>


                        </ul>
                    </div>
              </nav> <!---end sidebar 1st column-->
                 





