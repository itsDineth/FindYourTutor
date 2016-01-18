
<?php
	require_once("../template/header.php");
	require_once("../template/wrapper.php");
	$ID = $_GET['ID'];
	$sqlProfile = mysql_fetch_array(mysql_query("SELECT * FROM 
													(((((users
													LEFT JOIN profile1 ON users.username = profile1.username)
														LEFT JOIN profile2 ON users.username = profile2.username)
															LEFT JOIN profile3 ON users.username = profile3.username)
																LEFT JOIN profile4 ON users.username = profile4.username)
																	LEFT JOIN profile5 ON users.username = profile5.username)
													WHERE users.ID = '$ID' && pstatus = 6
												"));
?>

<style>
.profile-background {

	height:400px;
	width:350px;
	overflow:hidden;
    background: url("<?php echo '../includes/show-image.php?ID='.$sqlProfile['username'];  ?>");
    
	-webkit-transform:scale(2);
	-moz-transform:scale(2);
	-ms-transform:scale(2);
	-webkit-filter: blur(15px) brightness(0.2);
	-moz-filter: blur(20px) brightness(0.5);
	-ms-filter: blur(20px) brightness(0.5);
	filter: url(blur.svg#blur);
	-webkit-transform-origin:center;
	-moz-transform-origin:center;
	-ms-transform-origin:center;
	margin:0 auto;
	color:white;
	opacity:0.8;
	display:block;
	
}
.span10 p {
	padding-left:10px; line-height:26px;
}
#about:hover, #map:hover, #reviews:hover {
	font-weight:bold;
}
</style>
<div style="margin:0 auto; min-width:500px; max-width:1200px;" class="card">
	<div class="row">
    	<div class="span4" style="overflow:hidden; height:400px;">
        	<div class="profile-background" id="blur">
            	
            </div>
            
            
        </div>
        <div style="width:200px; height:200px; overflow:hidden; margin-left:70px; margin-top:90px; z-index:100; position:absolute; box-shadow:1px 1px 10px #333;" class="img-circle" >
        	<img src="<?php echo '../includes/show-image.php?ID='.$sqlProfile['username'];  ?>" style="min-width:200px; min-height:200px;" />
            
        </div>
        <h2 style="font-family: 'Tangerine', cursive; font-size:36px; font-weight:bold; position:absolute; z-index:100; color:white; margin-left:50px; margin-top:225px; text-shadow:2px 2px 5px #333;"><?php if (isset($sqlProfile['nickname'])) echo $sqlProfile['nickname']; ?></h2>
        <h2 style="font-family: 'Tangerine', cursive; font-size:30px; font-weight:bold; position:absolute; z-index:100; color:white; margin-left:50px; margin-top:275px; text-shadow:1px 1px 5px #333; width:250px;"><?php if (isset($sqlProfile['tagline'])) echo "\"".$sqlProfile['tagline']."\""; ?></h2>
        
        <div style="padding:20px; margin-left:325px;">
        	<legend><h1><?php echo ucwords($sqlProfile['firstName']).' '.ucwords($sqlProfile['lastName']); ?></h1></legend>
            
            <img src="../img/<?php echo $sqlProfile['gender'] ?>.png" style="width:30px;" title="<?php echo $sqlProfile['gender'] ?>" />
            <a href="#myModal"  data-toggle="modal" ><img src="../img/email.png" style="width:30px;" title="email" /></a>
            
            <?php 
				if(strlen($sqlProfile['facebook']) > 0) echo '<a href="'.$sqlProfile['facebook'].'"><img src="../img/facebook.png" style="width:30px;" title="facebook" /></a>';
				if(strlen($sqlProfile['google+']) > 0) echo '<a href="'.$sqlProfile['google+'].'"><img src="../img/googleplus.png" style="width:30px;" title="google+" /></a>';
				if(strlen($sqlProfile['linkedin']) > 0) echo '<a href="'.$sqlProfile['linkedin'].'"><img src="../img/linkedin.png" style="width:30px;" title="linkedin" /></a>';
				if(strlen($sqlProfile['skype']) > 0) echo '<a href="'.$sqlProfile['skype'].'"><img src="../img/skype.png" style="width:30px;" title="skype" />';
				if(strlen($sqlProfile['twitter']) > 0) echo '<a href="'.$sqlProfile['twitter'].'"><img src="../img/twitter.png" style="width:30px;" title="twitter" /></a>';
				if(strlen($sqlProfile['youtube']) > 0) echo '<a href="'.$sqlProfile['youtube'].'"><img src="../img/youtube.png" style="width:30px;" title="youtube" /></a>';
			?>
            <div><br />
            	
                
                <?php
					$trID = $_GET['ID'];
					$sqlRatings = mysql_query("SELECT * FROM reviews WHERE reviewedTutorID = '$trID'");
					$trCount = 0;
					$trTotal = 0;
					while ($row = mysql_fetch_array($sqlRatings)) {
						$trTotal += ($row['r1']+1);
						$trTotal += ($row['r2']+1);
						$trTotal += ($row['r3']+1);
						$trTotal += ($row['r4']+1);
						$trCount++;
					}
					if ($trCount != 0) {
						$ratingNumber = floor($trTotal/($trCount*5));
						echo 'Avg. Rating:  ';
					}
					else {
						$ratingNumber = -1;
						echo 'No reviews';
						
					}
					
					for ($i = 0; $i<=$ratingNumber; $i++) {
							echo '<img style="height:18px; display:inline; margin-top:-3px;" src="../img/star.png">';
						}
				?>
                <br /><br />
					<?php if ($trCount != 0) {?>(Number of Reviews: <?php echo $trCount.')'; } else { echo "<br />";} ?>
            </div>
            		
		<?php $street = $sqlProfile['address1'];
			  $city = $sqlProfile['city'];
			  $state = $sqlProfile['state'];
			  $zipcode = $sqlProfile['zipcode'];
			  $location = "$street,+$city,+$state,+$zipcode";
			  
		?>
        	<div style="position:absolute; margin-left:405px; margin-top:-120px;">
            <iframe name ="mapframe" style="width:450px; height:300px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                    src="https://maps.google.com/maps?q=<?php echo"$zipcode";?>&amp;ie=UTF8&amp;hq=&amp;hnear= <?php echo"$location";?>&amp;t=m&amp;z=13&amp;output=embed&amp;iwloc=near">
            </iframe>
            </div>
        </div>
    </div>
 </div>
 <div style="margin:0 auto; min-width:500px; max-width:1200px; margin-top:10px;" class="card">
    <div style="padding:10px; text-align:left; font-size:24px; padding-top:15px;">
    	<ul class="unstyled" >
        	<a role="button" id="about" name="about" href="?ID=<?php echo $_GET['ID']; ?>" style="text-decoration:none; color:black"><li style="display:inline; <?php if (!isset($_GET['map']) && !isset($_GET['reviews'])) echo 'border-bottom:4px solid #999;'; ?>">About</li></a>
            <!--<a role="button" id="map" name="map" href="?ID=<?php //echo $_GET['ID']; ?>&map=1" style="text-decoration:none; color:black"><li style="display:inline; margin-left:20px;  <?php if (isset($_GET['map'])) //echo 'border-bottom:4px solid #999;'; ?>">Map/Location</li></a>-->
            <a role="button" id="reviews" name="reviews" href="?ID=<?php echo $_GET['ID']; ?>&reviews=1" style="text-decoration:none; color:black"><li style="display:inline; margin-left:20px;  <?php if (isset($_GET['reviews'])) echo 'border-bottom:4px solid #999;'; ?>">Reviews</li></a>
            <li style="display:inline; margin-left:150px;">        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- PTSt -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:15px"
     data-ad-client="ca-pub-5846712583215181"
     data-ad-slot="6786816633"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></li>
        </ul>

    </div>
 </div>
 		
<div id="tutor">

	<?php 
	if ((isset($_GET['ID']) && (!isset($_GET['map']) && !isset($_GET['reviews']))) || !isset($_GET['ID']))
		include ("profile.php"); 
	if (isset($_GET['map']))
		include ("map.php"); 
	if (isset($_GET['reviews'])) {
		include ("reviews.php"); 
	}
		?>
</div> 
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 600px; margin-left: -270px; height: 500px;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Send a message</h3>
  </div>
  <?php
  	if (isset($_SESSION['username'])) {
  ?>
  			<form class="form-horizontal" name="contactTutor" id="contactTutor" method="post" action="send-message.php">

  <div class="modal-body" style="height: 500px;"> 
  	<?php
  		
  	?>
  	    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
<br> Enter your message <br> 


			  <div style="margin: 0 auto">
		
			
			  		<textarea name="inputComments" id="inputComments"></textarea>
			  		<input id="loggedInUserID" name="loggedInUserID" type="hidden" value="<?php echo $_SESSION['username'] ?>" />
			  		<input id="tutorID" name="tutorID" type="hidden" value="<?php echo $ID; ?>" />
			  	
			  	</div>
			  
			
			<br><br>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button id="senmdButton" type="submit" name="sendButton" class="btn btn-primary">Send</button>
  </div>
  </form>
  <?php
	} else {
	?>
	<div class="modal-body" style="height: 500px;"> 
	You have to be a registered user to send messages.
	</div>
  <div class="modal-footer">
  	
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
  </div>
	<?php
	}
	?>
</div>

<script>

//$('#myModal').modal('show');

$(document).ready(function(){
	
	$("#contactTutor").submit(function(){
		//alert($(this).attr('method'));
		tinyMCE.triggerSave();
		if ($("#inputComments").val().length > 1) {
					$.ajax({
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				data: $(this).serialize(),
					success:function(data){
					//alert (data);
					if (data == 1) {
						//alert ("");
						$("#alert").text("Success");
						$("#alert").removeClass('alert-error');
						$("#alert").addClass('alert-success');
						$("#alert").slideDown();
						//window.location = referrer;
					}
					else {
						//username or password invalid
						//alert ("no");
						$("#alert").text("Something is wrong. Please try again!");
						$("#alert").slideDown();
						console.log(data);
					}
				}
				});
		} else {
			$("#alert").text("Please enter a message!");
			$("#alert").slideDown();
		}
				return false;
	});
});

</script>

<?php
	require_once("../template/footer.php");
?>