<?php
	require_once("../template/header.php");
		
?>  
	  
<!-- form div starts -->
<div style="width:800px; margin:0 auto; padding-top:40px; min-height:750px;" class="card">

    <!-- alert start -->
    <legend style="padding-left:20px; font-size:24px"><strong>Contact Us</strong></legend>
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    	<p style="padding:20px;">
    	Do you have any questions? Or you want us to add a new tutoring category/subject to the website? Or are you a potential sponsor who is willing to advertise with us?<br>
<br>
Let us know your inquiries, features suggestions etc.<br>
<br>
    </p>
    <form class="form-horizontal" method="post" action="process-contact.php">

		<div id="firstName" class="control-group">
			<label class="control-label" for="inputFirstName">First Name*</label>
			<div class="controls">
				<input name="inputFirstName" type="text" class="span4" id="inputFirstName" placeholder="First Name" onkeyup="validateFirstName();" rel="popover" data-content="Please enter your first name." data-original-title="First Name" data-trigger="focus">
			</div>
		</div>
		<div id="lastName" class="control-group">
			<label class="control-label" for="inputLastName">Last Name*</label>
			<div class="controls">
				<input name="inputLastName" type="text" class="span4" id="inputLastName" placeholder="Last Name" onkeyup="validateLastName();" rel="popover" data-content="Please enter your last name." data-original-title="Last Name" data-trigger="focus">
			</div>
		</div>
		
		<div id="email" class="control-group">
			<label class="control-label" for="inputEmail">Email*</label>
			<div class="controls">
				<input name="inputEmail" type="email" class="span4" id="inputEmail" placeholder="email address" onkeyup="validateEmail();" rel="popover" data-content="Please enter your email address. It must be in the following format: john@doe.com" data-original-title="Email Address" data-trigger="focus">
			</div>
		</div>
	  
		<!-- review -->
		<div id="review" class="control-group">
			<label class="control-label" for="inputReview">Description</label>
			<div class="controls">
				<textarea name="inputReview"></textarea>
			</div>
		</div>  
		
		<div class="control-group">
			<div class="controls" style="float:left">          
				<button name="submit" id="submit" type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
    </form>
	</div>
</div>


	<script>  
      // popover function
	$(function () {
		$("#inputFirstName").popover();
		$("#inputLastName").popover();
		$("#inputEmail").popover();
		$("#inputUsername").popover();
		$("#inputPassword").popover();
	});

	// validate first name on blur; length > 0
	function validateFirstName() {
		if (($("#inputFirstName").val().length) > 0) {
			$("#firstName").removeClass("error");
			$("#firstName").addClass("success");
			return true;	
		} else {
			$("#firstName").removeClass("success");
			$("#firstName").addClass("error");
			return false;
		};
	};
	// validate last name on blur; length > 0
	function validateLastName() {
		if (($("#inputLastName").val().length) > 0) {
			$("#lastName").removeClass("error");
			$("#lastName").addClass("success");
			return true;	
		} else {
			$("#lastName").removeClass("success");
			$("#lastName").addClass("error");
			return false;
		};
	};
	// validate email address on blur; length > 0; regex validation
	function validateEmail() {
		
		var email = $("#inputEmail").val();
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm;
		
		
		if (($("#inputEmail").val().length) > 0 & re.test(email)) {
			$("#email").removeClass("error");
			$("#email").addClass("success");
			return true;	
		} else {
			$("#email").removeClass("success");
			$("#email").addClass("error");
			return false;
		};
	};
	
	$(document).ready(function(){
  		$("form").submit(function(){
			validateFirstName();
			validateLastName();
			validateEmail();
			
			if (validateFirstName() && validateLastName() && validateEmail() ) {
				return true;
			}
			return false;
		});
	});
      </script>
	<?php
	require_once("../template/footer.php");
?>
</div>
      