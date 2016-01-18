<?php
session_start();
require_once("../includes/db.php");
require_once("../includes/functions.php");

$username = addslashes($_POST['username']);
$password =  hash('sha512', $_POST['password']);
if (isset($_POST['rememberme'])) {
	$rememberme = $_POST['rememberme'];
} else {
	$rememberme = '';
}

$matchquery = "SELECT * FROM users WHERE username = '$username' && password = '$password' && lockedTill < NOW();";

$pstatus = -1;

$result = mysql_query($matchquery); 

if (mysql_affected_rows() > 0) {
	$row = mysql_fetch_array($result);
	$userID = $row['ID'];
	if ($rememberme == 'on') {
		setcookie('userid', $userID, time ()+7200);
	} else {
		$_SESSION['USERID'] = $row['ID'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['status'] = $row['pstatus'];
		$_SESSION['userRoleType'] = $row['userRoleID'];
	}
	if ($row['pstatus']> -1) {
		$pstatus = $row['pstatus'];
	} else {
		$pstatus = -1;
	}
	mysql_query("UPDATE users SET dateLoggedIn = NOW(), loginAttempts = 0, locked = 0 WHERE ID = $userID");

} else {
	$sql = mysql_query("SELECT * FROM users WHERE username = '$username'");
	$result2 = mysql_fetch_array($sql); 
	$lock = $result2['locked'];
	$attempts = $result2['loginAttempts'];
	if (mysql_affected_rows() > 0 && $lock == 0 && $attempts < 5) {
		mysql_query("UPDATE users SET loginAttempts = loginAttempts + 1 WHERE username = '$username'");
	} else if ($attempts > 4) {
		mysql_query("UPDATE users SET locked = 1, lockedTill = NOW() + INTERVAL 5 MINUTE WHERE username = '$username'");
		$pstatus = 10;
	}
}
if (isset($_SESSION['USERID']) || isset($_COOKIE['userid'])) {
	if ($pstatus > -1) {
		echo 0;
	} else {
		echo 1;
	}
}
else {
	if ($pstatus == 10) {
		echo 10;
	} else {
		echo -1;
	}
}


?>