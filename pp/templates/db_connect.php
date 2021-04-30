<?php 

	session_start();
	$username = "";
	$errors = array();

	// connect to the database
	$conn = mysqli_connect('localhost', 'Ken', 'ken@123', 'service');

	// check connection
	if(!$conn) :
		echo 'Connection error: '. mysqli_connect_error();
	else : 
		//echo 'DB connected' . '<br>';
	endif;

?>