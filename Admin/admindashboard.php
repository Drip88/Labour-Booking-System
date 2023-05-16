<?php
define('TITLE', 'Admin Dashboard');
define('PAGE', 'Admin Dashboard');
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else {
    echo "<script> location.href='adminlogin.php'</script>";
}
include('includes/header.php');
include('../dbConnection.php');
$sql = "SELECT max(booking_id) FROM submitbooking_tb";
$result =$conn->query($sql);
$row = $result->fetch_row();
$submitbooking = $row[0];

$sql = "SELECT max(bno) FROM workassign_tb";
$result =$conn->query($sql);
$row = $result->fetch_row();
$workassign = $row[0];

$sql = "SELECT * FROM labours_tb";
$result =$conn->query($sql);
$labours = $result->num_rows;
?>


 <!---end sidebar 1st column-->
              <div class="col-sm-9 col-md-10"><!--start dashboard sec col-->
                   <div class="row text-center mx-5">
                       <div class="col-sm-4 mt-5">
                           <div class="card text-white bg-success mb-3 " style="max-width:18rem;">
                               <div class="card-header">Bookings Recieved</div>
                                <div class="card-body">
                                <h4 class="card-title"><?php echo $submitbooking; ?></h4>
                                <a class="btn text-white" href="book.php">View</a>
                                </div>
                           </div>

                       </div>
                       <div class="col-sm-4 mt-5">
                           <div class="card text-white bg-primary mb-3 " style="max-width:18rem;">
                               <div class="card-header">Work assigned</div>
                                <div class="card-body">
                                <h4 class="card-title"><?php echo $workassign; ?></h4>
                                <a class="btn text-white" href="work.php">View</a>
                                </div>
                           </div>

                       </div>
                       <div class="col-sm-4 mt-5">
                           <div class="card text-white bg-dark mb-3 " style="max-width:18rem;">
                               <div class="card-header">Numbers of labours</div>
                                <div class="card-body">
                                <h4 class="card-title"><?php echo $labours; ?></h4>
                                <a class="btn text-white" href="labours.php">View</a>
                                </div>
                           </div>

                       </div>

                   </div>
                      <div class="mx-5 mt-5 text-center">
                          <p class="bg-dark text-white">List of Users</p>
                          <?php 
                          $sql ="SELECT * FROM userlogin_tb";
                          $result = $conn->query($sql);
                          if($result->num_rows > 0){
                              echo '
                              <table class="table">
                              <thead>
                              <tr>
                              <th scope="col">User ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Email</th>
                              </tr>
                              </thead>
                              <tbody>';
                              while($row = $result->fetch_assoc()){
                                  echo '<tr>';
                                  echo '<td>'.$row["u_login_id"].'</td>';
                                  echo '<td>'.$row["u_name"].'</td>';
                                  echo '<td>'.$row["u_email"].'</td>';
                                  echo '</tr>';
                              }
                              echo '</tbody>

                              </table>';
                            } else{
                                echo '0Result';
                            }
                              
                        
                          
                          
                          ?>
                      </div>
              </div><!--end dashboard sec col-->
          
<?php include('includes/footer.php')?>