<?php
	session_start();
	session_destroy();
	setcookie("userid", '', time () - 7200);
	$referrer = $_SERVER['HTTP_REFERER'];
	header ("Location: ../");
?>