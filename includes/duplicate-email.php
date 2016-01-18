<?php
require_once("../includes/db.php");
require_once("../includes/functions.php");

if (isset($_GET['email'])) {
	$email = $_GET['email'];
	$query = mysql_query("SELECT * FROM users WHERE email = '$email';");
	if (mysql_affected_rows() > 0) {
		echo 1;
	}
} else {
	echo 0;
}

?>