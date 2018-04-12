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
  
  <title>Reservations</title>
  
  <body>
    
<?php              
      $connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
      mysql_select_db('Hotel_System');
    
      $query = "SELECT * FROM Bookings WHERE Booking_status = 'still'";
      $result = mysql_query($query);
    
		
  echo  "<div class='table-title'>";
  echo "<h3>Bookings</h3>";
?>
		
		<button type="button"  onclick="makeReservation()" >Make New Reservation</button>
		<button type="button"  onclick="goBack()" >Back</button>
			<script>
				function makeReservation() {
        window.location.assign("reservation.php")
    	}
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
  echo  "<th class='text-left'>Customer Name</th>";
  echo   "<th class='text-left'>Customer phone</th>";
  echo    "<th class='text-left'>Balance</th>";
  echo    "<th class='text-left'>Pay</th>";
  echo    "<th class='text-left'>Termination</th>";
  echo   "</tr>";
  echo  "</thead>";
  echo  "<tbody class='table-hover'>";

  while($row = mysql_fetch_array($result)){ 
  echo "<tr>";
  echo "<td class='text-left'>" . $row['RoomNumber'] . "</td>";
  
    ///////////////// here i will get Customer name and phone frome the database ///////////////////////
    
      $Customer = $row['Customer'];
      $query2 = "SELECT * FROM Customer WHERE SID = '$Customer'";
      $result2 = mysql_query($query2);

      if($row2 = mysql_fetch_array($result2)){
        echo "<td class='text-left'>" . $row2['name'] . "</td>";
        echo "<td class='text-left'>" . $row2['phone'] . "</td>";
      }
      else {
        echo "<td class='text-left'>" .' '. "</td>";
        echo "<td class='text-left'>" .' '. "</td>";
        }

      ////////////////// End /////////////////////
    
?>    
    
<!--     ///////////////// here i will calculate the dayes and balance for th booking ///////////////// -->
    <script>
      var start_date_php_format = "<?php echo $row['StartDate']; ?>" ;
      var year = start_date_php_format.substring(0, 4);
      var month = start_date_php_format.substring(5, 7);
      var day = start_date_php_format.substring(8, 10);
      
      var start_date_js_format = new Date(month +"/"+ day +"/"+ year);
      var currentDate = new Date();
      var timeDiff = Math.abs(currentDate.getTime() - start_date_js_format.getTime());
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
      
      <?php
      $Room = $row['RoomNumber'];
      $query3 = "SELECT * FROM Room WHERE Number = '$Room'";
      $result3 = mysql_query($query3);
			$row3 = mysql_fetch_array($result3)
      ?>
       var balance = <?php echo $row['paid_amount']; ?> - (diffDays * <?php echo $row3['Rate'] ; ?>) ;
    </script>
<!--     ///////////////// End ///////////////// -->
		
<?php    
  echo "<td id=balance_td" .$row['RoomNumber']. " class='text-left'> </td>";
?>
		<script> document.getElementById("balance_td<?php echo $row['RoomNumber']; ?>").innerHTML = balance; </script> 
<?php
	
	echo"<form action = 'pay.php' method ='POST' >";
		echo "<input type='hidden' name ='BookingID' value='". $row['ID']."'>";
		echo "<td class='text-left'> <input type='submit' value='Pay' style='cursor: pointer ; font-size: 16px'> </td>";
	echo"</form>";	
		
		
	echo"<form action = 'Termination.php' method ='POST' >";
		echo "<input id=balance" .$row['RoomNumber']. " type='hidden' name ='balance'>"; ?>     
		<script>document.getElementById("balance<?php echo $row['RoomNumber']; ?>").value = balance;</script> <?php
		echo "<input type='hidden' name ='BookingID' value='". $row['ID']."'>";
		echo "<td class='text-left'> <input type='submit' value='Termination' style='cursor: pointer ; font-size: 16px'> </td>";
	echo"</form>";	
		
	

  echo "</tr>";
  }
  echo  "</tbody>";
  echo  "</table>";
    
      
?>
    
    
  </body>
  
</html>
