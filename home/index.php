<?php
	require_once("../template/header.php");
	require_once("../template/wrapper.php");
?>
<div style="width:80%; margin:0 auto;">
<div id="banners" class="row">
	<div id="ptsCarousel" class="carousel slide span9">
  <ol class="carousel-indicators">
    <li data-target="#ptsCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#ptsCarousel" data-slide-to="1"></li>
    <li data-target="#ptsCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item">
        <img src="../img/slide1.jpg" alt="">
        <div class="carousel-caption">
            Need to improve your grade?
        </div>
    </div>
    <div class="item">
		<img src="../img/slide2.jpg" alt="">
        <div class="carousel-caption">
            Want someone to help out with school work?
        </div>
    </div>
    <div class="item">
    	<img src="../img/slide3.jpg" alt="">
        <div class="carousel-caption">
            Tired of studying?
        </div>
    </div>
    <div class="item">
    	<img src="../img/slide4.jpg" alt="">
        <div class="carousel-caption">
            Want to be a tutor?
        </div>
    </div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#ptsCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#ptsCarousel" data-slide="next">&rsaquo;</a>
  
 </div>
<div class="span4">
  <!-- banner for students and parents -->
  <div >
  	<a href="../search/"><img title="search for a tutor" src="../img/search-tutors.jpg"></a>
  </div>
  <!-- banner for tutors -->
    <div style="padding-top:16px;" >
        <a href="../signup/"><img title="register or " src="../img/join-us.jpg"></a>
      </div>
</div>
</div>

<!-- featured tutors -->
<div id="featured-tutors">
	<h3 style="color:#333; font-family: 'Roboto', sans-serif;">Featured</h3>
    <div class="row" style="height:330px; overflow:hidden">
    <?php
		$featuredCount = 0;
		$sqlFeatured = mysql_query("SELECT * FROM 
											((users LEFT JOIN profile1 ON users.username = profile1.username)
												LEFT JOIN profile4 ON users.username = profile4.username)
												WHERE pstatus = 6 ORDER BY RAND() LIMIT 5");
		while ($rowF = mysql_fetch_array($sqlFeatured)) {
	?>
    
        <div class="span1 card home-profile-card" style="max-width:200px;">
            <div style="width:200px; height:180px; overflow:hidden;padding:10px;">
                <img src="<?php echo '../includes/show-image.php?ID='.$rowF['username']; ?>" style="width:190px;"  />
            </div>
          	<a href="../tutor/?ID=<?php echo $rowF['ID']; ?>"><div id="tint"></div></a>
            
            
            <a href="../tutor/?ID=<?php echo $rowF['ID']; ?>"><h4><?php echo ucwords($rowF['firstName'].' '.$rowF['lastName']); ?></h4></a>
            <h5><span><?php echo ucwords(rtrim(str_replace(' ', ', ',substr($rowF['subjects'], 0, 24)), ", ")); ?></span></h5>
            <img src="../img/white-gadient.png" aria-hidden="true" style="margin-left:150px; margin-top:-60px;"/>
            <h6 style="margin-top:-20px;"><?php echo ucwords($rowF['city']); ?>, <?php echo $rowF['state']; ?></h6>

        </div>
    	
    <?php
		$featuredCount++;
		}
	?>
    </div>
</div>


<!-- best reviewed tutors -->
<div id="best-reviewed-tutors">

	<h3 style="color:#333; font-family: 'Roboto', sans-serif;">Popular</h3>
    
    <div class="row">
    	<?php
			$reviewedCount = 0;
			$sqlRatings = mysql_query("SELECT * FROM reviews LEFT JOIN users ON reviews.reviewedTutorID = users.ID");
			$trCount = 0;
			$trTotal = 0;
			$hratedTutors = array();
			while ($row = mysql_fetch_array($sqlRatings)) {
				$hratedTutors[$row['reviewedTutorID']] = 0;
			}
			$sqlRatings2 = mysql_query("SELECT * FROM reviews LEFT JOIN users ON reviews.reviewedTutorID = users.ID");
			while ($row2 = mysql_fetch_array($sqlRatings2)) {

					$hratedTutors[$row2['reviewedTutorID']] += ($row2['r1']+1);
					$hratedTutors[$row2['reviewedTutorID']] += ($row2['r2']+1);
					$hratedTutors[$row2['reviewedTutorID']] += ($row2['r3']+1);
					$hratedTutors[$row2['reviewedTutorID']] += ($row2['r4']+1);
	
				$trCount++;
			}
			arsort($hratedTutors);
			//print_r($hratedTutors);
			$i = 0;
			foreach ($hratedTutors as $key => $hrTutor) {
				$hrtutorID = $key;
				//echo $key."=>".$hrTutor.'<br />';
				$sqlQu = (mysql_query("SELECT * FROM reviews LEFT JOIN users ON reviews.reviewedTutorID = users.ID WHERE users.ID = '$hrtutorID' && LENGTH(review) > 0 LIMIT 1"));
				//print_r($sqlQ);
				while ($sqlQ = mysql_fetch_array($sqlQu)) {
					//if (strlen($sqlQ['review']) > 0) {
				
		?>
    	<div class="span4 card home-review-card row">
      		<div class="pull-left" style="width:100px; height:140px; padding-left:10px; padding-top:10px;">
             <div style="width:90px; height:90px; overflow:hidden;" class="img-circle">
                <img src="<?php echo '../includes/show-image.php?ID='.$sqlQ['username']; ?>" style="min-height:90px; min-width:90px;"  />
            </div>
            </div>
            
            <div class="pull-right" style="width:240px; overflow:hidden; height:130px; padding:5px;" >
            <a href="../tutor/?ID=<?php echo $sqlQ['ID']; ?>"><h5><?php echo ucwords($sqlQ['firstName']).' '.ucwords($sqlQ['lastName']); ?></h5></a>
           <span><?php echo substr(strip_tags(($sqlQ['review'])),0,92); ?></span>
            <br />
            <?php
				$sqlRID = $sqlQ['reviewerID'];
				$sqlReviewer = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE ID = '$sqlRID'"));
			?>
            <div class="pull-right" style="padding-right:15px; position:absolute; text-align:right"><h6><?php echo ucwords($sqlReviewer['firstName']." ".substr($sqlReviewer['firstName'], 0, 1))."."; ?></h6></div>

            </div>
        </div>
        <?php
					
					//}
					
				}
			$i++;
				$reviewedCount++;
			}
		?>
    </div>

</div>

</div>
<?php
	require_once("../template/footer.php");
?>