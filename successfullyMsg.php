<?php
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  echo "<script>window.location = '/index.php?error=login'</script>";  
} 
?>



<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
  </head>
  
  <style>
h1 {
    text-align: center;
    margin-top: 300px;
}
 
</style>
    <title>
      successfully Msg
    </title>
<body>
 <?php 
  if($_GET['type'] == "Room"){
    echo" <h1>ROOM HAS BEEN UPDATED </h1>";
    echo"<meta http-equiv='refresh' content='2;url= Employee/managerooms.php' />";
  }
  if($_GET['type'] == "Termination"){
    echo" <h1>BOOKING HAS BEEN TERMINATED SUCCESSFULLY</h1>";
    echo"<meta http-equiv='refresh' content='2;url= Employee/Reservations.php' />";
  }
  if($_GET['type'] == "Pay"){
    echo" <h1>PAYMENT HAS BEEN DONE SUCCESSFULLY</h1>";
    echo"<meta http-equiv='refresh' content='2;url= Employee/Reservations.php' />";
  }
  if($_GET['type'] == "Rate"){
    echo" <h1>ROOM RATE HAS BEEN UPDATED </h1>";
    echo"<meta http-equiv='refresh' content='2;url= Manager/setrates1.php' />";
  }
  ?>


  </body>
</html>