<!-- form div starts -->
<div style="width:700px; margin:0 auto;">
    <!-- alert starst -->
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    <form class="form-horizontal" method="post" action="?step=5">

	<!-- Subjects -->
	 <div id="subjects" class="control-group">
        <label class="control-label" for="inputSubjects">Subjects*</label>
        <div class="controls">
          <select name = "subjects[]" class="selectpicker" multiple="multiple" data-live-search="false" id="inputSubjects" onchange="validateSubject();">
          
          <?php
		  	$sqlCatGroup = mysql_query("SELECT * FROM categories");
			while ($row = mysql_fetch_array($sqlCatGroup)) {
				$category = $row['cateName'];
				$categoryID = $row['ID'];
			?>
            	<optgroup label="<?php echo $category;  ?>">
                	<?php
						$sqlSubjects = mysql_query("SELECT * FROM categoriessub WHERE catID = '$categoryID'");
						while ($row = mysql_fetch_array($sqlSubjects)) {
							$subject = $row['subjects'];
					?>
                	<option value="<?php echo $subject; ?>"><?php echo $subject; ?></option>
                    <?php
						}
					?>
                 </optgroup>
            <?php
			}
		  ?>
            </select>
        </div>
      </div>
     <!-- Languages spoken -->
      <div id="languages" class="control-group">
        <label class="control-label" for="inputLanguages">Languages Spoken*</label>
        <div class="controls">
          <label class="checkbox"><input type="checkbox" name = "English" id="checkbox" value="English" onchange="validateLanguage();">English</label>
          <label class="checkbox"><input type="checkbox" name = "Spanish" id="checkbox1" value="Spanish" onchange="validateLanguage();">Spanish</label>
          <label class="checkbox"><input type="checkbox" name = "French" id="checkbox2" value="French" onchange="validateLanguage();">French</label>
          <label class="checkbox"><input type="checkbox" name = "German" id="checkbox3" value="German" onchange="validateLanguage();">German</label>
          <label class="checkbox"><input type="checkbox" name = "Mandarin" id="checkbox4" value="Mandarin" onchange="validateLanguage();">Mandarin</label>
        </div>
      </div>
      <!-- Special -->
       <div id="special" class="control-group">
        <label class="control-label" for="inputSpecial">Special</label>
        <div class="controls">
          <div class="input-append">
                	<input class="span3" type="text" id="inputSpecial" placeholder="special consideration">
					<input id="hiddenSP" name="hiddenSP" type="hidden" value="" />
                    <button id="inputSpecialAdd" class="btn btn-info" type="button">+</button>
                </div>
                <div id="specialArray">
                
                </div>
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

  $("#inputSpecialAdd").click(function () {
	 var contentFrom = $("#inputSpecial").val();
	 //alert(contentFrom);

	 if (contentFrom.length > 0) {
		 $("#specialArray").append("<li>"+contentFrom+" <button type='button' class='close' data-dismiss='alert'>&times;</button></li>");
		 $("#inputSpecial").val("");
		 $("#hiddenSP").val($("#specialArray").text());
		 $("#inputSpecial").attr("placeholder", "add another");
	 }
 });
 
 //validate subjects
 function validateSubject() {
 	var subjectChecked = $("#inputSubjects").val();
 	if (subjectChecked != null) {
 		$("#subjects").removeClass("error");
		//$("#subjects").addClass("success");
		
		return true;
	} else {
		$("#subjects").removeClass("success");
		$("#subjects").addClass("error");
		return false;
	}
}

// validate Language
function validateLanguage() {
	if ($('#checkbox').prop('checked') || $('#checkbox1').prop('checked') || $('#checkbox2').prop('checked') || $('#checkbox2').prop('checked') || $('#checkbox4').prop('checked')) {
 		$("#languages").removeClass("error");
		//$("#languages").addClass("success");
		return true;
	} else {
		$("#languages").removeClass("success");
		$("#languages").addClass("error");
		return false;
	};
}
 

 

 // multi-select
  $(document).ready(function() {
    $('.multiselect').multiselect();
	$("form").submit(function() {
		var flag = true;
		referrer = document.referrer;
		
		validateSubject();
		validateLanguage();
		
		if (validateSubject() && validateLanguage()) {
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