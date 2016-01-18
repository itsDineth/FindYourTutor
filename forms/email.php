<?php

function sendEmail ($from, $to, $subject, $message, $bcc) {
	$contentType = 'text/html;charset="UTF-8"';
	
	// create email headers
	$headers = 'From: '.$from."\r\n".
	'Bcc: '.$bcc."\r\n".
	'Content-Type: '.$contentType."\r\n".
	'Reply-To: '.$from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail($to, $subject, $message, $headers); 
}

$to = "dineth@sachintha.com";
$subject = "Registration Successfull";
$message = "Congratulations! Your Registration was Successfull.Your UserName is ".$userName." and Password is ".$password1;
$from = "samir@company.com";
$bcc = "";


sendEmail($from,$to,$subject,$message,$bcc);

?>