<?php
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  echo "<script>window.location = '/index.php?error=login'</script>";  
} 
?>

<?php 
require_once ("CONFIG-DB.php");
$con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
if(mysqli_connect_errno($con)){
	die("Fail to connect to database :".mysqli_connect_error());
}

$BookingID = $_POST['BookingId'];
$Amount = $_POST['amount'];
  


$query1 = "UPDATE Bookings SET paid_amount ='$Amount'  WHERE 	ID = '$BookingID'";


$result1 = mysqli_query($con,$query1);


if (mysqli_query($con, $query1)) {
    echo "Record updated successfully";
		header("Location: /successfullyMsg.php?type=Pay");
} else {
    echo "Error updating record: " . mysqli_error($con);
}
	
mysqli_close($con);


?>