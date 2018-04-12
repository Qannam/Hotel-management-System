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

$roomnumber = $_POST['roomnumber'];
$cost = $_POST['rate'];
$customerNumber = $_POST['customerName'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$empID = $_POST['empID'];

$query = "INSERT INTO Bookings VALUES ('','$roomnumber', '$customerNumber', '$cost', '$startDate', '$endDate', '$empID' ,'still' , 0)";

if(mysqli_query($con,$query)){
	
  $query2 = "UPDATE Room SET roomstatus = 'Rented' , Occupiedby ='$customerNumber' WHERE Number = '$roomnumber'";

  if(mysqli_query($con,$query2)){
    
                mysqli_close();
		header("Location: Reservations.php");
  }
  	else echo "2";

	}
			else echo "1";	


?>