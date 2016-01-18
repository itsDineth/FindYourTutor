<?php
session_start();
require_once("../includes/db.php");
require_once("../includes/functions.php");


if (isset ($_REQUEST['rating1']) ) {
	$loggedUser = $_SESSION['USERID'];	
	$rating1 = $_REQUEST['rating1'];
	$rating2 = $_REQUEST['rating2'];
	$rating3 = $_REQUEST['rating3'];
	$rating4 = $_REQUEST['rating4'];
	$summary = addslashes($_REQUEST['reviewSummary']);
	$review = addslashes($_REQUEST['inputReview']);
	$tutor = $_REQUEST['tutorID'];
	$sqlReview = mysql_query("INSERT INTO reviews VALUES (NULL, '$rating1', '$rating2', '$rating3', '$rating4', '$summary', '$review', '$loggedUser', '$tutor')");
	
}

if (mysql_affected_rows() > 0) {
	echo 1;
} else {
	echo 0;
}
?>