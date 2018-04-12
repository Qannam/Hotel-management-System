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

$roomnb = $_POST['roomnumber'];
$rate = $_POST['rate'];


$query = "UPDATE Room SET Rate = '$rate' WHERE Number = '$roomnb'";


$result = mysqli_query($con,$query);


if (mysqli_query($con, $query)) {
    echo "Record updated successfully";
		header("Location: /successfullyMsg.php?type=Rate");
} else {
    echo "Error updating record: " . mysqli_error($con);
}
	
mysqli_close($con);


?>
        

















?>