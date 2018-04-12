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

$usr = $_GET['user'];
$username = $_POST['user'];
$password = $_POST['psw'];
$name = $_POST['name'];
$phone = $_POST['phone'];

echo $phone;

$query = "UPDATE employee SET username = '$username', password = '$password', name = '$name', phone = '$phone' WHERE username = '$usr'";





if (mysqli_query($con, $query)) {
    echo "Record updated successfully";
		header("Location: EmployeeEdited.php");
} else {
    echo "Error updating record: " . mysqli_error($con);
}
	
mysqli_close($con);




?>
        
