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
  
  <title>Add Emplyee</title>
  
  <body>
    

    <form action="AddEmployeeDB.php" Method = "post">
      
        <div class="container">
          
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="usr" required autocomplete="off" readonly 
      onfocus="this.removeAttribute('readonly');">

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required autocomplete="off" readonly 
      onfocus="this.removeAttribute('readonly');">
        
    <label><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>
          
    <label><b>Phone Number</b></label>
    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' pattern = ".{10}" maxlength ="10" placeholder="Enter Phone number" name="phone" required>
          
    <button type="submit">Add</button>
    <button type="button"  onclick="goBack()" >Cancel</button>
      <script>
       function goBack() {
       window.location.assign("employees.php")
       }
      </script>
  </div>
      
      
    </form>  
    
  </body>
  
</html>
