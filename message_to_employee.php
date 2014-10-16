<!-- Bedaplan2 Version 2.0.0 16.10.2014 https://github.com/SenftGmbH/ -->
<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body>
 <img src="http://213.23.35.50:8688/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Nachricht an Mitarbeiter</font></p>
<hr>
<br>
<?php
// connect to the database
include "db.inc.php";



// get the variables from the mainsite
$message_content = $_POST["message_content"];
$project_employee = $_POST["current_user"];
echo $message_content;
echo $project_employee;
echo "<hr>";
  // set the project start time to the current time
  $bedaplan_query = "UPDATE message SET me_content = '$message_content' WHERE me_employee = '$project_employee'"; 
  $bedaplan_result = mysqli_query($db, $bedaplan_query);

echo $bedaplan_query;

?>
<a href="http://213.23.35.50:8688/bedaplan/bedaplan_admin.php"><img src="close.gif" alt="Fenster schliessen" border=0></a>
</body>
