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
      ROOM RATE HAS BEEN UPDATED
    </title>
<body>

 <h1>ROOM RATE HAS BEEN UPDATED </h1>

<meta http-equiv="refresh" content="2;url= setrates1.php" />


  </body>
</html>