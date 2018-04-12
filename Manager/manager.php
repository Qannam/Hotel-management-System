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
    Manager
    </title>
  
  <body>
    
    <!-- add employee, add rates for room, view reports -->
    
    
    <form method="get" action="/signout.php">
      <button type="submit">Sign Out</button>
    </form>
    
    <form method="get" action="employees.php">
      <button type="submit">Employees</button>
    </form>
    
    <form method="get" action="setrates1.php">
      <button type="submit">Set Rates</button>
    </form>
    
    <form method="get" action="Report.php">
      <button type="submit">Reports</button>
    </form>
    
  </body>
  
</html>