<?php 
session_start();
require_once ("CONFIG-DB.php");
$con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
if(mysqli_connect_errno($con)){
	die("Fail to connect to database :".mysqli_connect_error());
}

$username = $_POST['usr'];
$password = $_POST['psw'];


$query = "SELECT * FROM manager WHERE username = '$username' AND password = '$password'";


$result = mysqli_query($con,$query);



if(mysqli_num_rows($result) > 0){
		$_SESSION['user'] = $username;
                mysqli_close();
		header("Location: Manager/manager.php");
	}
        
else{
			$query = "SELECT * FROM employee WHERE username = '$username' AND password = '$password'";


			$result = mysqli_query($con,$query);

				if(mysqli_num_rows($result) > 0){
					$_SESSION['user'] = $username;
											mysqli_close();
					header("Location: Employee/employee.php");
				}

				else{
				mysqli_close();
				header("Location: index.php?error=WrongUsernamePassword");
			}
	
}        

















?>