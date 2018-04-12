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
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width">
    	<meta charset="utf-8" />

  </head>
  
  <Style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

body {
  background-color: #3e94ec;
  font-family: "Roboto", helvetica, arial, sans-serif;
  font-size: 16px;
  font-weight: 400;
  text-rendering: optimizeLegibility;
	width: 100%
}

div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 320px;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:15px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}

  
  </Style>
  
  <title>Set Rates</title>
  
  <body>
    
    	  <?php
		  
                  
$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('Hotel_System');
    
$query = "SELECT * FROM Room";
$result = mysql_query($query);
    
    
   
    
    
    
    
  echo  "<div class='table-title'>";
echo "<h3>Rooms</h3>";
		?>
		 <button type="button"  onclick="goBack()" >Back</button>
          <script>
            function goBack() {
                 window.location.assign("manager.php")
            }
          </script>
		<?php
 echo "</div>";
echo  "<table class='table-fill'>";
echo  "<thead>";
echo  "<tr>";
echo  "<th class='text-left'>Room Number</th>";
echo   "<th class='text-left'>Number of beds</th>";
echo    "<th class='text-left'>Rate</th>";
echo    "<th class='text-left'>Edit</th>";
echo   "</tr>";
echo  "</thead>";
echo  "<tbody class='table-hover'>";
    
while($row = mysql_fetch_array($result)){ 
echo "<tr>";
echo "<td class='text-left'>" . $row['Number'] . "</td>";
echo "<td class='text-left'>" . $row['NumberofBeds'] . "</td>";
 echo "<td class='text-left'>" . $row['Rate'] . "</td>";
  echo "<td class='text-left'> <a href='editRates.php?roomnumber=". $row['Number'] ."'> Edit Rate </a> </td>";
echo "</tr>";
}
echo  "</tbody>";
echo  "</table>";
    
      
    ?>
    
    
    
    
    
    
    
     </body>
</html>
