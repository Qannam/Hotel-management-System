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
  <title>
   Employee
    </title>
  
  <body>
    
    <!-- add employee, add rates for room, view reports -->
    
    
    <form method="get" action="/signout.php">
      <button type="submit">Sign Out</button>
    </form>
    
    <form method="get" action="/Employee/managerooms.php">
      <button type="submit">Manage Rooms</button>
    </form>
    
    <form method="get" action="/Employee/managecustomers.php">
      <button type="submit">Manage Customers</button>
    </form>
    
    <form method="get" action="/Employee/Reservations.php">
      <button type="submit">Reservations</button>
    </form>
    
  </body>
  
</html>