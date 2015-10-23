<?php
	// Create connection
	$mysqli = new mysqli('localhost','root','','lms');

	// Check connection
	if (mysqli_connect_errno()) {
  	echo "<b>Failed to connect to MySQL</b>: " . mysqli_connect_error();
	}
?>
