<?php
if(isset($_GET['error'])) {
	$error = $_GET['error'];
	if ($error == "WrongUsernamePassword"){
		echo '
			<script>
				alert("Wrong password or username");
			</script>
		';
	}
  else if ($error == "login"){
		echo '
			<script>
				alert("You have to login");
			</script>
		';
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>
    <title>
      Booking Managment System
    </title>
<body>

<h2>Login Form</h2>

<form action="Login.php" Method = "post">
  
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="usr" required  required readonly 
      onfocus="this.removeAttribute('readonly');">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
  </div>
</form>
  </body>
</html>