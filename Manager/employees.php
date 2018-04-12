<?php
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  echo "<script>window.location = '/index.php?error=login'</script>";  
} 
?>



<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <link rel="stylesheet" type="text/css" href="/css/manageStyle.css">
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width">
    	<meta charset="utf-8" />

  </head>
  
  <title>Employees</title>
  
  <body>
    
    <form method="get" action="AddEmployee.php">
      <button type="submit">Add Employee</button>
			<button type="button"  onclick="goBack()" >Back</button>
          <script>
            function goBack() {
                 window.location.assign("manager.php")
            }
          </script>
    </form>
    
<?php		  
		
		$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
		mysql_select_db('Hotel_System');

		$query = "SELECT * FROM employee";
		$result = mysql_query($query);

				//function delete($usr) {

				 // echo "$usr";
					//$q = "DELETE FROM employee WHERE username = ". $usr;
					//$res = mysql_query($q);
		 // }

		echo  "<div class='table-title'>";
		echo "<h3>Employees</h3>";
		echo "</div>";
		echo  "<table class='table-fill'>";
		echo  "<thead>";
		echo  "<tr>";
		echo  "<th class='text-left'>Name</th>";
		echo   "<th class='text-left'>Phone number</th>";
		echo   "<th class='text-left'></th>";
		echo   "<th class='text-left'></th>";
		echo   "</tr>";
		echo  "</thead>";
		echo  "<tbody class='table-hover'>";

		while($row = mysql_fetch_array($result)){ 
		echo "<tr>";
		echo "<td class='text-left'>" . $row['name'] . "</td>";
		echo "<td class='text-left'>" . $row['phone'] . "</td>";
		echo "<td class='text-left'> <a href='deleteEmployee.php?username=" . $row['username'] . "')>Delete</a> </td>";	
		echo "<td class='text-left'> <a href='editEmployee.php?username=" . $row['username'] . "')>Edit</a> </td>";
		echo "</tr>";
		}
		echo  "</tbody>";
		echo  "</table>";
?>
    
    
    
    
    
    
    
     </body>
</html>
