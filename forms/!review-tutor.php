<?php
/**
	TO ROSHAN:
	
	Ignore the "I would recommend this tutor to a friend" line
	
	Requirements:
		Rate the tutor: User must rate the tutor based on all the 4 feautures
		Review Summary: Optional, but it must have at least 3 characters - meaning the field must either have 0 characters or more than 3 characters
		Review: Optional, but must have at least 3 words or X number of characters (X = you decide)
		
	Usage:
		// this is how I validated the username field in the login page
		// you can use the same thing with modifications 
		
		<script>															!1	JavaScript Starts
			function validateUsername() {									!2	inputUsername = html element ID of the input field
				if (($("#inputUsername").val().length) > 0) {				!3	usernameGroup = ID of the parent div tag, if you're working on the review textarea, then you should put "#review" instead of "#usernameGroup"  - the lines 3 and 4 changes the color to green upon validation success
					$("#usernameGroup").removeClass("error");				!4
					$("#usernameGroup").addClass("success");				!5
					return true;											!6
				} else {													!7
					$("#usernameGroup").removeClass("success");				!8 same thing as line 3 and 4, except the color changes to red upon invalid input
					$("#usernameGroup").addClass("error");					!9
					return false;											!10
				};															!11
			};																!12
		</script>															!13 JavaScript Ends
		
		
		
		// this might help you to validate the ratings
		http://stackoverflow.com/questions/149573/check-if-option-is-selected-with-jquery-if-not-select-a-default
**/
	require_once("header.php");

?>


<!-- form div starts -->
<div style="width:700px; margin:0 auto; margin-top:200px;">
    <!-- alert starst -->
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    <form class="form-horizontal" method="post">

	<!-- recommend -->
      <div id="recommend" class="control-group" style="padding-left:100px;">
        
          <label class="" for="inputRecommend">I would recommend this tutor to a friend</label>

   
	
        
      </div> 
	<!-- star rating -->
      <div id="ratings" class="control-group">
        <label class="control-label" for="inputRating">Rate the tutor*</label>
        <div class="controls">
         	<div>
            	<table style="margin-top:5px;">
                	<tr>
                    	<td>Feature 1</td>
                        <td>
                            <select name="feature1" id="rating1">
                            	<option value="-1">Null</option>
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
                    	<td>Feature 2</td>
                        <td>
                            <select name="feature2" id="rating2">
                            	<option value="-1">Null</option>
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
                    	<td>Feature 3</td>
                        <td>
                            <select name="feature3" id="rating3">
                            	<option value="-1">Null</option>
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
                    	<td>Feature 4</td>
                        <td>
                            <select name="feature4" id="rating4">
                            	<option value="-1">Null</option>
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
      </div>   
	<!-- review summary -->
      <div id="reviewSummary" class="control-group">
        <label class="control-label" for="inputReviewSummart">Review Summary</label>
        <div class="controls">
          <input name="reviewSummary" type="text" class="span4" id="inputReviewSummart" placeholder="review summary">
        </div>
      </div> 
	<!-- review -->
      <div id="review" class="control-group">
        <label class="control-label" for="inputReview">Review</label>
        <div class="controls">
          <textarea name="review"></textarea>
        </div>
      </div>  
        
      <div class="control-group">
        <div class="controls" style="float:right">          
          <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
</div>
<!-- form div ends -->

<script>

 // multi-select
  $(document).ready(function() {
    $('.multiselect').multiselect();
  });
</script>