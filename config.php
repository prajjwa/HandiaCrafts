<?php
	$conn = new mysqli("localhost","root","","handicraft");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>