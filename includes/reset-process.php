<?php
session_start();
require_once("../includes/db.php");
require_once("../includes/functions.php");



if (strlen($_POST['remail1']) > 0) {
	$email = $_POST['remail1'];
	$query = "SELECT * FROM users WHERE email = '$email' LIMIT 1;";
	$result = mysql_fetch_array(mysql_query($query)); 
	$tempPassword = substr(md5(rand(9999,99999)),0,8);
	$update = mysql_query("UPDATE users SET tempPassword = '$tempPassword' WHERE email = '$email'");
	sendEmail ("pts@sachintha.com", $email, "PTS: Password recovery", "You have requested to change your password. Please follow the link to reset your password. <a href='http://findyourtutor.us/reset-password/?auth=$tempPassword'>http://findyourtutor.us/reset-password/?auth=$tempPassword</a>", "dineth@sachintha.com");
}

else if (strlen($_POST['firstName']) > 0) {
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['rmail2'];
	$query = "SELECT * FROM users WHERE (email = '$email' && firstName = '$firstName' && lastName = '$lastName' ) LIMIT 1;";
	$result = mysql_fetch_array(mysql_query($query)); 
	$usernamerp = $result['username'];
	sendEmail ("pts@sachintha.com", $email, "PTS: Username recovery", "Username: ".$usernamerp, "dineth@sachintha.com");
	
}


if (mysql_affected_rows() > 0) {
	echo 1;
}
else {
	echo -1;
}

?>