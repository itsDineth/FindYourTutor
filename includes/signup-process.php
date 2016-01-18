<?php
require_once("../includes/db.php");
require_once("../includes/functions.php");
if (isset($_POST['firstName'])) {
	$firstName = addslashes($_POST['firstName']);
	$lastName = addslashes ($_POST['lastName']);
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];
	$date = $month." ".$day." ".$year;
	if (isset($_POST['date']) && strlen($_POST['date']) > 0) {
		$dob = $_POST['date'];
	} else {
		if (isset($_POST['day'])) {
			$dob = date('Y-m-d', strtotime($date));
		} else {
			$dob = "0000-00-00";
		}
	}
	if (isset($_POST['ssn']) && strlen($_POST['ssn']) > 0) {
		$ssn = addslashes($_POST['ssn']);
	}
	$email = addslashes ($_POST['email']);
	$add1 = addslashes($_POST['add1']);
	$add2 = addslashes($_POST['add2']);
	$city = addslashes($_POST['city']);
	if ($_POST['state'] == -1) {
		$state = "";
	} else {
		$state = addslashes($_POST['state']);
	}
	$zipCode = addslashes($_POST['zipCode']);
	$userName = addslashes($_POST['username']);
	$password1 = hash('sha512', $_POST['password1']);
	$password2 = hash('sha512', $_POST['password2']);
	
	if (isset($ssn) && strlen($ssn) > 0) {
		$userCred_insertQuery = "INSERT INTO usercredentials (username) VALUES ('$userName');";
		$users_insertQuery = "
								INSERT INTO 
									users 
										(
											firstName, 
											lastName, 
											dob, 
											email, 
											address1, 
											address2, 
											city, 
											state, 
											zipcode, 
											userRoleID, 
											username,
											password,
											ssn,
											pstatus
										) 
									values
										(
											'$firstName',
											'$lastName',
											'$dob',
											'$email',
											'$add1',
											'$add2',
											'$city',
											'$state',
											'$zipCode',
											2,
											'$userName',
											'$password2',
											'$ssn',
											0
										);";
		//sending mail
		$to = $email;
		$subject = "Registration Successfull";
		$message = "Congratulations! Your Registration was Successfull.Your Username is ".$userName." and Password is ".$password1;
		$from = "samir@company.com";
		$bcc = "dineth@sanchintha.com";
	
		if(mysql_query($userCred_insertQuery) && mysql_query($users_insertQuery)){
			sendEmail($from,$to,$subject,$message,$bcc);
			echo 1;
		}
		else{
			echo -1;
		}
	} else {
		
		$userCred_insertQueryS = "INSERT INTO usercredentials (username) VALUES ('$userName');";
		$users_insertQueryS = "
								INSERT INTO 
									users 
										(
											firstName, 
											lastName, 
											dob, 
											email, 
											address1, 
											address2, 
											city, 
											state, 
											zipcode, 
											userRoleID, 
											username,
											password
										) 
									values
										(
											'$firstName',
											'$lastName',
											'$dob',
											'$email',
											'$add1',
											'$add2',
											'$city',
											'$state',
											'$zipCode',
											1,
											'$userName',
											'$password2'
										);";
	
		//sending mail
		$to = $email;
		$subject = "Registration Successfull";
		$message = "Congratulations! Your Registration was Successfull.Your Username is ".$userName;
		$from = "no-reply@findyourtutor.us";
		$bcc = "dineth@sanchintha.com";
	
		if(mysql_query($userCred_insertQueryS) && mysql_query($users_insertQueryS)){
			sendEmail($from,$to,$subject,$message,$bcc);
			echo 1;
		}
		else{
			echo -1;
		}												   
	}
		
}
else {
	echo -1;
}
?>