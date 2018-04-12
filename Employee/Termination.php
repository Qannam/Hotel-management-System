<?php
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  echo "<script>window.location = '/index.php?error=login'</script>";  
} 
?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <title>Termination</title>
  </head>
  <body>
    <h3>Termination</h3>
<?php  
      $BookingId = $_POST['BookingID'];
      $Balance = $_POST['balance'];
    
      $connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
      mysql_select_db('Hotel_System');
    
      $query = "SELECT * FROM Bookings WHERE ID = '$BookingId'";
      $result = mysql_query($query);

      if($row = mysql_fetch_array($result)){
        if($Balance < 0){
          echo "<h2 style='color : red'><b>* Be aware there is an unpaid amount *</b></h2> <br><br>";
        }
              echo "
                   <div class='container'>
                    <form action ='TerminationDB.php' method ='post'>
                      <label><b> Do you want to termenat the booking of room number <b>".$row['RoomNumber']."</b> ?</b></label>
                      <input type='hidden' name='BookingId' value='".$BookingId."'>
                      <input type='hidden' name='RoomNumber' value='".$row['RoomNumber']."'>
                      <br><br><br>
                      <button type='submit' >Submit</button>
                      <button type='button'  onclick='goBack()' >Back</button>
                    </form>
                    <script>
                      function goBack() {
                        window.location.assign('Reservations.php')
                      }
                    </script> 
                  </div> 
                  ";
      } 
        
        
     
?>
  </body>
</html>
