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
    <title>Paying</title>
  </head>
  <body>
    <h3>Paying</h3>
<?php  
      $BookingId = $_POST['BookingID'];
    
      $connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
      mysql_select_db('Hotel_System');
    
      $query = "SELECT * FROM Bookings WHERE ID = '$BookingId'";
      $result = mysql_query($query);

      if($row = mysql_fetch_array($result)){
              echo "
                   <div class='container'>
                      <form action ='payDB.php' method ='post'>
                      Room Number is: ".$row['RoomNumber']." <br>
                      <br><br><br>
                        <label><b> Enter the amount </b></label>
                        <input type='text' name='amount'>
                        <input type='hidden' name='BookingId' value='".$BookingId."'>
                         <br>
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
