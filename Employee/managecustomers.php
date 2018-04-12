<?php
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  echo "<script>window.location = '/index.php?error=login'</script>";  
} 

	//here i will check occupiedRoom error
if(isset($_GET['error'])) {
	$error = $_GET['error'];
	if ($error == "occupiedRoom.php"){
		echo '
			<script>
				alert("You can not delete the customer because he has a reservation");
			</script>
		';
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
     <link rel="stylesheet" type="text/css" href="/css/manageStyle.css">
     <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width">
    	<meta charset="utf-8" />
  </head>
  <title>
    Manage Customers
    </title>
  
  <body>
    <form method="get" action="addcustomer.php">
      <button type="submit">Add Customer</button>
    </form>
    
    <button type="button"  onclick="goBack()" >Back</button>
          <script>
            function goBack() {
                 window.location.assign("employee.php")
            }
          </script>
    </form>
    
  <?php
		  
                  
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('Hotel_System');
    
$query = "SELECT * FROM Customer";
$result = mysql_query($query);
    
  echo  "<div class='table-title'>";
echo "<h3>Customers</h3>";
 echo "</div>";
echo  "<table class='table-fill'>";
echo  "<thead>";
echo  "<tr>";
echo  "<th class='text-left'>ID</th>";
echo  "<th class='text-left'>Name</th>";
echo   "<th class='text-left'>Phone number</th>";
echo   "<th class='text-left'></th>";
echo   "<th class='text-left'></th>";
echo   "</tr>";
echo  "</thead>";
echo  "<tbody class='table-hover'>";
    
while($row = mysql_fetch_array($result)){ 
echo "<tr>";
echo "<td class='text-left'>" . $row['SID'] . "</td>";
echo "<td class='text-left'>" . $row['name'] . "</td>";
echo "<td class='text-left'>" . $row['phone'] . "</td>";
echo "<td class='text-left'> <a href='deleteCustomer.php?sid=".$row['SID']."')>Delete</a> </td>";
echo "<td class='text-left'> <a href='editCustomer.php?sid=" . $row['SID'] . "')>Edit</a> </td>";
echo "</tr>";
}
echo  "</tbody>";
echo  "</table>";
    
    
    
    
    ?>
    
    
  </body>
  
</html>