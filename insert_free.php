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

$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 
// set the project start time to the current time


$bedaplan_query = "INSERT INTO free (free_user, free_date) VALUES ('$current_user', '$datum')";
$bedaplan_result = mysqli_query($db, $bedaplan_query);

?>
Frei wurde eingetragen.
<script type="text/javascript">
     window.setTimeout("this.close()",4000);
        </script>
</body>
