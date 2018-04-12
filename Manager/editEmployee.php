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

$usr = $_GET['username'];

$query = "SELECT * FROM employee WHERE (username = '$usr')";

$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)){ 
$user = $row['username'];
$psw = $row['password'];
$name = $row['name'];
	
$phone = $row['phone'];
 
   echo "<form action='editEmployeeDB.php?user=$usr' Method = 'post'>";
      
   echo     "<div class='container'>";
          
    echo "<label><b>Username</b></label>";
    echo '<input type="text" placeholder="Enter Username" name="user" value="'. $user .'" required readonly>';

    echo "<label><b>Password</b></label>";
    echo '<input type="password" placeholder="Enter Password" name="psw" value="'. $psw .'" required>';
        
    echo '<label><b>Name</b></label>';
    echo '<input type="text" placeholder="Enter Name" name="name" value="'. $name .'" required>';
          
    echo "<label><b>Phone Number</b></label>";
    echo '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter Phone number" name="phone" value="'. $phone .'" required>';
          
    echo '<button type="submit">Edit</button>';
	
		echo'			<button type="button"  onclick="goBack()" >Cancel</button>
							<script>
							 function goBack() {
							 window.location.assign("employees.php")
							 }
							</script>';
		echo "</div>";


}

	
mysqli_close($con);

?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
  </head>
  
  <title>Edit Emplyee</title>
  
  <body>
    
      
      
    </form>  
    
  </body>
  
</html>
