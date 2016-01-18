<?php

	$username = $_SESSION['username'];
	$user_slash = "'".$username."'";
	$query2 = "select * from users where username = ".$user_slash.";";
	$result = mysql_query($query2);
	$row = mysql_fetch_array($result);
	$status = $row['pstatus'];
	
	if($status == 0){
		$nickname = addslashes($_POST['nickname']);
		$gender = addslashes($_POST['sex']);
		$tagline = addslashes($_POST['tagline']);
		$biography = addslashes(trim($_POST['biography']));
		$google = addslashes($_POST['google-plus']);
		$facebook = addslashes($_POST['facebook']);
		$twitter = addslashes($_POST['twitter']);
		$linkedin = addslashes($_POST['linkedin']);
		$skype = addslashes($_POST['skype']);
		$youtube = addslashes($_POST['youtube']);
			
		
		$nick_s = "'".$nickname."'";
		$gender_s = "'".$gender."'";
		$tag_s = "'".$tagline."'";
		$bio_s = "'".$biography."'";
		$gg_s = "'".$google."'";
		$fb_s = "'".$facebook."'";
		$tw_s = "'".$twitter."'";
		$li_s = "'".$linkedin."'";
		$sk_s = "'".$skype."'";
		$ytb_s = "'".$youtube."'";
		
		$image = "'".mysql_real_escape_string((file_get_contents($_FILES['file']['tmp_name'])))."'";
		
		
		
		$values = $user_slash.",".$image.",".$nick_s.",".$gender_s.",".$tag_s.",".$bio_s.",".$gg_s.",".$fb_s.",".$tw_s.",".$li_s.",".$sk_s.",".$ytb_s;
		$query = "insert into profile1 values(".$values.");";
		
		if(!mysql_query($query)){
			echo mysql_error();
		}
		else{
			$query2 = "update users set pstatus = 1 where username = ".$user_slash.";";
			if(!mysql_query($query2)){
				echo mysql_error();
			}
		}
	}
	

?>