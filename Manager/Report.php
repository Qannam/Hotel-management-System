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
  
  <title>Reports</title>
  
  <body>
    
<?php              
      $connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
      mysql_select_db('Hotel_System');
    
    
		
  echo  "<div class='table-title'>";
  echo "<h3>Reports</h3>";
?>
		
		<button type="button"  onclick="goBack()" >Back</button>
			<script>
				function goBack() {
					window.location.assign("manager.php")
				}
			</script>
		
<?php
	
    if((isset($_GET['status'])) &&(isset($_GET['strtDate']))  && (isset($_GET['endDate']))){
      $status = $_GET['status'];
      $strtDate = $_GET['strtDate'];
      $endDate = $_GET['endDate'];
    
			echo"<form action=Report.php method=GET>";
          echo "<label><b>Select status of the booking  </b></label>";
					echo "<select name='status' required>";
            if($status =='all')
							echo "<option value='all' selected >all</option>"; 
						else
							echo "<option value='all' selected >all</option>"; 
            	
            if($status =='still')
							echo "<option value='still' selected>still</option>"; 
						else
							echo "<option value='still'>still</option>"; 
						
						if($status =='finish')
							echo "<option value='finish' selected>finish</option>";
						else
            	echo "<option value='finish'>finish</option>";            
          echo "</select> <br><br>";
          echo "<label><b>From the date of :  </b></label>";			
          echo "<input type = 'date' name = 'strtDate' required value ='$strtDate'> <br><br>";
          echo "<label><b>To the date of :      </b></label>";			
          echo "<input type = 'date' name = 'endDate' required value ='$endDate' > <br><br>";
          echo "<input type = 'submit' value='Display' style='cursor: pointer; padding: 15px 32px'>";
        echo "</form>";
    
      $connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
      mysql_select_db('Hotel_System');
    
			if($status != 'all')
      	$query = "SELECT * FROM Bookings WHERE Booking_status = '".$status."'";
			else
				$query = "SELECT * FROM Bookings";
      $result = mysql_query($query);
    
echo "</div>";		
  echo  "<table class='table-fill'>";
  echo  "<thead>";
  echo  "<tr>";
	echo  "<th class='text-left'>Booking ID</th>";
	echo  "<th class='text-left'>Room Number</th>";
  echo  "<th class='text-left'>Customer Name</th>";
  echo   "<th class='text-left'>Customer Phone</th>";
  echo    "<th class='text-left'>Balance</th>";
  echo    "<th class='text-left'>Room Rate</th>";
  echo    "<th class='text-left'>Start Date</th>";
  echo    "<th class='text-left'>Days</th>";
  echo    "<th class='text-left'>Employee ID</th>";
  echo    "<th class='text-left'>Booking Status</th>";
  echo    "<th class='text-left'>Paid Amount</th>";
  echo   "</tr>";
  echo  "</thead>";
  echo  "<tbody class='table-hover'>";

  while($row = mysql_fetch_array($result)){ 
  
		if((strtotime($row['StartDate']) >= strtotime($strtDate)) && (strtotime($row['StartDate']) < strtotime($endDate))){
		
	echo "<tr>";
	echo "<td class='text-left'>" . $row['ID'] . "</td>";
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
      var s_year = start_date_php_format.substring(0, 4);
      var s_month = start_date_php_format.substring(5, 7);
      var s_day = start_date_php_format.substring(8, 10);
			
			var end_date_php_format = "<?php echo $row['EndDate']; ?>" ;
      var e_year = end_date_php_format.substring(0, 4);
      var e_month = end_date_php_format.substring(5, 7);
      var e_day = end_date_php_format.substring(8, 10);
      
      var start_date_js_format = new Date(s_month +"/"+ s_day +"/"+ s_year);
      var end_date_js_format = new Date(e_month +"/"+ e_day +"/"+ e_year);			
      var currentDate = new Date();
			<?php 
			if($row['Booking_status'] == 'still') 
      	echo "var timeDiff = Math.abs(currentDate.getTime() - start_date_js_format.getTime());";
			else 
				echo "var timeDiff = Math.abs(end_date_js_format.getTime() - start_date_js_format.getTime());";
			?>
      var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
			if(diffDays == 0)
				diffDays++;  // i dont want the days be zero
      
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
  echo "<td id=balance_td" .$row['ID']. " class='text-left'> </td>";
?>
		<script> document.getElementById("balance_td<?php echo $row['ID']; ?>").innerHTML = balance; </script> 
<?php	
			
			
  echo "<td class='text-left'>" . $row['Cost'] . "</td>";
	echo "<td class='text-left'>" . $row['StartDate'] . "</td>";
  
	echo "<td id=diffDays_td" .$row['RoomNumber']. " class='text-left'> </td>"; ?>
	<script> document.getElementById("diffDays_td<?php echo $row['RoomNumber']; ?>").innerHTML = diffDays; </script> 

<?php
  echo "<td class='text-left'>" . $row['employeeID'] . "</td>";
	echo "<td class='text-left'>" . $row['Booking_status'] . "</td>";
  echo "<td class='text-left'>" . $row['paid_amount'] . "</td>";


  echo "</tr>";
  }
	}
  echo  "</tbody>";
  echo  "</table>";
	}
		else{
			 echo 
        "<form action=Report.php method=GET>";
          echo "<label><b>Select status of the booking  </b></label>";
					echo "<select name='status' required >";
            echo "<option value='all'>all</option>";   
            echo "<option value='still'>still</option>";   
            echo "<option value='finish'>finish</option>";            
          echo "</select> <br><br>";
          echo "<label><b>From the date of :  </b></label>";			
          echo "<input type = 'date' name = 'strtDate' required > <br><br>";
          echo "<label><b>To the date of :      </b></label>";			
          echo "<input type = 'date' name = 'endDate' required > <br><br>";
          echo "<input type = 'submit' value='Display' style='cursor: pointer; padding: 15px 32px'>";
        echo "</form>";
		}
      
?>
    
    
  </body>
  
</html>
