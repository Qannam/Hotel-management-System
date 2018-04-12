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
  
  <title>Add Customer</title>
  
  <body>
    

    <form action="AddCustomerDB.php" Method = "post">
      
        <div class="container">
          
    <label><b>ID Number</b></label>
    <input type="text" placeholder="ID Number" name="ID"  maxlength="10" pattern=".{10}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
    <br><br>  
          
    <label><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" maxlength="100" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || event.charCode == 32' required>
    <br>
     <br>
    <label><b>Phone Number</b></label>
    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Phone number" name="phone" maxlength="10" pattern=".{10}" required>
     
    <button type="submit">Add</button>
     
    <button type="button"  onclick="goBack()" >Cancel</button>
      <script>
       function goBack() {
       window.location.assign("managecustomers.php")
       }
      </script>
  </div>
     
      
    </form>  
    
  </body>
  
</html>
