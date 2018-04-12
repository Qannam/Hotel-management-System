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
  </head>
  
  <title>Book Room</title>
  
  <body>
<!--     here i will get room status from the data base -->
   

    <form action="AddReservationDB.php" Method = "post">
        <div class="container">
          
          <label><b>Room Number: <?php echo $_GET['roomnumber'] ?></b></label>
          <input type="hidden" value="<?php echo $_GET['roomnumber'] ?>" name="roomnumber" required>
          <br>
          <br>
          
           <label><b>Room Cost: <?php echo $_GET['rate'] ?></b></label>
          <input type="hidden" value="<?php echo $_GET['rate'] ?>" name="rate" required>
           <br>
          <br>
           <label><b>Customer Name</b></label>
          <br>
          <br>
           
             
             <?php
      
  $connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('Hotel_System');
    
$query = "SELECT * FROM Room";
$result = mysql_query($query);
                $query2 = "SELECT * FROM Customer";
                $result2 = mysql_query($query2);
            
            echo "<select name='customerName'>";
            
            while($row2 = mysql_fetch_array($result2)){ 
            
              echo "<option value=".$row2['SID'].">".$row2['name']."</option>";
            
            }
            
            echo "</select>";
            
            ?>

    <br>
     <br>
          
          <label><b>Reservation Start Date</b></label>
           <input type="date" name="startDate">
           <br>
          <br>
          <label><b>Reservation End Date</b></label>
           <input type="date" name="endDate">
          
          <input type="hidden" value="<?php echo $_SESSION['user'] ?>" name="empID" required>
          
          

          <button type="submit" >Submit</button>

          <button type="button"  onclick="goBack()" >Back</button>
            <script>
              function goBack() {
                window.location.assign("reservation.php")
              }
            </script>
      </div>
    </form>  
    
  </body>
  
</html>
