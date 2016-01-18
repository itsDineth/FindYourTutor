<?php
session_start();
require_once("../includes/db.php");
require_once("../includes/functions.php");

$password = addslashes($_POST['password1']);
$password =  hash('sha512', $password);
$tempPass = $_POST['auth'];

mysql_query("UPDATE users SET password = '$password', tempPassword = '' WHERE tempPassword = '$tempPass'");


if (mysql_affected_rows() > 0) {
	echo 1;
}
else {
	echo 0;
}


?>