<!-- Bedaplan2 Version 2.0.0 16.10.2014 https://github.com/SenftGmbH/ -->
<html>
 <head>
  <title>bedaplan</title>
<meta name="viewport" content="width=500" />
 </head>
 <body>
 <img src="http://213.23.35.50:8688/bedaplan/bedaplanlogo.jpg">
<hr>
<br>
<?php
// connect to the database
include "db.inc.php";

// lets get the date
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);

// get the variables from the mainsite
$current_user = $_GET["current_user"];
$vehicle = $_GET["vehicle"];

$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 
// set the project start time to the current time


$bedaplan_query = "INSERT INTO vehicle (vehicle_employee, vehicle_date, vehicle_free) VALUES ('$current_user', '$datum', '$vehicle')";
$bedaplan_result = mysqli_query($db, $bedaplan_query);

echo "Mitarbeiter: <br>";
echo $current_user;
echo "<br><br>Benutzt Auto:<br>";
echo $vehicle;

?>
<script type="text/javascript">
     window.setTimeout("this.close()",2000);
        </script>
</body>
