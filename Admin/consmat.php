<?php 
define('TITLE', 'Materials');
define('PAGE', 'consmat');
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
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class="bg-success text-White p-2">Construction Materials Details</p>
<?php 
$sql ="SELECT * FROM constmat_tb";
$result = $conn->query($sql);
if($result->num_rows > 0){
  echo '<table class="table">';
  echo '<thead>';
  echo '<tr>';
  echo '<th scope="col">Product ID</th>';
  echo '<th scope="col">Name</th>';
  echo '<th scope="col">Date of Purchase</th>';
  echo '<th scope="col">Available</th>';
  echo '<th scope="col">Total</th>';
  echo '<th scope="col">Original price</th>';
  echo '<th scope="col">selling Price</th>';
  echo '<th scope="col">Action</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
    while ($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row['mid'].'</td>';
        echo '<td>'.$row['mname'].'</td>';
        echo '<td>'.$row['mdop'].'</td>';
        echo '<td>'.$row['mava'].'</td>';
        echo '<td>'.$row['mtotal'].'</td>';
        echo '<td>'.$row['moriginalcost'].'</td>';
        echo '<td>'.$row['msellingcost'].'</td>';
        echo '<td>';
        echo '<form action="editmaterials.php" method="POST" class="d-inline mr-2">';
        echo '<input type="hidden" name="id" value='.$row['mid'].'><button type="submit" class="btn btn-success mr-3" name="edit" value="Edit" type="submit"><i class="fas fa-pen"></i></button>';
        echo '</form>';
        echo '<form action="" method="POST" class="d-inline">';
        echo '<input type="hidden" name="id" value='.$row['mid'].'><button type="submit" class="btn btn-secondary" name="remove" value="Remove"><i class="fas fa-trash-alt"></i></button>';
        echo '</form>';
        echo '<form action="sellproduct.php" method="POST" class="d-inline mr-2">';
        echo '<input type="hidden" name="id" value='.$row['mid'].'><button type="submit" class="btn btn-info mr-3" name="sell" value="sell" type="submit"><i class="fas fa-handshake"></i></button>';
        echo '</form>';
        echo '</td>';

        echo '</tr>';
    }
    echo '<tbody>';
  echo '</table>';
}else{
    echo '0 Result';
}
?>
</div>
<?php if(isset($_REQUEST['remove'])){
    $sql = "DELETE FROM constmat_tb WHERE mid= {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />'; 
    }else{
        echo "Failed to Remove";
    } 
    }
    ?>
    </div> <!--end row-->
    <div class="float-right"><a href="addmaterials.php" 
    class="btn btn-success" > 
    <i class="fas fa-plus fa-2x"></i></a></div>

        </div>  <!---end container-->

<!---javascript--->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>



</body>
</html>









