<?php

	$username = $_SESSION['username'];
	$user_slash = "'".$username."'";
	$query2 = "select * from users where username = ".$user_slash.";";
	$result = mysql_query($query2);
	$row = mysql_fetch_array($result);
	$status = $row['pstatus'];
	
	if($status == 1){
		
		$highschoolArray = "'".addslashes(trim($_POST['hiddenHS']))."'";
		$degreeArray = "'".addslashes(trim($_POST['hiddenDG']))."'";
		$certificateArray = "'".addslashes(trim($_POST['hiddenCT']))."'";
		
		$query = "insert into profile2 values (".$user_slash.",".$highschoolArray.",".$degreeArray.",".$certificateArray.");";
		
		
		if(!mysql_query($query)){
			echo mysql_error();
		}
		else{
			$query2 = "update users set pstatus = 2 where username = ".$user_slash.";";
			if(!mysql_query($query2)){
				echo mysql_error();
			}
		}
	} else {
		//
	}
?>
	
	