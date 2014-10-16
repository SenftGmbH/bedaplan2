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
Ankunft f&uuml;r Mitarbeiter <?php echo $mitarbeiter ?> und Projektnummer <?php echo $current_nr ?>
<br><br>
<center>
 <a href="http://213.23.35.50:8688/bedaplan/update_projecttime.php?current_nr=<?php echo $current_nr ?>&current_user=<?php echo $mitarbeiter ?>"  target="_blank"><img src="ankunft.jpg" border=0></a><br><br><br>

 <a href="javascript:window.close()"><img src="hauptseite.jpg" border=0></a>
</center>  
 </body>
</html>
