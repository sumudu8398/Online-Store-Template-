<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'team_apex';
	
	//create a DB connection
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	if(!$conn) 
	{ 
		die('Could not establish connection to database: '. mysqli_error($conn));
	}	
	mysqli_select_db($conn, $dbname);
?>		