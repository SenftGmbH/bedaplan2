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
	$datum = date("m.Y",$timestamp);

// get the variables from the mainsite
$current_user = $_GET["current_user"];


$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 
// set the worktime start time to the current time

// get the current time and round it up to the next 15 minutes
// the code is not nice but easy to understood


// Auch hier noch Debug Code rein ...

$testtime =  time();
echo "<br>";
echo $testtime;
echo "<br>";
$testtime = $testtime/900;
echo "<br>";
echo $testtime;
echo "<br>";
$testtime = (ceil($testtime));
echo "<br>";
echo $testtime;
echo "<br>";
$testtime = $testtime*900;
echo "<br>";
echo $testtime;
echo "<br>";
$testtime = date('Y-m-d h:i:s', $testtime); 
echo "<br>";
echo $testtime;
echo "<br>";



// here we query the status of status_wt to look if the employee has logged in yet
$bedaplan_query = "SELECT * FROM status WHERE status_employee = '$current_user'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$status_raw = $bedaplan_result->fetch_assoc();
	$status_login = $status_raw["status_wt"];


if ($status_login==1)
 {
 // user is logged in, so show error message
 echo "<b>Mitarbeiter ist bereits eingeloggt !!!</b>";
 }
else
 {
//user is not logged in so start the login process

// old string
// $bedaplan_query = "INSERT INTO worktime (wt_employee, wt_start, wt_sort) VALUES ('$current_user',NOW() ,'$datum')";
// the new string insterts the rounded time into the database
  $bedaplan_query = "INSERT INTO worktime (wt_employee, wt_start, wt_sort) VALUES ('$current_user','$testtime' ,'$datum')";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);

 // Here we search for a bug, i let the code in the stable syste so i can see what happens exactly

  echo "---- DEBUG ----<br><br>";
  echo "<br>Die SQL Query:<br> ";
  echo $bedaplan_query;

  echo "<br>--<br>";
  echo "Mal sehen was die Uhrzeit sagt<br>";

  $currentuhrzeit = time();
  echo $currentuhrzeit;
  echo "<br>--<br>";
  echo $testtime;
  echo "<br><br>---- DEBUG ----";
  // set the status of worktime to 1 
  $bedaplan_query = "UPDATE status SET status_wt = '1' WHERE  status_employee = '$current_user'";
  $bedaplan_result = mysqli_query($db, $bedaplan_query);
  echo "Mitarbeiter: <br>";
  echo $current_user;
  echo "<br><br>Arbeitsbeginn:<br>";
  echo $uhrzeit;

 }



