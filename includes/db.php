<?php
/*$USER = "root";
$PASSWORD = "";
$HOST = "localhost";
$DATABASE = "c1idineth_pts";
*/

$USER = "c0cse3310";
$PASSWORD = "trustnoone";
if (($_SERVER['SERVER_ADDR']) == '142.4.214.87')
	$HOST = 'localhost';
else
	$HOST = "142.4.213.31";
$DATABASE = "c0cse3310";
//mysql
$conn=mysql_connect($HOST,$USER,$PASSWORD) or die ("Unable to connect to the database:".mysql_error());

//select database
mysql_select_db($DATABASE,$conn) or die ("Unable to select the database:".mysql_error());

?>