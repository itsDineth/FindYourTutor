<?php
// return a list of months [Jan, Dec]
function months ($format) {
	for ($i = 1; $i <= 12; $i++) {
		$month = date($format, mktime(0, 0, 0, $i+1, 0, 0));
		$months[$i] = $month;
	}
	ksort($months);
	return $months;
}


// return a list of days [1, 31]
function days ($format) {
	for ($i = 1; $i <= 31; $i++) {
		$days[$i] = $i;
	}
	ksort($days);
	return $days;
}


// return a list of years [-100, current]
function years ($format) {

	$currentYear = date ("Y");
	$earliestYear = $currentYear - 100;
	for ($i = $earliestYear; $i < $currentYear; $i++) {
		$years[$i] = $i;
	}
	ksort($years);
	return $years;
}


// list of the US states
$US_States = array(
	'AL'=>'ALABAMA',
	'AK'=>'ALASKA',
	'AS'=>'AMERICAN SAMOA',
	'AZ'=>'ARIZONA',
	'AR'=>'ARKANSAS',
	'CA'=>'CALIFORNIA',
	'CO'=>'COLORADO',
	'CT'=>'CONNECTICUT',
	'DE'=>'DELAWARE',
	'DC'=>'DISTRICT OF COLUMBIA',
	'FM'=>'FEDERATED STATES OF MICRONESIA',
	'FL'=>'FLORIDA',
	'GA'=>'GEORGIA',
	'GU'=>'GUAM GU',
	'HI'=>'HAWAII',
	'ID'=>'IDAHO',
	'IL'=>'ILLINOIS',
	'IN'=>'INDIANA',
	'IA'=>'IOWA',
	'KS'=>'KANSAS',
	'KY'=>'KENTUCKY',
	'LA'=>'LOUISIANA',
	'ME'=>'MAINE',
	'MH'=>'MARSHALL ISLANDS',
	'MD'=>'MARYLAND',
	'MA'=>'MASSACHUSETTS',
	'MI'=>'MICHIGAN',
	'MN'=>'MINNESOTA',
	'MS'=>'MISSISSIPPI',
	'MO'=>'MISSOURI',
	'MT'=>'MONTANA',
	'NE'=>'NEBRASKA',
	'NV'=>'NEVADA',
	'NH'=>'NEW HAMPSHIRE',
	'NJ'=>'NEW JERSEY',
	'NM'=>'NEW MEXICO',
	'NY'=>'NEW YORK',
	'NC'=>'NORTH CAROLINA',
	'ND'=>'NORTH DAKOTA',
	'MP'=>'NORTHERN MARIANA ISLANDS',
	'OH'=>'OHIO',
	'OK'=>'OKLAHOMA',
	'OR'=>'OREGON',
	'PW'=>'PALAU',
	'PA'=>'PENNSYLVANIA',
	'PR'=>'PUERTO RICO',
	'RI'=>'RHODE ISLAND',
	'SC'=>'SOUTH CAROLINA',
	'SD'=>'SOUTH DAKOTA',
	'TN'=>'TENNESSEE',
	'TX'=>'TEXAS',
	'UT'=>'UTAH',
	'VT'=>'VERMONT',
	'VI'=>'VIRGIN ISLANDS',
	'VA'=>'VIRGINIA',
	'WA'=>'WASHINGTON',
	'WV'=>'WEST VIRGINIA',
	'WI'=>'WISCONSIN',
	'WY'=>'WYOMING',
	'AE'=>'ARMED FORCES AFRICA \ CANADA \ EUROPE \ MIDDLE EAST',
	'AA'=>'ARMED FORCES AMERICA (EXCEPT CANADA)',
	'AP'=>'ARMED FORCES PACIFIC'
);

// check login
function isLoggedIn () {
	//print_r($_COOKIE);
	if (isset($_SESSION['USERID']) || isset($_COOKIE['userid'])) {
		return true;
	} else {
		return false;
	}
}

function sendEmail ($from, $to, $subject, $message, $bcc) {
	//$from = "no-reply@pts.com";
	$contentType = 'text/html;charset="UTF-8"';
	// create email headers
	$headers = 'From: '.$from."\r\n".
	'Bcc: '.$bcc."\r\n".
	'Content-Type: '.$contentType."\r\n".
	'Reply-To: '.$from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail($to, $subject, $message, $headers); 
	//echo 'wk';
}

// current user info
function currentUser ($id) {
	$sql = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = $id"));
	return $sql;
}

// 2 arrays euality
function arrayEqual($a, $b) {
    return (is_array($a) && is_array($b) && array_diff($a, $b) === array_diff($b, $a));
}
// date in US format
function getMonthName ($value) {
	$months = array(
					'01' => 'January',
					'02' => 'February',
					'03' => 'March',
					'04' => 'April',
					'05' => 'May',
					'06' => 'June',
					'07' => 'July',
					'08' => 'August',
					'09' => 'September',
					'10' => 'October',
					'11' => 'November',
					'12' => 'December'
					);
	return $months[$value];
}
function dateInUS ($string) {
	$date = explode("-", $string);
	$day = $date[2];
	$year = $date[0];
	$month = getMonthName($date[1]);
	$dateInUS = $month." ".$day.", ".$year;
	return $dateInUS;
}
?>