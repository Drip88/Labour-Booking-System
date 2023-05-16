<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?> </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    
</head>
<body>
    <!--navbar-->
    <nav class="navbar navbar-dark fixed-top bg-success flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="admindashboard.php">MAZDUR</a></nav>
          <!--container-->
          <div class="container-fluid" style="margin-top:40px;">
            <div class="row" > <!--start row-->
                <nav class="col-sm-2 bg-light sidebar py-5 d-print-none" > <!---sidebar--> 
                    <!---1st column--> 
                    <div class="sidebar-sticky" >
                        <ul class="nav flex-column"  >
                        <li class="nav-item">
                                <a class="nav-link <?php if(PAGE == 'Admin Dashboard'){echo 'active';} ?>" style="color:#0e0e0e;font-size: 16px"  href="admindashboard.php">
                                    <i class="fas fa-tachometer-alt"></i>Admin Dashboard
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(PAGE == 'Work Order'){echo 'active';} ?>" style="color:#0e0e0e;font-size: 16px"  href="work.php">
                                    <i class="fas fa-book"></i>Work Order
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(PAGE == 'Bookings'){echo 'active';} ?>" style="color:#0e0e0e;font-size: 16px" href="book.php">
                                    <i class="fas fa-check"></i>Book
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(PAGE == 'Construction Materials'){echo 'active';} ?>" style="color:#0e0e0e;font-size: 16px" href="consmat.php">
                                    <i  class="fas fa-hammer"></i> Construction Materials
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(PAGE == 'Labours'){echo 'active';} ?>" style="color:#0e0e0e;font-size: 16px" href="labours.php">
                                    <i class="fas fa-id-card" aria-hidden="true"></i>Labours
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(PAGE == 'Users'){echo 'active';} ?>" style="color:#0e0e0e;font-size: 16px" href="users.php">
                                    <i class="fas fa-users" aria-hidden="true"></i>Users
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(PAGE == 'Material Report'){echo 'active';} ?>" style="color:#0e0e0e;font-size: 16px" href="soldmatrep.php">
                                    <i class="fas fa-table" aria-hidden="true"></i>Material Report
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ?php if(PAGE == 'Work Report'){echo 'active';} ?>" style="color:#0e0e0e;font-size: 16px" href="workreport.php">
                                    <i class="fas fa-table" aria-hidden="true"></i>Work Report
                                </a>
                                <br>
                            </li>
                           
                
                            <li class="nav-item">
                                <a class="nav-link ?php if(PAGE == 'Change Password'){echo 'active';} ?>" style="color:#0e0e0e;font-size: 16px" href="Changepass.php">
                                    <i class="fas fa-key"></i> Change password
                                </a>
                                <br>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:#0e0e0e;font-size: 16px" href="../index.php">
                                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>Logout
                                </a>
                            </li>


                        </ul>
                    </div>
              </nav>