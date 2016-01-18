<?php
require_once("../includes/db.php");
require_once("../includes/functions.php");

if (isset($_GET['username'])) {
	$username = $_GET['username'];
	$query = mysql_query("SELECT * FROM usercredentials WHERE username = '$username';");
	if (mysql_affected_rows() > 0) {
		echo 1;
	} else {
		echo -1;
	}
} else {
	echo 0;
}

?>