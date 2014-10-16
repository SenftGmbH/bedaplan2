<?php
// connect to the database
$db = mysqli_connect("localhost", "user", "password", "table");

// and show if there any errors
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}

?>
