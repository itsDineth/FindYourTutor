<!-- form div starts -->
<div>
    <!-- alert starst -->
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    <div style="width:300px; margin:0 auto;">
    <form class="form-horizontal" method="post" action="../includes/login-process.php">
      <div id="usernameGroup" class="control-group">
        
       
          <input name="username" class="span4" onkeyup="validateUsername();" type="text" id="inputUsername" placeholder="username">
        
      </div>
      <div id="passwordGroup" class="control-group">
        
       
          <input name="password" class="span4" onkeyup="validatePassword();" type="password" id="inputPassword" placeholder="password">
        
      </div>
      <div class="control-group">
        
         
        <div class="pull-left">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
        <div class="pull-right" style="padding-top:5px;">
        	<a style="margin-left:20px;" href="#resetCred" data-toggle='modal'>Having trouble?</a>
        </div> 
           <label class="checkbox" style="margin-top:20px;">
            <div>
            	<div class="pull-left">
                	<!--<input name="rememberme" type="checkbox" value="on">Remember me -->
                </div>
                <div class="pull-right">
                
                	<!--<a style="margin-left:20px;" href="#resetCred" data-toggle='modal'>Having trouble?</a>-->
                </div>
            </div>
          </label>
       
      </div>
    </form>
    </div>
</div>

<?php
	require_once('../forms/reset.php');
?>	
<script>
	//$('#resetCred').modal('show')
</script>
<!-- form div ends -->

<!-- jQuery starts -->
<script>
	// validate username on blur; length > 3
	function validateUsername() {
		if (($("#inputUsername").val().length) > 0) {
			$("#usernameGroup").removeClass("error");
			$("#usernameGroup").addClass("success");
			return true;	
		} else {
			$("#usernameGroup").removeClass("success");
			$("#usernameGroup").addClass("error");
			return false;
		};
	};
	// validate username on blur; length > 6
	function validatePassword() {
		if (($("#inputPassword").val().length) > 0) {
			$("#passwordGroup").removeClass("error");
			$("#passwordGroup").addClass("success");
			return true;
		} else {
			$("#passwordGroup").removeClass("success");
			$("#passwordGroup").addClass("error");
			return false;
		};
	};
	// validate signup form
	$(document).ready(function(){
  		$("form").submit(function(){
						
			referrer = document.referrer;
			
			validateUsername();
			validatePassword();
			
			
			if (validateUsername() && validatePassword()) {
				
			$.ajax({
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: $(this).serialize(),
					success:function(data){
						//alert (data);
						if (data == 1) {
							//success
							//$("#alert").$("#alert").text("Login success!");
							//alert("works");
							window.location = referrer;
						} else if (data == 10) {
							$("#alert").text("Your account is locked for the next 5 minutes. Please try again later!");
							$(".alert").alert();
							$("#alert").slideDown();
						} else if (data == 0) {
							window.location = "../profile-setup";
						}
						else {
							//username or password invalid
							$("#alert").text("Username or password is invalid!");
							$(".alert").alert();
							$("#alert").slideDown();
						}
					}
					});
				}
				else {
					// username and password are invalid
					if (!validateUsername()) {
						$("#alert").text("Please enter a valid username!");
						$(".alert").alert();
						$("#alert").slideDown();
						
					}
					if (!validatePassword()) {
						$("#alert").text("Please enter a valid password!");
						$("#alert").slideDown();
					}
					if (!validateUsername() && !validatePassword()) {
						$("#alert").text("Please enter a valid username and a password!");
						$("#alert").slideDown();
						$(".close").show();
						$(".alert").alert();
					}
			}
			return false;
		});
	});

	
</script>
<!-- jQuery ends -->