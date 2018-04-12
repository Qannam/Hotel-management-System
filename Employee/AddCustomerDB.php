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

$ID = $_POST['ID'];
$name = $_POST['name'];
$phone = $_POST['phone'];


$q = "SELECT * FROM Customer WHERE SID = '$ID'";

			$res = mysqli_query($con,$q);

				if(mysqli_num_rows($res) > 0){
					
          echo '<script>alert("customer is already existed"); window.location = "addcustomer.php"</script>';
					
											mysqli_close($con);
				}

				else{
				
$query = "INSERT INTO Customer VALUES ('$ID','$name', '$phone')";

if(mysqli_query($con,$query)){
	
                mysqli_close();
		header("Location: managecustomers.php");
	}  
			}


?>