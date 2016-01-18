<?php
	require_once("../template/header.php");
	require_once("../template/wrapper.php");
	if (isset($_SESSION['USERID'])) {
		$currentUserProfile = $_SESSION['USERID'];
		$profile_info2 = currentUser ($_SESSION['USERID']);
?>
<div class="container-fluid card" style="width:50%; min-width:500px; margin:0 auto; padding-bottom:30px; min-height:500px;">
	<legend><h2><?php echo ucwords ($profile_info2['firstName']." ".$profile_info2['lastName']); ?></h2></legend>

	<?php if ($profile_info2['userRoleID'] == 1) {
		?>
        Want to become a tutor?
        <a href="../profile-setup/?u=2"> <button name="upgradeAccount" type="button" class="btn btn-info" style="margin-left:20px;">Upgrade your account</button></a>
     <?php
	} else {
		if ($profile_info2['pstatus'] < 5) {
	?>
    Complete your tutor profile 
    	<a href="../profile-setup/"> <button name="completeProfile" type="button" class="btn btn-info" style="margin-left:20px;">Go</button></a>
    <?php
		} else {
			$profile_info3 = mysql_fetch_array(mysql_query("SELECT * FROM users LEFT JOIN profile6 ON users.username = profile6.username WHERE users.ID = '$currentUserProfile'"));
	?>
    Your account was created on: <?php echo dateInUS($profile_info3['date']); ?><br /><br />

	Subscription expiry date: <?php echo dateInUS($profile_info3['termend']); ?><br /><br />

    
    Your profile: <a href="../tutor/?ID=<?php echo $currentUserProfile; ?>"> <button name="myProfile" type="button" class="btn btn-info" style="margin-left:20px;">My Profile</button></a>

    <?php
		}
	}
	?>
</div>
<script>
jQuery(document).ready(function($) {
      $(".clickableRow").click(function() {
            window.document.location = $(this).attr("href");
      });
});
</script>
<?php
	}
	require_once("../template/footer.php");
?>