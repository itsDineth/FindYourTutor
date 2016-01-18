<!-- form div starts -->

<div>
    <!-- alert starst -->
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    <div style="width:400px; margin:0 auto;">
    <form id="reset-password-form" name="reset-password-form" class="form-horizontal" method="post" action="../includes/password-reset-process.php">
      <div id="passwordGroup" class="control-group">
        <label class="control-label" for="inputPassword">New Password*</label>
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
      <div class="control-group">
        <input type="hidden" name="auth" value="<?php echo $_GET['auth']; ?>" />
         
        
        <div class="pull-right" style="padding-top:5px;"><button type="submit" class="btn btn-primary">Submit</button></div> 
                     
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
<script>
	//$('#resetCred').modal('show')
</script>
<!-- form div ends -->

<!-- jQuery starts -->
<script>
togglePopover ("#inputPassword");
togglePopover ("#inputPassword2");

	$(document).ready(function(){
  		$("#reset-password-form").submit(function(){
					
			referrer = document.referrer;
			
			validatePassword();
			validatePassword2();
			
			
			if (validatePassword2()) {
				//alert("");	
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
							$("#alert").text("Password has been reset.");
							$(".alert").alert();
							$("#alert").slideDown();
							//window.location = referrer;
						}
						else {
							//username or password invalid
							$("#alert").text("Something went wrong. A team of highly trained monkeys has been dispatched to deal with this situation.");
							$(".alert").alert();
							$("#alert").slideDown();
						}
					}
					});
				}
				else {
					$("#alert").text("Passwords do not match.");
					$("#alert").slideDown();

			}
			return false;
		});
	});

	
</script>
<!-- jQuery ends -->