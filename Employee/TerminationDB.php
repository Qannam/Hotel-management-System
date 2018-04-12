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

$RoomNumber = $_POST['RoomNumber'];
  


$query1 = "UPDATE Bookings SET EndDate = '".date("Y-m-d")."' , Booking_status ='finish'  WHERE 	ID = '$BookingID'";
$query2 = "UPDATE Room SET roomstatus = 'Cleaning' , Occupiedby = NULL  WHERE 	Number = '$RoomNumber'";


$result1 = mysqli_query($con,$query1);
$result2 = mysqli_query($con,$query2);


if (mysqli_query($con, $query1) && mysqli_query($con, $query2) ) {
    echo "Record updated successfully";
		header("Location: /successfullyMsg.php?type=Termination");
} else {
    echo "Error updating record: " . mysqli_error($con);
}
	
mysqli_close($con);


?>