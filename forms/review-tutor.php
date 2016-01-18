<!-- form div starts -->
<div style="width:90%; margin:0 auto; margin-top:15px;">
    <!-- alert starst -->
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    <form name="revierw-tutor" id="revierw-tutor" class="form-horizontal" method="post" action="../includes/review-tutor.php">
	
	<!-- recommend -->
    
	<!-- star rating -->
      <div id="ratings" class="">
        
        <div class="">
         	<div>
            	<table style="margin-top:5px;">
                	<tr>
                    	<td>Helpfulness</td>
                        <td>
                            <select id="rating1" name="rating1">
                            	<option value="-1" selected="selected">Null</option>
                                <option value="0">Poor</option>
                                <option value="1">Fair</option>
                                <option value="2">Average</option>
                                <option value="3">Good</option>
                            	<option value="4">Excellent</option>
                            </select>
                            <div class="rateit" data-rateit-backingfld="#rating1"></div> 
                        </td>
                    </tr>
                    <tr>
                    	<td>Clarity</td>
                        <td>
                            <select id="rating2" name="rating2">
                            	<option value="-1" selected="selected">Null</option>
                                <option value="0">Poor</option>
                                <option value="1">Fair</option>
                                <option value="2">Average</option>
                                <option value="3">Good</option>
                            	<option value="4">Excellent</option>
                            </select>
                            <div class="rateit" data-rateit-backingfld="#rating2"></div> 
                        </td>
                    </tr>
                    <tr>
                    	<td>Friendliness</td>
                        <td>
                            <select id="rating3" name="rating3">
                            	<option value="-1" selected="selected">Null</option>
                                <option value="0">Poor</option>
                                <option value="1">Fair</option>
                                <option value="2">Average</option>
                                <option value="3">Good</option>
                            	<option value="4">Excellent</option>
                            </select>
                            <div class="rateit" data-rateit-backingfld="#rating3"></div> 
                        </td>
                    </tr>
                    <tr>
                    	<td>Knowledgeable</td>
                        <td>
                            <select id="rating4" name="rating4">
                            	<option value="-1" selected="selected">Null</option>
                                <option value="0">Poor</option>
                                <option value="1">Fair</option>
                                <option value="2">Average</option>
                                <option value="3">Good</option>
                            	<option value="4">Excellent</option>
                            </select>
                            <div class="rateit" data-rateit-backingfld="#rating4"></div> 
                        </td>
                    </tr>
                	
                </table>
            	
                
            </div>
        </div>
      </div>   <br />
	<!-- review summary -->
    <input name="tutorID" type="hidden" value="<?php echo $_GET['ID']; ?>" />
      <div id="reviewSummary" class="">

        <div class="">
          <input name="reviewSummary" class="span4" type="text" id="inputReviewSummary" placeholder="review summary">
        </div>
      </div> <br />
	<!-- review -->
      <div id="reviewDiv">
        

        	<textarea id="inputReview" name="inputReview"></textarea>
            
          <!--<input type="text" class="span4" onkeyup="validateReview();" id="inputReview" />-->

      </div>  
        <br />
      <div class="control-group">
        <div class="controls" style="float:right">          
          <button name="submit" type="submit" class="btn btn-primary">Submit</button>
          <button id="cancel" name="cancel" type="button" class="btn btn-primary">Cancel</button>
        </div>
      </div>
    </form>
</div>
<!-- form div ends -->


<script>
function validateReview()
{
//var textareaValue = tinyMCE.activeEditor.getContent();
//User should enter minimum of 15 characters for review and maximum of 250 characters for review
if( ($("#inputReviewSummary").val().length == 0)	|| (($("#rating1").val() == -1) || ($("#rating2").val() == -1) || ($("#rating3").val() == -1) || ($("#rating4").val() == -1))  )
{
	return false;
	}
	else{
	return true;
	};
	
};


  function getURLParameter(name) {
  return decodeURI(
   (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
   );
}
  
 $(document).ready(function(){
	$("#revierw-tutor").submit(function(){	
			tinyMCE.triggerSave(); 
			validateReview();	
			if (validateReview()) {
				//$("name:review").val(tinyMCE.activeEditor.getContent());
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
							
							//var tutorID = getURLParameter('ID');
							//$("[name=tutorID]").val(tutorID);
							//$('#tutor').load('../tutor/reviews.php?ID='+tutorID);
							location.reload();
						}
						else {
							//username or password invalid
							$("#alert").text("Something's wrong");
							$("#alert").slideDown();
						}
					}
					});
			}
			else {
				$("#alert").text("Please fill fields below.");
				$("#alert").removeClass('alert-success');
				$("#alert").addClass('alert-error');
				$("#alert").slideDown();


		}
		return false;
	});
});
</script>