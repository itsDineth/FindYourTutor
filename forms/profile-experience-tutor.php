

<!-- form div starts -->
<div style="width:700px; margin:0 auto;">
    <!-- alert starst -->
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    <form class="form-horizontal" method="post" action="?step=4">

	<!-- experience in years -->
	<div id="exYears" class="control-group">
        <label class="control-label" for="inputExYears">Experience*</label>
        <div class="controls">
          <select name = "experience" class="selectpicker" id="inputExYears" onchange="validateExperience();">
          	<option value="0"></option>
          	<option value="1">None</option>
            <option value="2">6 months+</option>
            <option value="3">1 year+</option>
            <option value="4">3 years+</option>
            <option value="5">5 years+</option>
            <option value="6">10 years+</option>
            <option value="7">20 years+</option>
          </select>
       
        </div>
      </div>
    <!-- work experience -->
        <div id="experience" class="control-group">
            <label class="control-label" for="inputHighSchool">Explain Your Experience in Detail</label>
            <div class="controls">
            	<textarea name = "detail_experience"></textarea>
            </div>
        </div>
   
        
      <div class="control-group">
        <div class="controls" style="float:right">          
          
          <button name="next" type="submit" class="btn btn-warning">Save &amp; Proceed</button>
        </div>
      </div>
    </form>
</div>
<!-- form div ends -->
<script>
	// validate experience
	function validateExperience() {
		var experienceYr = $("#inputExYears").val();
		if (experienceYr == "1" || experienceYr == "2" || experienceYr == "3" || experienceYr == "4" || experienceYr == "5" || experienceYr == "6" || experienceYr == "7") {
			$("#exYears").removeClass("error");
			//$("#exYears").addClass("success");
			$("#alert").slideUp();
			return true;
		} else {
			//$("#exYears").removeClass("success");
			$("#exYears").addClass("error");
			return false;
		};
	}
	
	// validate next form
	$(document).ready(function() {
		$("form").submit(function() {
			referrer = document.referrer;
			
			validateExperience();
			
			if (validateExperience()) {
				flag = true;
			} else { 
				$("#alert").text("Please fill in the highlighted fields below.");
				$("#alert").slideDown();
				$(".close").show();
				$(".alert").alert();
				flag = false;
			}
			return flag;
		});
	});
	
</script>
