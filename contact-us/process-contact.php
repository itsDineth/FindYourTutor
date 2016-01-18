<?php

   require_once("../template/header.php");
   require_once("../template/wrapper.php");
 ?>
 
   <div style="text-align:center ;margin-top:150px">
		<h1>Thank You for contacting us.</h1>
		<h3>We will get back to you soon.</h3>
   </div>
   
   
<?php
	if (isset($_POST['submit'])) {

		
		$firstName = $_POST['inputFirstName'];
		$lastName = $_POST['inputLastName'];
		$review= $_POST['inputReview'];
		$email = $_POST['inputEmail'];
		
		$Contact_insertQuery = "insert into contactmessages values('null','$firstName','$lastName','$email','$review')";
		if(!(mysql_query($Contact_insertQuery))){
			die(mysql_error());
		};
		
		
		$to = "pts@sachintha.com";
		$subject = "MESSAGE FROM USER";
		$message = "First Name: ".$firstName." Last Name: ".$lastName."\n".$review;
		$from = $email;
		$bcc = "dineth@sanchintha.com";
		sendEmail($from,$to,$subject,$message,$bcc);
		
		
	}
?>

<?php
 require_once("../template/footer.php");
?>