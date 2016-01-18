<?php 

require_once("../includes/db.php");

$ID = $_GET['ID'];

$sql = mysql_fetch_array(mysql_query("SELECT * FROM profile1 WHERE username = '$ID'"));
header ("content-type: image/jpeg");
echo $sql['avatar'];


?>