<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    
    

    <title>MAZDUR</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-success pl-5 fixed-top" style="background-colour: #0030ff;margin-bottom:0px;">
        <a href="index.php" class="navbar-brand" style="margin-right:25px">MAZDUR</a>
        <span class="navbar-text" style="margin-right: 40px;color:#ffffff">Providing services to your homes</span>
   <button type="button" class="navbar-toggler"
   data-toggle="collapse" data-target="#myMenu">
   <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="myMenu">
    <ul class="navbar-nav pl-5">
        <li class="nav-item" style="margin-right:35px"><a href="index.php"
        class="nav-link" style="color:#ffffff">Home</a> </li>
        <li class="nav-item" style="margin-right:35px"><a href="#Services"
        class="nav-link" style="color:#ffffff">Services</a> </li>
        <li class="nav-item" style="margin-right:35px"><a href="#Registration"
        class="nav-link" style="color:#ffffff">Registration</a> </li>
        <li class="nav-item" style="margin-right:35px"><a href="User/UserLogin.php"
        class="nav-link" style="color:#ffffff">Login</a> </li>
        <li class="nav-item" style="margin-right:35px"><a href="#contactus"
        class="nav-link" style="color:#ffffff">Contact Us</a> </li>
        
        

    </ul>
</div>

    </nav>
 <header class="jumbotron back-image" style="background-image:url(images/11.png); background-repeat: no-repeat; background-size: cover; height: 79vh; display: flex; flex-direction: column; justify-content: flex-end; align-items: center;">
 <div class="myClass mainHeading text-center">
        <h1 style="font-size: 33px; font-weight: bold;" class="text-uppercase text-success">Book Labours</h1>
        <p class="font-italic pclass" style="font-weight: bold; font-size: 19px;">Providing Services to your homes</p>
        <a href="User/UserLogin.php" class="btn btn-success mr-4">Login</a>
        <a href="#Registration" class="btn btn-danger mr-4">Sign Up</a> 
        
    </div>
</header>

<!-- start intro section-->

<div class="container" id="Services">
    <div class="jumbotron">
        <br>
     <h2 class="text-center">About our Website</h2> 
     <p>
     Nowadays it is very difficult to find workers. At the same time, people are
searching easiest way to do whatever they want, so this labor booking system can
be very helpful in finding workers. Many people are now unemployed in Nepal, so,
this app can be very helpful for them to find employment. Labor booking system is
a web application that allows anybody to book any type of service provider/labor
for any type of building project. Anyone may book labor at any moment using the
web application's online booking system. We may schedule any type of labor, such
as plumbers, construction workers, mistri, electricians, tile fixers, and so on. We
may also order any type of hardware product/construction material through the
service provider online application. This system contains two key players: the
demand/consumer (employers looking for manpower) and the supply (manpower
looking for deployment), both of whom rely on one another to satisfy their
respective requirements. This software also provides jobs to individuals in need. 
     </p>  
    </div>
</div> <!-- end intro section-->



<!--start services-->
<div class="container text-center border-bottom" >
    <h2>Our Services</h2>
    <div class="row mt-4">
        <div class="col-sm-4 mb-4">
            <a href="#"><i class="fas fa-tv fa-8x text-danger"></i></a>
            <h4 class="mt-4">Electricians</h4>
            <a class="btn text-success" href="User/SubmitBooking.php">Book Now</a>
        </div>
        <div class="col-sm-4 mb-4">
            <a href="#"><i class="fas fa-building fa-8x text-primary"></i></a>
            <h4 class="mt-4">Labours,Mistri,helpers</h4>
            <a class="btn text-success" href="User/SubmitBooking.php">Book Now</a>
        </div>
        <div class="col-sm-4 mb-4">
            <a href="#"><i class="fas fa-wrench fa-8x text-success"></i></a>
            <h4 class="mt-4">Fault repairs, plumbers</h4>
            <a class="btn text-success" href="User/SubmitBooking.php">Book Now</a>
        </div>
</div>
</div> <!--end services-->

<!--start registration form-->
<?php include('UserRegistration.php') ?>
<!---end of registration form--->

<!---start happy customer--->
<div class="jumbotron bg-success">
    <div class="container">
        <h2 class="text-center text-white">Happy customers</h2>
    <div class="row">
        <div class="col-lg-3 col-sm-6"> <!--start frst col-->
            <div class="card shadow-lg mb-2">
                <div clas="card-body text-center">
                    <img src="images/person2.jpg" class="img-fluid" style="border-radius:100px;" alt="per2">
                    <h4 class="card-title">Maya Khadka</h4>
                    <p class="card-text">I want to thank mazdur. They did their job very best!</p>

                </div>
            </div>
        </div> <!--end first col--->
        <div class="col-lg-3 col-sm-6"> <!--start second col-->
            <div class="card shadow-lg mb-2">
                <div clas="card-body text-center">
                    <img src="images/person4.jpg" class="img-fluid" style="border-radius:100px;" alt="per2">
                    <h4 class="card-title">Rajesh Hamal</h4>
                    <p class="card-text">I am very satisfied with mazdur.com . I will do my further worked with them !</p>

                </div>
            </div>
        </div> <!--end second col--->
        <div class="col-lg-3 col-sm-6"> <!--start third col-->
            <div class="card shadow-lg mb-2">
                <div clas="card-body text-center">
                    <img src="images/person5.jpg" class="img-fluid" style="border-radius:100px;" alt="per2">
                    <h4 class="card-title">Rekha Thapa</h4>
                    <p class="card-text"> Labor did a great job . The management system is very great !</p>

                </div>
            </div>
        </div> <!--end third col--->
        <div class="col-lg-3 col-sm-6"> <!--start fourth col-->
            <div class="card shadow-lg mb-2">
                <div clas="card-body text-center">
                    <img src="images/person6.jpg" class="img-fluid" style="border-radius:100px;" alt="per2">
                    <h4 class="card-title">Anmol KC</h4>
                    <p class="card-text"> I did my renovation work .Mazdur.com did my work so fast and so good !</p>

                </div>
            </div>
        </div> <!--end fourth col--->
    </div>
    </div>
</div> <!--end happy customer-->


<!--start contact us-->
<div class="container" id="contactus">
    <h2 class="text-center mb-4">Contact Us</h2>
    <div class="row">
        <!--start frst col-->
        <?php include('contactform.php') ?>
        <!--endfrst col-->
        <div class="col-md-4 text-center"> <!--start sec col-->
        <strong>Headquater:</strong><br>
        MAZDUR pvt Ltd, <br>
        Naxal, Kathmandu <br>
        Phone:01723664 <br>
        <a href="#" target="blank">www.mazdur.com</a><br>
        <br> <br>
        <strong>Branch:</strong><br>
        MAZDUR pvt Ltd, <br>
        Pepsicola, Kathmandu <br>
        phone:01763784 <br>
        <a href="#" target="blank">www.mazdur.com</a><br>
        </div><!--end sec col-->
    </div>
</div> <!--contact us-->

<!--start footer-->
<footer class="container-fluid bg-dark mt-5 text-white">
   <div class="container">
       <div class="row py-3">
           <div class="col-md-6"> <!--start frst col-->
           <span class="pr-2">Follow Us:</span>
           <a href="#" target="_blank" class="pr-2 fi-color"><i style="color: #3c763d;" class="fab fa-facebook-f"></i></a>
           <a href="#" target="_blank" class="pr-2 fi-color"><i style="color: #3c763d;" class="fab fa-twitter"></i></a>
           
           </div> <!--end frst col-->
           <div class="col-md-6 text-right"> <!--start sec col-->
           <small>Designed by Pukar Raj Katwal &copy; 2023</small>
           <small class="ml-2"><a style="color: #3c763d;" href="Admin/adminlogin.php">Admin Login</a></small>

           </div> <!--end sec col-->

       </div>

   </div>


</footer>



    <!---javascript--->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
    
</body>
</html>