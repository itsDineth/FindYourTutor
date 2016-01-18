<!-- form div starts -->
<div style="width:700px; margin:0 auto; padding-top:40px;">
    <!-- alert starst -->
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    <form class="form-horizontal" method="post" action="?step=3">

    <!-- high school -->
        <div id="highschool" class="control-group">
            <label class="control-label" for="inputHighSchool">High School*</label>
            <div class="controls">
            	<div class="input-append">
                	<input class="span4" type="text" id="inputHighSchool" placeholder="highschool">
					<input id="hiddenHS" name="hiddenHS" type="hidden" value="" />
					<button id="inputHighSchoolAdd" class="btn btn-info" type="button">+</button>
				</div>
                <div id="highSchoolArray" class="span4"> 
                
                </div>
            </div>
        </div>
    <!-- degrees -->
        <div id="degrees" class="control-group">
            <label class="control-label" for="inputDegrees">Degrees</label>
            <div class="controls">
            	<div class="input-append">
                    <input class="span4" type="text" id="inputDegrees" placeholder="degrees">
					<input id="hiddenDG" name="hiddenDG" type="hidden" value="" />
                    <button id="inputDegreesAdd" class="btn btn-info" type="button">+</button>
                </div>
                <div id="degreesArray" class="span4">
                
                </div>
            </div>
        </div>
       
    <!-- certifications -->
        <div id="certifications" class="control-group">
            <label class="control-label" for="inputCertifications">Certifications</label>
            <div class="controls">
            	<div class="input-append">
                	<input class="span4" type="text" id="inputCertifications" placeholder="certifications">
					<input id="hiddenCT" name="hiddenCT" type="hidden" value="" />
                    <button id="inputCertificationsAdd" class="btn btn-info" type="button">+</button>
                </div>
                <div id="certificationsArray" class="span4">
                
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



 function validateHighSchool () { 
 	$("#inputHighSchoolAdd").click(function () {
	 var contentFrom = $("#inputHighSchool").val();
	 //alert(contentFrom);

	 if (contentFrom.length > 0) {
		 $("#highSchoolArray").append("<li>"+contentFrom+" <button type='button' class='close' data-dismiss='alert'>&times;</button></li>");
		 $("#inputHighSchool").val("");
		 $("#hiddenHS").val($("#highSchoolArray").text());
		 $("#inputHighSchool").attr("placeholder", "add another");
		 $("#alert").slideUp();
		 $("#highschool").removeClass("error");
	//$("#highschool").addClass("success");
		 return true;
	 } else {
	 	return false;
	 }
 });
 }
 validateHighSchool ();
 $("#inputDegreesAdd").click(function () {
	 var contentFrom = $("#inputDegrees").val();
	 //alert(contentFrom);

	 if (contentFrom.length > 0) {
		 $("#degreesArray").append("<li>"+contentFrom+" <button type='button' class='close' data-dismiss='alert'>&times;</button></li>");
		 $("#inputDegrees").val("");
		 $("#hiddenDG").val($("#degreesArray").text());
		 $("#inputDegrees").attr("placeholder", "add another");
	 }
 });
  $("#inputCertificationsAdd").click(function () {
	 var contentFrom = $("#inputCertifications").val();
	 //alert(contentFrom);

	 if (contentFrom.length > 0) {
		 $("#certificationsArray").append("<li>"+contentFrom+" <button type='button' class='close' data-dismiss='alert'>&times;</button></li>");
		 $("#inputCertifications").val("");
		 $("#hiddenCT").val($("#certificationsArray").text());
		 $("#inputCertifications").attr("placeholder", "add another");
	 }
 });
 
 
 // next
 $(document).ready(function(){
  		$("form").submit(function(){
						
			//referrer = document.referrer;
			var hsaLength = ($("#highSchoolArray").text().length);
			
			if (hsaLength > 35) {
				
				return true;
				
			}
			else if (hsaLength == 35) {
				$("#alert").text("Please fill in the highlighted fields.");
				$("#alert").slideDown();
				$("#highschool").removeClass("success");
				$("#highschool").addClass("error");
			}
			return false;
		});
 });
</script>