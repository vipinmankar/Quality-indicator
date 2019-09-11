<?php
    $servername = "localhost";
	$username = "id8559341_vipin";
	$password = "vipin";
	$database = "id8559341_airquality";

	$conn = mysqli_connect($servername, $username, $password, $database);

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>
