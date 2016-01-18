<?php
	require_once("../template/header.php");
	require_once("../template/wrapper.php");
	

	if (!isset($_GET['auth']) || isLoggedIn()) {
		echo '<script>window.location = "../"</script>';
	}
	$auth = $_GET['auth'];
	$sqlRR = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE tempPassword = '$auth'"));
	if (isset($_GET['auth']) && mysql_affected_rows() == 0) {
		echo '<script>window.location = "../"</script>';
	}


?>

<div style="margin:0 auto; width:500px; min-height:300px; padding-top:10px; margin-top:2%;" class="card">
	<h3 style="padding-left:100px;">Reset Password</h3>
    <hr>
    
    
    <div style="width:400px; margin:0 auto; padding-bottom:20px;">
     
    
    
    <?php
        require_once("../forms/reset-password.php");
    ?>
    </div>
</div>
<?php
	require_once("../template/footer.php");
?>