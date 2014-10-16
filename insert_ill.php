<!-- Bedaplan2 Version 2.0.0 16.10.2014 https://github.com/SenftGmbH/ -->
<html>
 <head>
  <title>bedaplan</title>
<meta name="viewport" content="width=500" />
 </head>
 <body background="background.jpg">
 <img src="http://213.23.35.50:8688/bedaplan/bedaplanlogo.jpg">
<hr>
<br>
<?php
include "db.inc.php";

// lets get the date
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);

// get the variables from the mainsite
$current_user = $_GET["current_user"];

$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 
// set the project start time to the current time


$bedaplan_query = "INSERT INTO ill (ill_user, ill_date) VALUES ('$current_user', '$datum')";
$bedaplan_result = mysqli_query($db, $bedaplan_query);

echo "Mitarbeiter: <br>";
echo $current_user;
echo "<br><br>Benutzt Auto:<br>";
echo $vehicle;

?>
<script type="text/javascript">
     window.setTimeout("this.close()",4000);
        </script>
</body>
