<?php

	$username = $_SESSION['username'];
	$user_slash = "'".$username."'";
	$query2 = "select * from users where username = ".$user_slash.";";
	$result = mysql_query($query2);
	$row = mysql_fetch_array($result);
	$status = $row['pstatus'];
		
	if($status == 2){
		$experience = intval($_POST['experience']);
		$exp = " ";
		
		if($experience == 1)
			$exp = "none";
		elseif ($experience == 2)
			$exp = "6 months+";
		elseif ($experience == 3)
			$exp = "1 years+";
		elseif ($experience == 4)
			$exp = "3 years+";
		elseif ($experience == 5)
			$exp = "5 years+";
		elseif ($experience == 6)
			$exp = "10 years+";
		elseif ($experience == 7)
			$exp = "20 years+";
		
		
		$exp = "'".$exp."'";
		
		$detail_experience = "'".addslashes(trim($_POST['detail_experience']))."'";
		
		$query = "insert into profile3 values (".$user_slash.",".$exp.",".$detail_experience.");";
		
		
		if(!mysql_query($query)){
			echo mysql_error();
		}
		else{
			$query2 = "update users set pstatus = 3 where username = ".$user_slash.";";
			if(!mysql_query($query2)){
				echo mysql_error();
			}
		}
	}
?>