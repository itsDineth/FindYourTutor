<?php

	$username = $_SESSION['username'];
	$user_slash = "'".$username."'";
	$query2 = "select * from users where username = ".$user_slash.";";
	$result = mysql_query($query2);
	$row = mysql_fetch_array($result);
	$status = $row['pstatus'];
		
	
	if($status == 3){
		$allSubjects = "";
		
		if (isset($_POST['English'])) {
			$english = $_POST['English'];
		} else {
			$english = '';
		}
		if (isset($_POST['Spanish'])) {
			$spanish = $_POST['Spanish'];
		} else {
			$spanish = '';
		}
		if (isset($_POST['French'])) {
			$french = $_POST['French'];
		} else {
			$french = '';
		}
		if (isset($_POST['German'])) {
			$german = $_POST['German'];
		} else {
			$german = '';
		}
		if (isset($_POST['Mandarin'])) {
			$mandarin = $_POST['Mandarin'];
		} else {
			$mandarin = '';
		}
		foreach ($_POST['subjects'] as $result)
			$allsubjects = $result." ".$allsubjects;
		
		$languages = $english." ".$spanish." ".$french." ".$german." ".$mandarin;
		$special = addslashes(trim($_POST['hiddenSP']));
		
		$username = "'".$username."'";
		$allsubjects = "'".$allsubjects."'";
		$languages = "'".$languages."'";
		$special = "'".$special."'";
		
		$query = "insert into profile4 values (".$user_slash.",".$allsubjects.",".$languages.",".$special.");";
		if(!mysql_query($query)){
			echo mysql_error();
		}
		else{
			$query2 = "update users set pstatus = 4 where username = ".$user_slash.";";
			if(!mysql_query($query2)){
				echo mysql_error();
			}
		}
	}
?>