<!-- Bedaplan2 Version 2.0.0 16.10.2014 https://github.com/SenftGmbH/ -->
<html>
 <head>
  <title>bedaplan</title>
 </head>
 <body>
 <img src="http://213.23.35.50:8688/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Admin - Laufende Projekte</font></p>
<hr>
<br>
<?php
// connect to the database
include "db.inc.php";





// create the quere for the worktime of the user
$bedaplan_query = "SELECT * FROM project WHERE project_done = '1'"; 

$bedaplan_result = mysqli_query($db, $bedaplan_query);




echo "Offene Projekte:<br><br>";
//create the table with the active projects
echo "<table border=1>";
echo "<tr>";
echo "<td>Projektdatum</td>";
echo "<td>Projektnummer</td>";
echo "<td>Projektbeschreibung</td>";
echo "<td>Projektmitarbeiter</td>";
echo "</tr>";


while($row = $bedaplan_result->fetch_assoc()) 
    { 
	echo "<tr>";
	echo "<td>";
	echo $row["project_date"];
	echo "</td>";
 	echo "<td style='width:100px'>";
	echo $row["project_nr"];
	echo "</td>";
	echo "<td style='width:300px'>";
	echo $row["project_description"];
	echo "</td>";
	echo "<td style='width:200px'>";
	echo $row["project_employee"];
	echo "</td>";
	echo "</tr>";
    } 

echo "</table>";
echo "<br><br>";
echo "Totale Arbeitszeit: ";
echo "<b>";
echo round($total/60/60,2);
echo "</b>";


?>
<p align="right">  
<a href="javascript:window.close()"><img src="close.gif" alt="Fenster schliessen" border=0></a>
</p>
</html>
