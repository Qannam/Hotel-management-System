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

$query = "SELECT * FROM Customer WHERE (SID = '$SID')";

$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result)){ 
$name = $row['name'];
$phone = $row['phone'];
 
   echo "<form action='editCustomerDB.php?name=$name' Method = 'post'>";
      
   echo     "<div class='container'>";
  
    echo '<label><b>Name</b></label>';
    echo '<input type="text" placeholder="Enter Name" name="name" value="'. $name .'" required>';
          
    echo "<label><b>Phone Number</b></label>";
    echo '<input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Enter Phone number" name="phone" value="'. $phone .'" required>';
          
    echo '<button type="submit">Edit</button>';
		echo'			<button type="button"  onclick="goBack()" >Cancel</button>
						<script>
						 function goBack() {
						 window.location.assign("managecustomers.php")
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
  
  <title>Edit Customer</title>
  
  <body>
    
      
      
    </form>  
    
  </body>
  
</html>
