<!-- Bedaplan2 Version 2.0.0 16.10.2014 https://github.com/SenftGmbH/ -->
<html>
 <head>
  <title>bedaplan</title>
 <meta name="viewport" content="width=500" />
 </head>
 <body>
 <img src="http://213.23.35.50:8688/bedaplan/bedaplanlogo.jpg">
  <p align="right"><font size="5">Arbeitszeitauswertung</font></p>
<hr>
<font size="3">
<br>
<?php
// connect to the database
include "db.inc.php";


// get the variables from the mainsite
$sort_date = $_POST["worktime_date"];
$current_employee = $_GET["mitarbeiter"];




// create the quere for the worktime of the user
$bedaplan_query = "SELECT * FROM worktime WHERE wt_employee = '$current_employee' AND wt_sort = '$sort_date'"; 

$bedaplan_result = mysqli_query($db, $bedaplan_query);


// show employee name
echo "Mitarbeiter: <br>";
echo $current_employee;
echo "<br><br>";
echo "Monat:<br>";
echo $sort_date;

// set the total time to 0
$total = 0;

//create the table with the worktime
echo "<table border=1>";

// table headers are here
echo "<tr>";
echo "<td>Arbeitsbeginn</td>";
echo "<td>Arbeitsende</td>";
echo "<td>Stunden</td>";
echo "</tr>";




while($row = $bedaplan_result->fetch_assoc()) 
    { 
	echo "<tr>";
	echo "<td>";
	echo $row["wt_start"];
	echo "</td>";
 	echo "<td>";
	// looking if the employee logged out or it is a running day
	if ($row["wt_stop"] == '1971-01-01 00:00:00')
 	 {
 	  echo "laufend";
         }
	 else
	 {
	  echo $row["wt_stop"];
	 }
	echo "</td>";
	echo "<td>";
	if ($row["wt_stop"] == '1971-01-01 00:00:00')
         {
	  echo "-";
 	 }
	else
 	 {
	   if ($row["wt_stop"] == '1971-01-01 00:00:01')
	   {
	    echo "<font color='red'>Zeitkorrektur erforderlich!!!</font>";
	   }
	   else
	   {
	    $time_difference = strtotime($row["wt_stop"]) - strtotime($row["wt_start"]);
	    // echo gmdate("H:i", $time_difference);
	    $time_difference = $time_difference - 2700;

            if ($time_difference > 28800)
               {
		// echo "Mehr als 8 Stunden";
               }
               else
               {
		// echo "Weniger als 8 Stunden";
               }

	   
	    $total = $total + $time_difference;
	    echo gmdate("H:i", $time_difference);
	    echo "<br>";
	   }	
	 }
	// echo round ($time_difference/60/60,2);
	echo "</td>";
	echo "</tr>";
    } 

echo "</table>";
echo "<br><br>";
echo "Totale Arbeitszeit: ";
echo "<b>";


// This is the correct output
 $diff = $total;
 $factor = intval( $diff/3600 );
 $hours = $factor;
 $diff  = $diff - $factor*3600;
 $factor = intval( $diff/60 );
 $minutes = $factor;
 $seconds = $diff - ( $factor * 60 );
echo "$hours:$minutes:$seconds \n";
echo "</b>";


?>

<p align="center">  
<a href="javascript:window.close()"><img src="hauptseite.jpg" border=0></a>
</p>
</font>
</html>
