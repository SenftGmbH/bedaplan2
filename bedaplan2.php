<!-- Bedaplan2 Version 2.0.0 16.10.2014 https://github.com/SenftGmbH/ -->
<?php
include "db.inc.php";
$mitarbeiter = $_GET["mitarbeiter"];
	$timestamp = time();
	$datum = date("d.m.Y",$timestamp);
	$bedaplan_query = "SELECT * FROM project WHERE project_date = '$datum' AND project_done <= '1' AND project_employee = '$mitarbeiter'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$row = $bedaplan_result->fetch_assoc();
	$current_nr = $row["project_nr"];
	
	
?>

<html>
 <head>
  <title>bedaplan</title>
  <meta name="viewport" content="width=500" />
  <meta http-equiv="refresh" content="60;url=http://213.23.35.50:8688/bedaplan/bedaplan2.php?mitarbeiter=<?php echo $mitarbeiter ?>">
 </head>
 <body>




 <img src="http://213.23.35.50:8688/bedaplan/bedaplanlogo.jpg">
<br>
<font size=1>
<?php 
$timeget = time(); 
$uhrzeit = date("H:i",$timeget); 
echo "Mitarbeiter:";
echo $mitarbeiter;
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Uhrzeit:";
echo $uhrzeit;
?>
</font>

 <table border="3" frame="void">
  <tr>
   <td width="450">
    <table border=0>
     <tr>
      <td>
	Projektbeschreibung:<?php echo "$current_nr"; ?><br>



       -->
       <!-- the new textarea opens no keybord for scrolling on the mobile device, but no next-line at the text -->
       <div style="width:230px; height: 162px; overflow: scroll; background: white; border: 1px solid black">
       <?php
       // lets get the current date
       $timestamp = time();
       $datum = date("d.m.Y",$timestamp);
       // select the project after status, current date and employee
       $bedaplan_query = "SELECT * FROM project WHERE project_date = '$datum' AND project_done < '2' AND project_employee = '$mitarbeiter'";
       $bedaplan_result = mysqli_query($db, $bedaplan_query);
       $row = $bedaplan_result->fetch_assoc();
       echo $row["project_description"];
       $infofile = $row["project_free1"];
       ?>
       
       </div>
       
       <br><?php $infotext =  $row['map']; ?>
      </td>
      <td>
	Nachricht von der Zentrale:<br>
        <!-- Here is a possiblity to send messages to the employee -->
	<div style="width:230px; height: 120px; overflow: scroll; background: white; border: 1px solid black">
	<?php
	
	// select the project after status, current daten and employee
	$bedaplan_query = "SELECT * FROM message WHERE me_employee = '$mitarbeiter'";
	$bedaplan_result = mysqli_query($db, $bedaplan_query);
	$row = $bedaplan_result->fetch_assoc();
	echo $row["me_content"];
        ?>
       </div>
       <!--<a href="<?php echo $infotext; ?>">Routenplanung zum Ziel</a><br><br>-->


<input type="button" name="Routenplanung zum Ziel" value="Routenplanung zum Ziel" 
	        onclick="window.open('<?php echo $infotext ?>')">
      <?php
	if ($infofile == "")
	{
	echo "<br>";
	
	}
	else
	{
	$filename = "http://213.23.35.50:8688/bedaplan/uploads/".$infofile;
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='$filename' >Weitere Dokumente</a>";	
	}
	?>
<br>



      </td>
     </tr>
    </table>
   </td>
  </tr>
 
  <tr>
   <td>
<!-- project planner  -->
	<center>
	<form action="http://213.23.35.50:8688/bedaplan/input_button.htm">
	  <p>
    		Projektzeit Erfassen / Projektnummer:
		<?php echo $current_nr; ?><br>
		<!-- here we show the current time in the field and add the timestamp to the database -->
	        <a href="http://213.23.35.50:8688/bedaplan/f_update_projecttime.php?current_nr=<?php echo $current_nr ?>&current_user=<?php echo $mitarbeiter ?>"  target="_blank"><img src="ankunft.jpg" border=0></a>
		

		

				
		<a href="http://213.23.35.50:8688/bedaplan/f_update_projecttime2.php?current_nr=<?php echo $current_nr ?>&current_user=<?php echo $mitarbeiter ?>"  target="_blank"><img src="abfahrt.jpg" border=0> </a>

		<br>
          </p>
        </form>
        </center>
   </td>
  </tr>

  <tr>
   <td>
      <!-- work time planner -->

      	<form action="http://213.23.35.50:8688/bedaplan/arbeitszeit.html">
	  <p>
    		<center>
		 Arbeitszeit Erfassung:<br>
	        <a href="http://213.23.35.50:8688/bedaplan/f_insert_worktime.php?current_user=<?php echo $mitarbeiter ?>" target="_blank"><img src="arbeitsbeginn.jpg" border=0></a>
	        <a href="http://213.23.35.50:8688/bedaplan/f_update_worktime.php?current_user=<?php echo $mitarbeiter ?>" target="_blank"><img src="arbeitsende.jpg" border=0></a><br>
		
		<a href="http://213.23.35.50:8688/bedaplan/f_insert_ill.php?current_user=<?php echo $mitarbeiter ?>" target="_blank"><img src="krank.jpg" border=0></a>

		<a href="http://213.23.35.50:8688/bedaplan/f_insert_free.php?current_user=<?php echo $mitarbeiter ?>" target="_blank"><img src="abwesend2.jpg" border=0></a>
                </center>
          </p>
        </form>
   </td>
  </tr>

  <tr>
   <td>
Fahrzeug ausw&auml;hlen:<br>

	 <input type="button" name="RE-SE-426" value="RE-SE-426" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50:8688/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-426')">
	 <input type="button" name="RE-SE-1060" value="RE-SE-1060" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50:8688/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1060')">
	 <input type="button" name="RE-SE-1050" value="RE-SE-1050" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50:8688/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1050')">
	 <input type="button" name="RE-SE-1030" value="RE-SE-1030" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50:8688/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1030')"><br>

	 <input type="button" name="RE-SE-2020" value="RE-SE-2020" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50:8688/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-2020')">

	 <input type="button" name="RE-SE-155" value="RE-SE-355" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50:8688/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-355')">

	 <input type="button" name="RE-SE-1120" value="RE-SE-1120" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50:8688/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1120')">

	 <input type="button" name="RE-SE-2040" value="RE-SE-2040" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50:8688/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-2040')"><br>

	 <input type="button" name="RE-SE-130" value="RE-SE-130" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50:8688/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-130')">

 <input type="button" name="RE-SE-1080" value="RE-SE-1080" Style="WIDTH:110" WIDTH="110"
	        onclick="window.open('http://213.23.35.50:8688/bedaplan/insert_vehicle.php?current_user=<?php echo $mitarbeiter ?>&vehicle=RE-SE-1080')">


   </td>
  </tr>

  <tr>
   <td>
<!-- further projects of the day appears in this field ... -->
        Weitere Tagesprojektet:<br><hr>
<?php 
        $bedaplan_query = "SELECT * FROM project WHERE project_done = '0' AND project_employee = '$mitarbeiter' AND project_date = '$datum'"; 
        $bedaplan_result = mysqli_query($db, $bedaplan_query);
        //create the table with the active projects
       
       // table headers are here
       $sorting = 1;
       while($row = $bedaplan_result->fetch_assoc()) 

        { 

        echo "Baustelle: ";
        echo $sorting;
	$sorting = $sorting + 1 ;
        echo "<br>";
        echo "<table border='3' frame='void'>";
	echo "<tr>";
	
	echo "<td style='width:600px' bgcolor='#FFFFFF'>";
	echo $row["project_description"];
	echo "</td>";
	
	echo "</td>";
	echo "</tr>";
 echo "</table>";
        } 

      

?>
   </td>
  </tr>

 </table>
<p align="right">

<input type="button" name="mehr" value="mehr" onclick="window.open('http://213.23.35.50:8688/bedaplan/more.php?current_user=<?php echo $mitarbeiter ?>&project_nr=<?php echo $current_nr ?>')">

</p>
<font size=1>Projekthomepage: <a href="https://github.com/SenftGmbH" alt="Projektseite">https://github.com/SenftGmbH</a><br>
bedaplan version 2.0.0 15.10.2014
</font>

 </body>
</html>
