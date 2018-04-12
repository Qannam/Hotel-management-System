<?php
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  echo "<script>window.location = '/index.php?error=login'</script>";  
} 
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>
  
  <title>EditRate</title>
  
  <body>
    

    <form action="editRateDB.php" Method = "post">
      
        <div class="container">
          
    <label><b>Room Number <?php echo $_GET['roomnumber'] ?></b></label>
    <input type="hidden" value="<?php echo $_GET['roomnumber'] ?>" name="roomnumber" required>

    <br> <br>
    <label><b>Rate</b></label>
    <input type="number" placeholder="Enter Rate" name="rate" required>
          
          
          
    <button type="submit">Submit</button>
          
          <button type="button"  onclick="goBack()" >Cancel</button>
          <script>
            function goBack() {
                 window.location.assign("setrates1.php")
            }
          </script>
  </div>
      
      
    </form>  
    
  </body>
  
</html>
