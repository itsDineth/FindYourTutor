<!-- Modal -->
<div id="resetCred" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Having trouble signing in?</h3>
  </div>
  <form name="resetCredentials" id="resetCredentials" method="post" action="../includes/reset-process.php">
  <div class="modal-body">
     <div style="display:none;" id="alert2" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
        <label class="radio">
          <input type="radio" name="resetC" id="resetC1" value="1" onchange="showBox1 ();">
          I don't know my password
        </label><br />

            <div id="rpassword" class="alert alert-info" style="display:none;">
            	<p>To reset your password, enter the email address you used when you created your account. </p>
                 <label>Email address</label>
    				<input id="inputEmail1" name="remail1" type="text">
            <br /></div>
        <label class="radio">
          <input type="radio" name="resetC" id="resetC2" value="2" onchange="showBox2 ();">
          I don't know my username
        </label>
        <br />

            <div id="rusername" class="alert alert-info" style="display:none;">
            	<p>To recover your username, enter your associated email address and your name. </p>
                 <label>Email address</label>
    				<input id="inputEmail2" name="rmail2" type="text">
                 <label>Name</label>
    				<input id="inputFirstName" name="firstName" type="text" placeholder="first">
                 	<input id="inputLastName" name="lastName" type="text" placeholder="last">
            <br /></div>
    
  </div>
  <div class="modal-footer">
  <button id="continueButton" name="continueButton" style="display:none;" class="btn" >Continue</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
  </form>
</div>

<script>

function showBox1 () {
		$("#rusername").hide();
		$("#continueButton").show();
		$("#rpassword").slideDown();
		$("#inputEmail2").val("");
		$("#inputFirstName").val("");
		$("#inputLastName").val("");
}
function showBox2 () {
		$("#rpassword").hide();
		$("#continueButton").show();
		$("#rusername").slideDown();
		$("#inputEmail1").val("");
}

$(document).ready(function(){
	$("#resetCredentials").submit(function(){
		//alert ($("#inputEmail1").val());
		if (
			($("#inputEmail1").val().length > 0) ||
			(($("#inputEmail2").val().length > 0) && ($("#inputFirstName").val().length > 0) && ($("#inputLastName").val().length > 0))
		) {	
		
		
		$.ajax({
			url: $(this).attr('action'),
			type: $(this).attr('method'),
			data: $(this).serialize(),
				success:function(data){
					//alert (data);
					if (data == 1) {
						//success
						//$("#alert").$("#alert").text("Login success!");
						$("#alert2").text("We have sent you an email. Please follow the instructions in the email to proceed with the changes");
						$("#alert2").removeClass('alert-error');
						$("#alert2").addClass('alert-success');
						$("#alert2").slideDown();
						//window.location = referrer;
					}
					else {
						//something's wrong
						$("#alert2").text("Sorry! We couldn't find any information.");
						$("#alert2").removeClass('alert-success');
						$("#alert2").addClass('alert-error');
						$("#alert2").slideDown();
					}
				}
				});
			}
			else {
				
				$("#alert2").text("Please fill in the below");
				$("#alert2").removeClass('alert-success');
				$("#alert2").addClass('alert-error');
				$("#alert2").slideDown();
		}
		return false;
	});
});
</script>