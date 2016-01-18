<?php

	$username = $_SESSION['username'];
	$user_slash = "'".$username."'";
	$query2 = "select * from users where username = ".$user_slash.";";
	$result = mysql_query($query2);
	$row = mysql_fetch_array($result);
	$status = $row['pstatus'];
		
	
	if($status == 4){
		
		$hourlyrate = addslashes($_POST['hourlyrate']);
		$locations = '';
		foreach ($_POST['location'] as $result)
			$locations = $result.",".$locations;
			
		$hasTransport = $_POST['transHas'];
		$travelRadius = $_POST['radius'];
		
		$hourly_slash = "'".$hourlyrate."'";
		$loc_slash = "'".$locations."'";
		$trans_slash = "'".$hasTransport."'";
		$radius_slash = "'".$travelRadius."'";
		$username = "'".$username."'";
		
		$query = "insert into profile5 values (".$user_slash.",".$hourly_slash.",".$loc_slash.",".$trans_slash.",".$radius_slash.");";
		if(!mysql_query($query)){
			echo mysql_error();
		}
		else{
			$query2 = "update users set pstatus = 5 where username = ".$user_slash.";";
			if(!mysql_query($query2)){
				echo mysql_error();
			}
		}
	} else {
		//echo '<script>alert ("status not 3");</script>';
	}

?>