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
      ROOM HAS BEEN UPDATED
    </title>
<body>
 <?php 
  if($_GET['UPDATED'] == "Room")
    echo" <h1>ROOM HAS BEEN UPDATED </h1>";
    echo"<meta http-equiv='refresh' content='2;url= managerooms.php' />";
  else if($_GET['UPDATED'] == "Termination")
    echo" <h1>BOOKING HAS BEEN TERMINATED SUCCESSFULLY</h1>";
    echo"<meta http-equiv='refresh' content='2;url= Reservations.php' />";
  ?>


  </body>
</html>