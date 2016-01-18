<?php
	//require_once("avatar-modal.php");
?>


<!-- form div starts -->
<div style="width:700px; margin:0 auto;">
    <!-- alert starst -->
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    <form name="personal" class="form-horizontal" method="post" action="?step=2" enctype = "multipart/form-data">
    <!-- avatar -->
    

        <div id="avatar" class="control-group">
            <label class="control-label" for="inputAvatar">Avatar*</label>
            <div class="controls">
            
                <img id="profile-pic" width="200" src="../img/default_profile_male.png" class="img-rounded profile-pic-edit">
                <a class="avatar-edit" href="#avatar-modal" role="button" data-toggle="modal">
                	
             	</a>
                <div><br /><input type="file" name="file" id="imgInp"><br /><strong>Max allowed file size: 2MB<br />Accepted only JPEGS</strong></div>
                
            </div>
        </div>
    <!-- nickname -->
        <div id="nickname" class="control-group">
            <label class="control-label" for="inputNickname">Nickname</label>
            <div class="controls">
                <input name="nickname" class="span3" type="text" id="inputNickname" placeholder="nickname">
            </div>
        </div>
    <!-- gender -->
        <div id="gender" class="control-group">
            <label class="control-label" for="sex">Gender*</label>
            <div class="controls">
                  <label class="radio">
          <input type="radio" name="sex" id="optionsRadios1" value="male" onclick="validateGender();" >
          Male
        </label>
        <label class="radio">
          <input type="radio" name="sex" id="optionsRadios2" value="female" onclick="validateGender();">
          Female
        </label>
            </div>
        </div>
    <!-- tagline -->
        <div id="tagline" class="control-group">
            <label class="control-label" for="inputTagline">Tagline*</label>
            <div class="controls">
                <input name="tagline" class="span5" type="text" id="inputTagline" placeholder="tagline" onkeyup="validateTagline();" onclick="validateTagline();">
            </div>
        </div>
    <!-- bio -->
        <div id="bio" class="control-group">
            <label class="control-label" for="inputBio">Biography*</label>
            <div class="controls">
                <textarea name="biography" id="inputTextarea" onkeyup="validateBiography();" onclick="validateBiography();"></textarea>
            </div>
        </div>
    <!-- social links -->
        <div id="socialGroup" class="control-group">
            <label class="control-label" for="inputSocial">Social Networks</label>
            <div class="controls">
               <div class="media">
               		<a class="pull-left" href="#">
                    	<img class="media-object" src="../img/googleplus.png" style="width:48px;">
                    </a>
                    <div class="media-body" style="padding-top:8px;">
    					<input name="google-plus" class="span3" type="text" id="inputGooglePlus" placeholder="Google+ URL">
                    </div>
               </div>
               <div class="media">
               		<a class="pull-left" href="#">
                    	<img class="media-object" src="../img/facebook.png" style="width:48px;">
                    </a>
                    <div class="media-body" style="padding-top:8px;">
    					<input name="facebook" class="span3" type="text" id="inputFacebook" placeholder="Facebook URL">
                    </div>
               </div>
               <div class="media">
               		<a class="pull-left" href="#">
                    	<img class="media-object" src="../img/twitter.png" style="width:48px;">
                    </a>
                    <div class="media-body" style="padding-top:8px;">
    					<input name="twitter" class="span3" type="text" id="inputtwitter" placeholder="Twitter URL">
                    </div>
               </div>
               <div class="media">
               		<a class="pull-left" href="#">
                    	<img class="media-object" src="../img/linkedin.png" style="width:48px;">
                    </a>
                    <div class="media-body" style="padding-top:8px;">
    					<input name="linkedin" class="span3" type="text" id="inputlinkedin" placeholder="Linkedin URL">
                    </div>
               </div>
               <div class="media">
               		<a class="pull-left" href="#">
                    	<img class="media-object" src="../img/skype.png" style="width:48px;">
                    </a>
                    <div class="media-body" style="padding-top:8px;">
    					<input name="skype" class="span3" type="text" id="inputskype" placeholder="Skype URL">
                    </div>
               </div>
               <div class="media">
               		<a class="pull-left" href="#">
                    	<img class="media-object" src="../img/youtube.png" style="width:48px;">
                    </a>
                    <div class="media-body" style="padding-top:8px;">
    					<input name="youtube" class="span3" type="text" id="inputyoutube" placeholder="Youtube URL">
                    </div>
               </div>
            </div>
        </div>
          
      <div class="control-group">
        <div class="controls" style="float:left">         
          <button name="next" type="submit" class="btn btn-warning">Save &amp; Proceed</button>
        </div>
      </div>
    </form>
</div>
<!-- form div ends -->
    	<script>
	$('#uploadedImage').hide();
	//$("#uploadImage").submit( function () {
		//alert ("works");
		// image upload to buffer
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$('#profile-pic').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
		}
		
		// show a preview of the image; not used
		$("#imgInp").change(function(){
			if( $('#imgInp').val()!=""){
				$('#uploadedImage').show();
		  }
			else{ $('#uploadedImage').hide();}
			readURL(this);
			
		});
	
	//});
  
</script>
<script>
	// validate gender
	function validateGender() {
		if($('#optionsRadios1').is(':checked') || $('#optionsRadios2').is(':checked')) {
			$("#gender").removeClass("error");
			//$("#gender").addClass("success");
			return true;
		} else {
			$("#gender").removeClass("success");
			$("#gender").addClass("error");
			return false;
		}
	}
	
	// validate tagline 
	function validateTagline() {
		if (($("#inputTagline").val().length) >= 3) {
			$("#tagline").removeClass("error");
			//$("#tagline").addClass("success");
			return true;
		} else {
			$("#tagline").removeClass("success");
			$("#tagline").addClass("error");
			return false;
		}
	}
	
	// validate biography 
	function validateBiography() {
		var biographyareaValue = tinyMCE.activeEditor.getContent();
		if (biographyareaValue.length > 15) {
			$("#bio").removeClass("error");
			//$("#bio").addClass("success");
			return true;
		} else {
			$("#bio").removeClass("success");
			$("#bio").addClass("error");
			return false;
		}
	}
	
	// validate file size
	function validateFile () {
	//Code Starts
		if ($("#imgInp").val() != '') {
		 var iSize = ($("#imgInp")[0].files[0].size / 1024); 

			iSize = ((Math.round(iSize * 100) / 100)/1024);
			//$("#lblSize").html( iSize  + "kb"); 
			//alert (iSize); 
			if (iSize < 2) {
				return true;
			} else {
				alert ("Image is too large!");
				return false;
			}
		} else {
			return false;
		}

	}
	
	
	// validate next form
	$(document).ready(function() {
		$("form").submit(function() {
			var flag = true;
			referrer = document.referrer;
			
			validateGender();
			validateTagline();
			validateBiography();
			validateFile ();
			//alert ($("#imgInpHidden"));
			
			if (validateGender() && validateTagline() && validateBiography() && validateFile()) {
				flag = true;
			} else { 
				$("#alert").text("Please fill in the highlighted fields below.");
				$("#alert").slideDown();
				$(".alert").alert();
				flag = false;
			}
			return flag;
		});
	});
</script>
