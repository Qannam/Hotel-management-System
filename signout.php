<?php
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
  echo "<script>window.location = 'index.php'</script>";  
} 
?>


<?php 
session_start();
session_destroy();
header("Location: index.php");