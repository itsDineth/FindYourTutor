<?php


	require_once("../template/header.php");
	require_once("../template/wrapper.php");
	$status = $_SESSION['status'];
	$uname = $_SESSION['username'];
	$sql = mysql_query("SELECT * FROM users WHERE username = '$uname'");
	$res = mysql_fetch_array($sql);
	$status2 = $res['pstatus'];
	//echo $status2;
	$userRoleType = $_SESSION['userRoleType'];
?>
<div style="margin:0 auto; width:1000px; min-height:400px; margin-top:2%; padding-bottom:30px;" class="card">
<?php
if (isset($_REQUEST['u'])) {
	$sqlUpgrade = mysql_query("UPDATE users SET userRoleID = 2, pstatus = 0 WHERE username = '$uname'");
	$_SESSION['userRoleType'] = 2;
	echo '<script>window.location = "../profile-setup/"</script>';
	
}
if (!isset($_GET['step']) && $status2 > 5) {
	echo '<script>window.location = "../"</script>';
}
if (!isset($_SESSION['USERID'])) {
	echo '<script>window.location = "../"</script>';
}
if ($userRoleType == 1) {
	echo '<script>window.location = "../"</script>';
}
if (isset($_SESSION['username']) && $status < 5) {
	if (!isset($_GET['step']) || (isset($_GET['step']) && ($_GET['step'] == '1'))) {
		if ($status2 > 0) {
			echo '<script>window.location = "../profile-setup/?step=2"</script>';
		}
?>
<h3 style="padding-left:100px; padding-top:30px;">Setup Your Profile :: Step 1 Of 5 </h3>
<div class="progress progress-striped" style="width:800px; margin:0 auto;">
  <div class="bar" style="width: 0%;"></div>
</div
><br>
<br>
<hr>

<?php require_once("../forms/profile-personal-tutor.php"); ?>

<?php
	} else if (($_GET['step'] == '2')) {
		if ($status2 > 1) {
			echo '<script>window.location = "../profile-setup/?step=3"</script>';
		}
?>
<h3 style="padding-left:100px; padding-top:30px;">Setup Your Profile :: Step 2 Of 5 </h3>
<div class="progress progress-striped" style="width:800px; margin:0 auto;">
  <div class="bar" style="width: 38.4%;"></div>
</div
><br>
<br>
<hr>
<?php require_once("../includes/process-step1.php");
require_once("../forms/profile-education-tutor.php"); ?>

<?php	
	} else if (($_GET['step'] == '3')) {
		if ($status2 > 2) {
			echo '<script>window.location = "../profile-setup/?step=4"</script>';
		}
?>
<h3 style="padding-left:100px; padding-top:30px;">Setup Your Profile :: Step 3 Of 5 </h3>
<div class="progress progress-striped" style="width:800px; margin:0 auto;">
  <div class="bar" style="width: 53.78%;"></div>
</div
><br>
<br>
<hr>
<?php require_once("../includes/process-step2.php");
require_once("../forms/profile-experience-tutor.php"); ?>

<?php	
	} else if (($_GET['step'] == '4')) {
		if ($status2 > 3) {
			echo '<script>window.location = "../profile-setup/?step=5"</script>';
		}
?>
<h3 style="padding-left:100px; padding-top:30px;">Setup Your Profile :: Step 4 Of 5 </h3>
<div class="progress progress-striped" style="width:800px; margin:0 auto;">
  <div class="bar" style="width: 76.85%;"></div>
</div
><br>
<br>
<hr>
<?php 

require_once("../includes/process-step3.php");

require_once("../forms/profile-teaching-tutor.php"); ?>

<?php	
	} else if (($_GET['step'] == '5')) {
		if ($status2 > 4) {
			echo '<script>window.location = "../profile-setup/?step=6"</script>';
		}
?>
<h3 style="padding-left:100px; padding-top:30px;">Setup Your Profile :: Step 5 Of 5 </h3>
<div class="progress progress-striped" style="width:800px; margin:0 auto;">
  <div class="bar" style="width: 88.38%;"></div>
</div
><br>
<br>
<hr>
<?php require_once("../includes/process-step4.php");

require_once("../forms/profile-misc-tutor.php"); ?>
<?php	
	}else if (($_GET['step'] == '6')) {
		if ($status2 > 5) {
			echo '<script>window.location = "../profile-setup/?step=7"</script>';
		}
?>
<h3 style="padding-left:100px; padding-top:30px;">Billing</h3>
<div class="progress progress-striped" style="width:800px; margin:0 auto;">
  <div class="bar" style="width: 100%;"></div>
</div
><br>
<br>
<hr>
<?php	
	require_once("../includes/process-step5.php");
	require_once("../forms/profile-billing-tutor.php");
?>
<?php	
	}else if (($_GET['step'] == '7')) {
		if ($status2 > 5) {
			echo '<script>window.location = "../"</script>';
		}
?>
<?php require_once("../includes/process-step6.php");

 ?>



<?php	
	}
?>




</div>
<?php
	require_once("../template/footer.php");
} else {
	header ("location: ../login");
}
?>