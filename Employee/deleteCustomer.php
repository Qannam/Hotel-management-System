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

$SID = $_GET['sid'];

// here I will check if the customer has room because I cannot delete him  
$checkQuery = "SELECT Number FROM Room WHERE Occupiedby ='$SID'";
$checkResult = mysqli_query($con,$checkQuery);
if (mysqli_num_rows($checkResult) > 0) {
    mysqli_close($con);
		header("Location: managecustomers.php?error=occupiedRoom.php");




} else {
    

			$query = "DELETE FROM Customer where SID = '$SID'";

			$result = mysqli_query($con,$query);

			if (mysqli_query($con, $query)) {
					echo "Customer Deleted successfully";
			} else {
					echo "Error Deleting employee: " . mysqli_error($con);
			}

			mysqli_close($con);

			header("Location: managecustomers.php");
	
	}

?>