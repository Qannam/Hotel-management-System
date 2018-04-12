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
  
  <title>Edit Room</title>
  
  <body>
<!--     here i will get room status from the data base -->
    <?php
    require_once ("CONFIG-DB.php");
    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
    if(mysqli_connect_errno($con)){
      die("Fail to connect to database :".mysqli_connect_error());
    }
    $roomNumber = $_GET['roomnumber'];
    $connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
    mysql_select_db('Hotel_System');
    $query = "SELECT roomstatus FROM Room WHERE Number = '$roomNumber'";
    $result = mysql_query($query);
    while($row = mysql_fetch_array($result)){
      $currentStatus = $row['roomstatus'];
    }
    ?>

    <form action="manageRoomsDB.php" Method = "post">
        <div class="container">
          
          <label><b>Room Number <?php echo $_GET['roomnumber'] ?></b></label>
          <input type="hidden" value="<?php echo $_GET['roomnumber'] ?>" name="roomnumber" required>
          <br>
          <br>
          <div id ="errors" style ="color:red"></div>
          <br> <br>
          <label><b>Status:</b></label>
          <br>
          <input id ="Rented" type="radio" name="status" value="Rented" disabled> Rented<br>
          <input id ="Reserved" type="radio" name="status" value="Reserved"> Reserved<br>
          <input id ="Maintenance" type="radio" name="status" value="Maintenance"> Maintenance<br>
          <input id ="Available" type="radio" name="status" value="Available"> Available<br>
          <input id ="Cleaning" type="radio" name="status" value="Cleaning"> Cleaning<br><br>
          <br> <br>
          
          <!-- this is function to select the current status -->
          <script>
            selectCurrentStatus();
            function selectCurrentStatus(){
              var status = <?php echo $currentStatus; ?> ;
              document.getElementById('<?php echo $currentStatus; ?>').checked = true;
              }
            
            // here i will disabled Radio button if the status of the room is rented
              disabledRadio();
            function disabledRadio(){
               if(<?php echo $currentStatus; ?> == Rented){
                document.getElementById('errors').innerHTML="* you cannot change the status of the room because it is rented now *";
                 for( var i = 0 ; i < 6; i++){
                  document.getElementsByTagName("INPUT")[i].setAttribute("disabled", "true");
                }
               }
            }
          </script>

          <button type="submit" >Submit</button>

          <button type="button"  onclick="goBack()" >Back</button>
            <script>
              function goBack() {
                window.location.assign("managerooms.php")
              }
            </script>
      </div>
    </form>  
    
  </body>
  
</html>
