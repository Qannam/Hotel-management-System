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

$username = $_POST['usr'];
$password = $_POST['psw'];
$name = $_POST['name'];
$phone = $_POST['phone'];

$q = "SELECT * FROM employee WHERE username = '$username'";

			$res = mysqli_query($con,$q);

				if(mysqli_num_rows($res) > 0){
					
          echo '<script>alert("user is already existed"); window.location = "AddEmployee.php"</script>';
					
											mysqli_close($con);
				}

				else{
				
$query = "INSERT INTO employee (username, password, name, phone) VALUES ('$username', '$password', '$name', '$phone')";

if(mysqli_query($con,$query)){
	
                mysqli_close();
		header("Location: employees.php");
	}  
			}


?>