<!-- Bedaplan2 Version 2.0.0 16.10.2014 https://github.com/SenftGmbH/ -->
<?php

$mitarbeiter = $_GET["current_user"];
$current_nr = $_GET["current_nr"];
	
?>

<html>
 <head>
  <title>bedaplan</title>
  <meta name="viewport" content="width=500" />

 </head>
 <body>
 <img src="http://213.23.35.50:8688/bedaplan/bedaplanlogo.jpg">
Arbeitsbeginn f&uuml;r Mitarbeiter <?php echo $mitarbeiter ?>
<br><br>
<center>
 <a href="http://213.23.35.50:8688/bedaplan/update_worktime.php?current_user=<?php echo $mitarbeiter ?>"  target="_blank"><img src="arbeitsende.jpg" border=0></a><br><br><br>

 <a href="javascript:window.close()"><img src="hauptseite.jpg" border=0></a>
</center>  
 </body>
</html>
