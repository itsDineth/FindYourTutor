<?php
	require_once("../includes/db.php");
	require_once("../includes/functions.php");
	
	$tutorID = $_POST['tutorID'];
	$userID = $_POST['loggedInUserID'];
	
	
	$message = addcslashes($_POST['inputComments']);
	$sqlTutorEmail = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE ID = '$tutorID'"));
	$sqlUserEmail = mysql_fetch_array((mysql_query("SELECT * FROM users WHERE username = '$userID'")));
	
	$from = $sqlUserEmail['email'];
	$to = $sqlTutorEmail['email'];
	
	sendEmail ($from, $to, "Message From FindYourTutor.com", $message, "dineth@sachintha.com");
	
	echo 1;
	
	

?>