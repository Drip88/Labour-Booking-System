<?php 
define('TITLE', 'Material Report');
define('PAGE', 'soldmatrep');
session_start();
if($_SESSION['is_adminlogin']){
    $rEmail=$_SESSION['aEmail'];
}else{
    echo "<script> location.href='adminlogin.php'</script>";
}
include('includes/header.php');
include('../dbConnection.php');

?>
<!--start sec col-->
<div class="col-sm-9 col-md-10 mt-5 text center">
    <form action="" method="POST" >
        <div class="form-row">
            <div class="form-group col-md-2 d-print-none">
                <input type="date" class="form-control"
                id="start" name="start">
            </div> <span class="d-print-none"> to </span>
            <div class="form-row">
            <div class="form-group col-md-2 d-print-none">
                <input type="date" class="form-control"
                id="end" name="end">
            </div>
            <div class="form-group d-print-none">
                <input type="submit" class="btn btn-secondary" name="search" value="Search">

            </div>
        </div>
    </form>
    <?php
    if(isset($_REQUEST['search'])){
        $start =$_REQUEST['start'];
        $end =$_REQUEST['end'];
        $sql = "SELECT * FROM customer_tb WHERE cpdate BETWEEN '$start' AND '$end' ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
        echo '<p class="bg-dark text-white p-2 mt-4">Drtails</p>';
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Customer ID</th>';
        echo '<th scope="col"> Name</th>';
        echo '<th scope="col">Address</th>';
        echo '<th scope="col">Product Name</th>';
        echo '<th scope="col">Quantity</th>';
        echo '<th scope="col">Price Each</th>';
        echo '<th scope="col">Total</th>';
        echo '<th scope="col">Date</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while($row = $result->fetch_assoc()){
            echo '<tr>';
            echo '<td>'.$row['cid'].'</td>';
            echo '<td>'.$row['cname'].'</td>';
            echo '<td>'.$row['cadd'].'</td>';
            echo '<td>'.$row['cpname'].'</td>';
            echo '<td>'.$row['cpquant'].'</td>';
            echo '<td>'.$row['cpeach'].'</td>';
            echo '<td>'.$row['cptotal'].'</td>';
            echo '<td>'.$row['cpdate'].'</td>';
            echo '</tr>';
        }
        echo '<tr>';
        echo '<td>';
        echo '<input type="submit" class="btn btn-success d-print-none" value="Print" onClick="window.print()">';
        echo '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
    }else{
        echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> Records Not Found!</div>";

    }
}

    ?>
</div>









<?php include('includes/footer.php')?>