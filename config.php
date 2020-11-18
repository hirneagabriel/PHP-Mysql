<?php 
   // connect to database
    define ('ROOT_PATH', realpath(dirname(__FILE__)));
	$mysqli = mysqli_connect('localhost','id15313870_gabriel','@#H-m}|#fL8&9cOK','id15313870_magazin');

	if (!$mysqli) {
		die("Error connecting to database: " . mysqli_connect_error());
    }
?>