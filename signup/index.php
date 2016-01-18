<?php
	require_once("../template/header.php");
	require_once("../template/wrapper.php");
?>
<?php
if (isLoggedIn()) {
	echo '<script>window.location = "../"</script>';
}

	if (!isset($_GET['utype'])) {
?>
<div style="margin:0 auto; width:1000px; min-height:400px; margin-top:2%;" class="card">
	<div class="pull-left" style="padding:10px; padding-right:5px;">
    	<a href="?utype=tutor"><img src="../img/tutor-singup.jpg" ></a>
        <div style="font-size:46px; font-weight:bold; background-color:black; opacity:0.7; padding:25px; margin-top:-80px; color:white">I want to be a tutor</div>
    </div>
    
    <div class="pull-right" style="padding:10px; padding-left:5px;">
    	<a href="?utype=student"><img src="../img/student-signup.jpg" ></a>
        <div style="font-size:46px; font-weight:bold; background-color:black; opacity:0.7; padding:25px; margin-top:-80px; color:white">I want to find a tutor</div>
    </div>
</div>
<?php
	} else {
		if ($_GET['utype'] == 'student') {
?>
<div style="margin:0 auto; width:900px; min-height:400px; margin-top:0%; padding-top:40px; padding-bottom:40px;" class="card">
	<h3 style="padding-left:100px;">Signup as a Student/Parent</h3>
    <hr>
	<?php require_once("../forms/signup-student.php"); ?>
</div>
<?php
		} else if ($_GET['utype'] == 'tutor') {
?>
<div style="margin:0 auto; width:900px; min-height:400px; margin-top:0%; padding-top:40px; padding-bottom:40px;" class="card">
	<h3 style="padding-left:100px;">Signup as a Tutor</h3>
    <hr>
	<?php require_once("../forms/signup-tutor.php"); ?>
</div>
<?php
		}
	}
?>
<?php
	require_once("../template/footer.php");
?>