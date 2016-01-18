<?php
if (isset($_REQUEST['z'])) {
	
	session_start();
	require_once("../includes/functions.php");
    require_once("../includes/db.php");

	$zipCode = $_SESSION['zipcode'];
	$category = $_SESSION['category'];
	$subjects = explode (",", $_REQUEST['a']);
	//echo '<pre>';
	//print_r($subjects);
	//echo '</pre>';
	if (strlen($zipCode) > 0) {
		$sql = (mysql_query("SELECT * FROM
												(((users LEFT JOIN profile1 ON users.username = profile1.username)
													LEFT JOIN profile4 ON users.username = profile4.username)
														LEFT JOIN profile5 ON users.username = profile5.username)
												WHERE (pstatus = 6 && zipcode = '$zipCode') "
												));
	} else {
		$sql = (mysql_query("SELECT * FROM
												(((users LEFT JOIN profile1 ON users.username = profile1.username)
													LEFT JOIN profile4 ON users.username = profile4.username)
														LEFT JOIN profile5 ON users.username = profile5.username)
												WHERE (pstatus = 6) "
												));
	}
	$flagSubjects = false;
	$flagLocation = false;
	$flagTransport = false;
	$flagRadius = false;
	$flagEducation = false;
	$flagRate = true;
	$tutorCount = 0;
	while ($row = mysql_fetch_array($sql)) {
		$tutorUsername = $row['username'];
		foreach ($subjects as $subject) {
			$sqlSubs = mysql_fetch_array(mysql_query("SELECT * FROM profile4 WHERE username = '$tutorUsername'"));
			$sqlSubsArray = explode(" ", trim($sqlSubs['subjects']));
			
			$subjectsIntersection = array_intersect($subjects, $sqlSubsArray);
			//echo '<pre>';
			//print_r($subjectsIntersection);
			//echo '</pre>';
			if (arrayEqual($subjects, $subjectsIntersection)) {
				$flagSubjects = true;
			} else {
				$flagSubjects = false;
			}
			
		}
		
		if ($subjects[0] == 'null')
			$flagSubjects = true;
		// location
		$loc1 = $_REQUEST['ba'];
		$loc2 = $_REQUEST['bb'];
		$loc3 = $_REQUEST['bc'];
		$loc4 = $_REQUEST['bd'];
		
		$sqlLocations = mysql_fetch_array(mysql_query("SELECT * FROM profile5 WHERE username = '$tutorUsername'"));
		$sqlLocArray = explode(',', $sqlLocations['locations']);
		//print_r($sqlLocArray);
		if ($loc1 != '1' && $loc2!= '2' && $loc3!='3' && $loc4!='4') {
			$flagLocation = true;
		} else {
			if (in_array($loc1, $sqlLocArray) || in_array($loc2, $sqlLocArray) || in_array($loc3, $sqlLocArray) || in_array($loc4, $sqlLocArray)) {
				$flagLocation = true;
			} else {
				$flagLocation = false;
			}
		}
		// transport
		$transport = $_REQUEST['c'];
		$sqlTransportArray = $sqlLocations['transport'];
		if ($transport == $sqlTransportArray || $transport == 'any') {
			$flagTransport = true;
		} else {
			$flagTransport = false;
		}
		// radius
		$radius = $_REQUEST['d'];
		//echo $radius;
		$sqlRadius = $sqlLocations['radius'];
		if (( $radius > $sqlRadius && $sqlRadius != -1) || $radius == -1) {
			$flagRadius = true;
		} else {
			$flagRadius = false;
		}
		
		// education
		$education = $_REQUEST['e'];
		$sqlEducation = mysql_fetch_array(mysql_query("SELECT * FROM profile2 WHERE username = '$tutorUsername'"));
		if ((strlen($sqlEducation['highschool']) > 0 && $education == 'highschool') 
				|| (strlen($sqlEducation['degree']) > 0 && $education == 'college')
				|| $education == 'any') {
					$flagEducation = true;
		} else {
			$flagEducation = false;
		}
		// experience
		// rate
		$lRate = $_REQUEST['g'];
		$hRate = $_REQUEST['h'];
		//echo $hRate;
		if (strlen($lRate) == 0 && strlen($hRate) > 0) {
			$sqlMax = mysql_query("SELECT * FROM profile5 WHERE (username = '$tutorUsername' && rate <= '$hRate' );");
			if (mysql_affected_rows() > 0) {
				
				$flagRate = true;
			} else {
				$flagRate = false;
			}
		} else if (strlen($hRate) == 0 && strlen($lRate) > 0) {
			$sqlMax = mysql_query("SELECT * FROM profile5 WHERE (username = '$tutorUsername' && rate >= '$lRate' );");
			if (mysql_affected_rows() > 0) {
				
				$flagRate = true;
			} else {
				$flagRate = false;
			}
		} else if (strlen($hRate) > 0 && strlen($lRate) > 0) {
			$sqlMax = mysql_query("SELECT * FROM profile5 WHERE (username = '$tutorUsername' && rate BETWEEN '$lRate' AND '$hRate' );");
			if (mysql_affected_rows() > 0) {
				
				$flagRate = true;
			} else {
				$flagRate = false;
			}
		} else {
			$flagRate = true;
		}
		/////
		if (!$flagSubjects) {
			continue;
		}
		if (!$flagLocation) {
			continue;
		}
		if (!$flagTransport) {
			continue;
		}
		if (!$flagRadius) {
			continue;
		}
		if (!$flagEducation) {
			continue;
		}
		if (!$flagRate) {
			continue;
		}		
		include("result.php");
		$tutorCount++;  
		     
 	}
	if ($tutorCount == 0) {
		echo "<h2>No results!</h2>";
	}
} else {
	include("result.php");  
}

?>