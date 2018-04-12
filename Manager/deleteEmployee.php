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

$username = $_GET['username'];

$query = "DELETE FROM employee where username = '$username'";

$result = mysqli_query($con,$query);

if (mysqli_query($con, $query)) {
    echo "Employee Deleted successfully";
} else {
    echo "Error Deleting employee: " . mysqli_error($con);
}
	
mysqli_close($con);

header("Location: employees.php");

?>
        

















?>