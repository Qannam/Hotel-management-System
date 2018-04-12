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
  
  <title>Make Reservation</title>
  
  <body>
    
     <?php
		  
                  
      $connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
      mysql_select_db('Hotel_System');
    
      $query = "SELECT * FROM Room WHERE roomstatus = 'Available'";
      $result = mysql_query($query);
    
    
  echo  "<div class='table-title'>";
echo "<h3>Rooms</h3>";
		?>
<button type="button"  onclick="goBack()" >Back</button>
          <script>
            function goBack() {
                 window.location.assign("Reservations.php")
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
echo    "<th class='text-left'>Rate</th>";
echo    "<th class='text-left'>Book</th>";
echo   "</tr>";
echo  "</thead>";
echo  "<tbody class='table-hover'>";
    
while($row = mysql_fetch_array($result)){ 
echo "<tr>";
echo "<td class='text-left'>" . $row['Number'] . "</td>";
echo "<td class='text-left'>" . $row['roomstatus'] . "</td>";
echo "<td class='text-left'>" . $row['NumberofBeds'] . "</td>";
echo "<td class='text-left'>" . $row['Rate'] . "</td>";
echo "<td class='text-left'> <a href='MakeReservation.php?roomnumber=". $row['Number'] ."&rate=". $row['Rate'] ."'> Book Room </a> </td>";
echo "</tr>";
}
echo  "</tbody>";
echo  "</table>";
    
      
    ?>
    
    
  </body>
  
</html>
