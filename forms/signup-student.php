<div style="display:none; width:700px; margin:0 auto;" class="alert alert-success fade-in success-notify">
<h3>Congratulations!</h3><br /><h4>You have successfully registered with us.<br />Please click <a href="../login/">here</a> or the login button to proceed.
</h4></div>

<!-- form div starts -->
<div class="s-form" style="width:700px; margin:0 auto; ">
    <!-- alert starst -->
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    <form id="signup-form" class="form-horizontal" action="../includes/signup-process.php" method="post">
   
      <div id="firstName" class="control-group">
        <label class="control-label" for="inputFirstName">First Name*</label>
        <div class="controls">
          <input name="firstName" type="text" class="span4" id="inputFirstName" placeholder="First Name" onkeyup="validateFirstName();" 
          rel="popover" data-content="Please enter your first name." data-original-title="First Name" data-trigger="focus">
       
        </div>
      </div>
      <div id="lastName" class="control-group">
        <label class="control-label" for="inputLastName">Last Name*</label>
        <div class="controls">
          <input name="lastName" type="text" class="span4" id="inputLastName" placeholder="Last Name" onkeyup="validateLastName();" 
           rel="popover" data-content="Please enter your last name." data-original-title="Last Name" data-trigger="focus">
        </div>
      </div>
      
      
      <div id="DOB" class="control-group">
        <label class="control-label" for="inputDOB">Date of Birth</label>
        <div class="controls controls-row row-fluid">
        	<input id="dob5" name="date" type="date" onkeyup="validateDOB();" />
          <select name="month" class="selectpicker span3" id="month" style="" onchange="validateDOB();">
          		<option value="-1">-month-</option>
                <?php
					$months = months("F");
					foreach ($months as $month) {
						echo '<option value="'.$month.'">'.$month.'</option>';
					}
				?>
          </select>
          <select name="day" class="span2 selectpicker" id="day" onchange="validateDOB();">
       		<option value="-1">-day-</option>
                <?php
					$days = days("j");
					foreach ($days as $day) {
						echo '<option value="'.$day.'">'.$day.'</option>';
					}
				?>
          </select>
           <select name="year" class="span2 selectpicker" id="year" onchange="validateDOB();">
       		 <option value="-1">-year-</option>
                <?php
					$years = years("j");
					rsort($years);
					foreach ($years as $year) {
						echo '<option value="'.$year.'">'.$year.'</option>';
					}
				?>
          </select>
        </div>
      </div>

      
      
      <div id="email" class="control-group">
        <label class="control-label" for="inputEmail">Email*</label>
        <div class="controls">
          <input name="email" type="email" class="span4" id="inputEmail" placeholder="email address" onkeyup="validateEmail();"
          rel="popover" data-content="Please enter your email address. It must be in the following format: john@doe.com" data-original-title="Email Address" data-trigger="focus">
        </div>
      </div>
    
      <!-- address starts -->
      <div id="address1" class="control-group">
        <label class="control-label" for="inputAddress1">Street Address</label>
        <div class="controls">
          <input name="add1" type="text" class="span4" id="inputAddress1" placeholder="street address" onkeyup="validateAddress ();">
        </div>
      </div>
      <div id="address2" class="control-group">
        <label class="control-label" for="inputAddress2">Suit/Apt #</label>
        <div class="controls">
          <input name="add2" type="text" id="inputAddress2" placeholder="apt # {optional}">
        </div>
      </div>
      <div id="city" class="control-group">
        <label class="control-label" for="inputCity">City</label>
        <div class="controls">
          <input name="city" type="text" id="inputCity" placeholder="city" onkeyup="validateAddress ();">
        </div>
      </div>
      <div id="stateGroup" class="control-group">
        <label class="control-label" for="inputState">State/Zip Code</label>
        <div class="controls controls-row row-fluid">
          <select name="state" class="span2 selectpicker" id="inputState" onchange="validateAddress ();" >
          	<option value="-1">-state-</option>
            <?php
				ksort($US_States);
				foreach ($US_States as $stateCode => $state) {
					echo '<option value="'.$stateCode.'">'.$stateCode.'</option>';
				}
			?>
          </select>
          <input class="numeric" name="zipCode" type="number" id="inputZipcode" placeholder="zipcode" style="margin-left:20px; width:115px;" onkeyup="validateAddress ();">
        </div>
      </div>
      <!-- address ends -->
      
      
      <div id="usernameGroup" class="control-group">
        <label class="control-label" for="inputUsername">Username*</label>
        <div class="controls">
          <input autocomplete="off" name="username" type="text" id="inputUsername" placeholder="username" onkeyup="validateUsername();"
          rel="popover" data-content="Please enter a username. The username must be at least 4 characters long." data-original-title="Username" data-trigger="focus">
        </div>
      </div>
      <div id="passwordGroup" class="control-group">
        <label class="control-label" for="inputPassword">Password*</label>
        <div class="controls">
          <input name="password1" type="password" id="inputPassword" placeholder="password" onkeyup="validatePassword();"
          rel="popover" data-content="Please enter a password. It must contain the following: at least 6 characters, at least 1 number, at least 1 uppercase letter" data-original-title="Password" data-trigger="focus">
        </div>
      </div>
      <div id="passwordGroup2" class="control-group">
        <label class="control-label" for="inputPassword2">Re-type Password*</label>
        <div class="controls">
          <input name="password2" type="password" id="inputPassword2" placeholder="password" onkeyup="validatePassword2();">
        </div>
      </div>
      
            
      <div id="tos" class="control-group">
      <?php require_once("TOS.php"); ?>
        <label class="checkbox">
        <div  class="controls">
         <span id="checkboxTOSSpan" class="">I Accept Terms of Service</span><a style="font-size:16px; padding-left:5px;" href="#myModal" role="button" data-toggle="modal">[Read TOS]</a>
          </label>
          
          
          
            <input name="checkboxTOS" id="checkboxTOS" type="checkbox" > 
            
         
        </div>
        <div style="margin-top:20px;" class="controls">
        	<button type="submit" class="btn btn-primary">Sign Up</button>
        </div>
      </div>
    </form>
</div>

<!-- form div ends -->

<!-- jQuery starts -->

<script>

toggleBDatePicker ();

togglePopover ("#inputEmail");
togglePopover ("#inputUsername");
togglePopover ("#inputPassword");

validateNumeric ();


// validate signup form

$(document).ready(function(){
	$("#signup-form").submit(function(){
					
		referrer = document.referrer;
		
		validateFirstName();
		validateLastName();
		validateEmail();
		validateUsername();
		validatePassword();
		validatePassword2();
		validateCheckBox ('#checkboxTOS', '#tos');
		validateDOB();
		validateAddress();
		
		if (validateFirstName() && validateLastName() && validateEmail() && validateUsername() && validatePassword() &&			validatePassword2() &&	validateCheckBox ('#checkboxTOS', '#tos') && validateDOB() && validateAddress()) {
			//alert ("works");
			$.ajax({
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: $(this).serialize(),
					success:function(data){
					//alert (data);
					if (data == 1) {
						$("#alert").text("Success");
						$("#alert").removeClass('alert-error');
						$("#alert").addClass('alert-success');
						$("#alert").slideDown();
						$('#signup-form').find("input[type=text], input[type=email], input[type=password], textarea").val("");
						$('.s-form').slideUp();
						$('.success-notify').slideDown();
						//window.location = referrer;
					}
					else {
						//username or password invalid
						$("#alert").text("Something is wrong. Please try again!");
						$("#alert").slideDown();
						console.log(data);
					}
				}
				});
			}
			else {
				$("#alert").text("Please fill in the highlighted fields below.");
				$("#alert").removeClass('alert-success');
				$("#alert").addClass('alert-error');
				$("#alert").slideDown();
				$(".close").show();
				$(".alert").alert();

		}
		return false;
	});
});

	
</script>
<!-- jQuery ends -->