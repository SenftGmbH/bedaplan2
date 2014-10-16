<!-- Bedaplan2 Version 2.0.0 16.10.2014 https://github.com/SenftGmbH/ -->
<?php

$mitarbeiter = $_GET["current_employee"];
$current_nr = $_GET["current_nr"];
	
?>

<html>
 <head>
  <title>bedaplan</title>
  <meta name="viewport" content="width=500" />

 </head>
 <body>
 <img src="http://213.23.35.50:8688/bedaplan/bedaplanlogo.jpg">
Projektnotiz hinzuf&uuml;gen für <?php echo $mitarbeiter ?> und Projekt Nr. <?php echo $current_nr ?> 
<br><br>
<center>

<b>Projektnotiz</b>
	 <form action="http://213.23.35.50:8688/bedaplan/insert_ptinfo.php?current_nr=<?php echo $current_nr ?>&current_user=<?php echo $mitarbeiter ?>" method="post">
           <input name="info_content" type="text" size="30" maxlength="128">
	  
           <input type="submit" value=" Info hinzuf&uuml;gen ">
          </form>


<br><br><br>

 <a href="javascript:window.close()"><img src="hauptseite.jpg" border=0></a>
</center>  
 </body>
</html>
