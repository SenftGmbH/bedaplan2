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


// get the variables from the mainsite

$current_employee = $_GET["current_employee"];

$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 
$leerzeit = date_create('1971-01-01 0:0:0');
$leer=  date_format($leerzeit, 'Y-m-d H:i:s');






// set the status of worktime = 2
 $bedaplan_query = "UPDATE worktime SET wt_stop= '1971-01-01 0:0:1' WHERE  wt_employee = '$current_employee' AND wt_stop='$leer'"; 
 $bedaplan_result = mysqli_query($db, $bedaplan_query);
 $bedaplan_query = "UPDATE status SET status_wt = '2' WHERE  status_employee = '$current_employee'";
 $bedaplan_result = mysqli_query($db, $bedaplan_query);
 echo "Admin Bereich <br>";
 echo "Mitarbeiter: <br>";
 echo $current_employee;
 echo "<br><br>Status auf <b>abgemeldet</b> gesetzt<br>";
echo $bedaplan_query;


?><br>
<p align="right">  
<a href="javascript:window.close()"><img src="close.gif" alt="Fenster schliessen" border=0></a>
</p>
</html>
