<?php
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  echo "<script>window.location = '/index.php?error=login'</script>";  
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
  <title>Manage Rates</title>
  <body>
    
    	  <?php
		  
                  
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('Hotel_System');
    
$query = "SELECT * FROM Room";
$result = mysql_query($query);
    
    

    
    
   
    
    
    
    
  echo  "<div class='table-title'>";
echo "<h3>Rooms</h3>";
		?>
		 <button type="button"  onclick="goBack()" >Back</button>
          <script>
            function goBack() {
                 window.location.assign("employee.php")
            }
          </script>
		<?php
 echo "</div>";
echo  "<table class='table-fill'>";
echo  "<thead>";
echo  "<tr>";
echo  "<th class='text-left'>Room Number</th>";
echo  "<th class='text-left'>Room Status</th>";
echo   "<th class='text-left'>Number of beds</th>";
echo   "<th class='text-left'>Occupied by</th>";
echo    "<th class='text-left'>Rate</th>";
echo    "<th class='text-left'>Edit</th>";
echo   "</tr>";
echo  "</thead>";
echo  "<tbody class='table-hover'>";
    
while($row = mysql_fetch_array($result)){ 
echo "<tr>";
echo "<td class='text-left'>" . $row['Number'] . "</td>";
echo "<td class='text-left'>" . $row['roomstatus'] . "</td>";
echo "<td class='text-left'>" . $row['NumberofBeds'] . "</td>";
  
$occupied = $row['Occupiedby'];
  
$query2 = "SELECT name FROM Customer WHERE SID = '$occupied'";

$result2 = mysql_query($query2);

if($row2 = mysql_fetch_array($result2)){
  
  
  
 
  
echo "<td class='text-left'>" . $row2['name'] . "</td>";
 
  
}
  
  else {
  echo "<td class='text-left'>" .' '. "</td>";
    
  }

echo "<td class='text-left'>" . $row['Rate'] . "</td>";
echo "<td class='text-left'> <a href='editRoom.php?roomnumber=". $row['Number'] ."'> Edit Status </a> </td>";
echo "</tr>";
}
echo  "</tbody>";
echo  "</table>";
    
      
    ?>
    
    
    
    
    
    
    
     </body>
</html>
