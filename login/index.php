<?php
	require_once("../template/header.php");
	require_once("../template/wrapper.php");
	
	if (isLoggedIn()) {
	header ("Location: ../");
	exit ();
}
?>

<div style="margin:0 auto; width:500px; min-height:300px; padding-top:10px; margin-top:2%;" class="card">
	<h3 style="padding-left:100px;">Login</h3>
    <hr>
    
    
    <div style="width:400px; margin:0 auto; padding-bottom:20px;">
     
    <div style="text-align:center; padding:20px; border:1px;"><img src="../img/default.gif" style="width:150px;" class="img-circle" /></div>
    
    <?php
        require_once("../forms/login.php");
    ?>
    </div>
</div>
<?php
	require_once("../template/footer.php");
?>