<?php

	$username = $_SESSION['username'];
	$user_slash = "'".$username."'";
	$query2 = "select * from users where username = ".$user_slash.";";
	$result = mysql_query($query2);
	$row = mysql_fetch_array($result);
	$status = $row['pstatus'];
		
	
	if($status == 5){
		
		$date = date('Y-m-d');
		$term = $_POST['inputTerm'];
		$termend = Date('Y-m-d', strtotime("+".$term));
		$amount = $_POST['inputInvoice'];
		$cardtype = addslashes($_POST['inputCardType']);
		$cardno = addslashes($_POST['inputCardNo']);
		$securityno = addslashes($_POST['inputSecurity']);
		$expireyear = addslashes($_POST['inputExpireyear']);
		$expiremonth = addslashes($_POST['inputExpiremonth']);
		$fullname = addslashes($_POST['inputFullname']);
		$zipcode = addslashes($_POST['inputZipcode']);
		
		$profile6_insertQuery = "insert into profile6 values('$username','$date','$term','$termend','$amount','$cardtype','$cardno','$securityno','$expireyear','$expiremonth','$fullname','$zipcode')";
		mysql_query($profile6_insertQuery);
		
		if (!mysql_affected_rows() > 0)
			$nothing = '';
		
			$query21 = mysql_query("update users set pstatus = 6 where username = ".$user_slash.";");
			$email = $row['email'];
	
		//sending mail
		$to = $email;
		$subject = "Payment Made";
		$message = "Thank you for your payment. ".$amount." has been charged on your ".$cardtype." card";
		$from = $email;
		$bcc = "dineth@sanchintha.com";
		
		sendEmail($from,$to,$subject,$message,$bcc);
		
		//function sendEmail($from, $to, $subject, $message, $bcc) {
			/*$contentType = 'text/html;charset="UTF-8"';
			
			// create email headers
			$headers = 'From: '.$from."\r\n".
			'Bcc: '.$bcc."\r\n".
			'Content-Type: '.$contentType."\r\n".
			'Reply-To: '.$from."\r\n" .
			'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers);*/
		//}
		
		
		//echo "Thank you!";
	}
?>
<div style="margin:0 auto; font-size:36px; padding-top:10%; line-height:60px; text-align:center;">
<?php

	echo "Thank you for your paymant. You advertisement will be displayed until the selected term ends.";
?>

</div>
