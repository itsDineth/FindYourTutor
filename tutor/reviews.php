<style>
	#ratingTable td {
		line-height:30px;
	}
</style>
<?php

			$currentTutor = $_REQUEST['ID'];

			$sqlViewReview = mysql_query("SELECT * FROM reviews LEFT JOIN users ON reviews.reviewerID = users.ID WHERE reviews.reviewedTutorID = '$currentTutor'") ;
			$count = 0;
			$half  = floor(mysql_num_rows($sqlViewReview)/2);
?>
<div class="container-fluid" style="margin:0 auto; min-width:500px; max-width:1200px; margin-top:15px;" id="reviewContainer">
	<div id="reviewLeft">
    
	<?php 
	if (mysql_affected_rows() == 0)
		echo '<div style="width:50%; margin-left:0px;" class="pull-left"><h3>This tutor has not been reviewed yet.</h3></div>';
	else
		require_once("reviews-left.php"); ?>
    </div>
    <div style="width:50%; margin-left:-20px; " class="pull-right">
    	<div class="span10 card" style="min-width:180px; width:96%; margin-bottom:15px;"><br>
        <span style="margin:20px;"><button style="margin-bottom:20px;" name="write" id="write" class="btn btn-info">Write a review</button></span>
            <div id="writebox" style="display:none;">
                <legend ></legend>
                    <?php
						if (isset($_SESSION['USERID']))
                        	require_once("../forms/review-tutor.php");
						else
							echo '<h4 style="padding:20px;">You need to be logged to write a review</h4>';
                    ?>
                </div>
            </div>
            <div id="reviewsRight">
            <?php require_once("reviews-right.php"); ?>
            </div>
    </div>
   
</div>

<script>
	$("#cancel").click( function () {
		$("#writebox").slideToggle();
	});
	
	$("#write").click( function () {
		$("#writebox").slideToggle();
	});
	
</script>