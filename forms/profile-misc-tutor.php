<!-- form div starts -->
<div style="width:700px; margin:0 auto;">
    <!-- alert starst -->
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    <form class="form-horizontal" method="post" action="?step=6">

	<!-- hourly rate -->
 	<div id="hourlyRate" class="control-group">
        <label class="control-label" for="inputRate">Hourly Rate*</label>
        <div class="controls">
          <div class="input-prepend input-append">
          	  <span class="add-on">$</span>
              <input name = "hourlyrate" class="span1" id="inputRate" type="text" placeholder="00.00" onkeyup="validateHourlyRate();">
              <span class="add-on">/hour</span>
            </div>
        </div>
      </div>
    <!-- location -->
 	<div id="location" class="control-group">
        <label class="control-label" for="inputLocation">Location*</label>
        <div class="controls">
         <select  name = "location[]" class="selectpicker" multiple="multiple" id="inputLocation" onchange="validateLocation();">
              <option value="4">Online</option>
              <option value="2">Tutor's House</option>
              <option value="1">Student's House</option>
              <option value="3">In a Center</option>
            </select>
        </div>
      </div>
    <!-- transportation availability -->
 	<div id="transportation" class="control-group">
        <label class="control-label" for="inputTransportation">Has Transportation*</label>
        <div class="controls">
           <label class="radio">
          <input type="radio" name="transHas" id="optionsRadios1" value="yes" onclick="validateTransportation();">
          Yes
        </label>
        <label class="radio">
          <input type="radio" name="transHas" id="optionsRadios2" value="no" onclick="validateTransportation();">
          No
        </label>
        </div>
      </div>
    <!-- travel radius -->
 	<div id="travelRadius" class="control-group">
        <label class="control-label" for="inputTravelRadius">Travel Radius*</label>
        <div class="controls">
        <?php
			$travelRadius = array (2=>"2 miles" ,5=>"5 miles",10=>"10 miles",20=>"20 miles", 30=>"30 miles", 50=>"50 miles", 100=>"100 miles");
		?>
          <select name = "radius" class="selectpicker" id="inputTravelRadius" onchange="validateRadius();">
          	<option value="-2">-select-</option>
            <option value="-1">N/A</option>
            <?php
				foreach ($travelRadius as $key => $radius) {
					echo '<option value="'.$key.'">'.$radius.'</option>';
				}
			?>
          </select>
        </div>
      </div>
        
      <div class="control-group">
        <div class="controls" style="float:right">          

          <button name="next" type="submit" class="btn btn-warning">Finish</button>
        </div>
      </div>
    </form>
</div>
<!-- form div ends -->

<script>
// validate hourly rate
	function validateHourlyRate() {
		if($.isNumeric($("#inputRate").val())) {
			$("#hourlyRate").removeClass("error");
			//$("#hourlyRate").addClass("success");
			return true;
		} else {
			$("#hourlyRate").removeClass("success");
			$("#hourlyRate").addClass("error");
			return false;
		}
	}
	
	// validate Location
	function validateLocation() {
 		var locationChecked = $("#inputLocation").val();
	 	if (locationChecked != null) {
 			$("#location").removeClass("error");
			//$("#location").addClass("success");
			return true;
		} else {
			$("#location").removeClass("success");
			$("#location").addClass("error");
			return false;
		}
	}
	
	// validate transportation
	function validateTransportation() {
		if($('#optionsRadios1').is(':checked') || $('#optionsRadios2').is(':checked')) {
			$("#transportation").removeClass("error");
			//$("#transportation").addClass("success");
			return true;
		} else {
			$("#transportation").removeClass("success");
			$("#transportation").addClass("error");
			return false;
		}
	}
	
	// validate Radius
	function validateRadius() {
		if($("#inputTravelRadius").val() >=-1) {
			$("#travelRadius").removeClass("error");
			//$("#travelRadius").addClass("success");
			return true;
		} else {
			$("#travelRadius").removeClass("success");
			$("#travelRadius").addClass("error");
			return false;
		}
	}
	
 // multi-select
  $(document).ready(function() {
	$("form").submit(function() {
		referrer = document.referrer;
		var flag = true;
		
		validateHourlyRate();
		validateLocation();
		validateTransportation();
		validateRadius();
		
		if (validateHourlyRate() && validateTransportation() && validateRadius() && validateLocation()) {
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
    
 // multi-select
  $(document).ready(function() {
    $('.multiselect').multiselect();
  });
</script>