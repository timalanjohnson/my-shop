<?php
	/*
	Timothy Johnson
	17002289
	WEDE6011
	*/

$Servername = "localhost";
$Username = "root";
$Password = "";
$DBname = "myshop";

$DBConn = new mysqli($Servername, $Username, $Password, $DBname);

if ($DBConn->connect_error) {
	die("Connection failed: " . $DBConn->connect_error);
} else {
	// Connection is successful
}

?>