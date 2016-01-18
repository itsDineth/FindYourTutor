<?php
	session_start();
	//header( 'Cache-Control: private, max-age=10800, pre-check=10800' );
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="height=device-height">
<title>PTS</title>

<!-- CSS -->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!--link href="../css/bootstrap-responsive.css" rel="stylesheet" type="text/css" media="all"-->
<link href="../css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../css/rateit.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="../assets/bootstrap-select/bootstrap-select.css" rel="stylesheet" type="text/css" media="all" >
<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Tangerine:700' rel='stylesheet' type='text/css'>
<!-- JavaScrpit -->
<script src="../js/modernizr.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="../js/bootstrap.min.js" ></script>
<script src="../js/bootstrap-multiselect.js"></script>
<script src="../js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="../assets/bootstrap-select/bootstrap-select.js"></script>
<script src="../js/tinymce/tinymce.min.js"></script>
<script src="../js/javascript.js"></script>
<script type="text/javascript">
	tinymce.init({
		selector: "textarea",
		theme: "modern",
		width: 520,
		height: 200,
		plugins: [
			 "autolink link lists charmap ",
			 "wordcount  ",
			 "emoticons paste textcolor"
	   ],
	   content_css: "css/content.css",
	   toolbar: "bold italic | bullist numlist | link | forecolor emoticons", 
	   style_formats: [
			{title: 'Bold text', inline: 'b'},
			{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			{title: 'Example 1', inline: 'span', classes: 'example1'},
			{title: 'Example 2', inline: 'span', classes: 'example2'},
			{title: 'Table styles'},
			{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		]
	 }); 
</script>
<script type="text/javascript">
        $(window).on('load', function () {

           $('.selectpicker').selectpicker('show');
        });
</script>
</head>
<body>
<header>
	<?php require_once("../includes/functions.php");?>
    <?php require_once("../includes/db.php");?>
<div id="nav-bar" class="navbar navbar-fixed-top">
  <div class="navbar-inner" style="padding-top:10px; padding-left:20px; padding-right:20px; min-width:1050px;">
  <div class="pull-left">
    <a class="brand" href="../index.php" style="padding-top:12px;"><i class="icon-home"></i><span style="margin-top:-2px; position:absolute;"><strong>&nbsp;FYT</strong></span></a>
    <form id="nav-search" name="nav-search" class="navbar-form form-inline pull-left form-horizontal" action="../search/" method="post">
        <div class="control-group input-append">
        	<label class="control-label" style="padding-top:5px;"><strong>FIND A TUTOR</strong></label>
        	<div class="controls">
        		<select name="categories" class="selectpicker" >
                	<option value="-1">ALL</option>
                	 <?php
		  	$sqlCatGroup = mysql_query("SELECT * FROM categories");
			while ($row = mysql_fetch_array($sqlCatGroup)) {
				$category = $row['cateName'];
				$categoryID = $row['ID'];
			?>
            <option value="<?php echo $category;  ?>" <?php if (isset($_POST['categories']) && $_POST['categories'] == $category) echo ' selected '; ?>><?php echo $category;  ?></option>
            	
               
            <?php
			}
		  ?>
                </select>
                
        	</div>
        </div>
        <div class="control-group input-prepend" style="margin-left:-120px;">
        <input type="hidden" name="basic-search" value="basic" />
        	<label class="control-label" style="padding-top:5px;"><strong>IN</strong></label>
        	<div class="controls">
        		<input name="zipcode" type="text" class="span2 search-query" placeholder="zipcode" value="<?php if (isset($_POST['zipcode'])) echo $_POST['zipcode']; ?>">
                <button type="submit" id="nav-search-button" name="nav-search-button" class="btn btn-info" style="border-radius: 4px; margin-left:20px;"><i class="icon-search icon-white"></i></button>
        	</div>
        </div>
 
	</form>
    
    <script>
		$("#nav-search").submit( function () {
			//alert("");
		});
	</script>
    </div>
	<div class="pull-right" style="color:white">
    	<ul class="nav pull-left">
        	
        	<!-- if session is set -->
            <?php
				if (isLoggedIn()) {
			?>
            <li id="log-after1"><img id="image-bell" src="../img/bell.png" style="  width:40x; height:40px; margin-right:20px; cursor:pointer; visibility:hidden;" /></li>
            	<div class="popup-notifications" style=" display:none;">
                    <span class="popup-triangle-gray" style="position:absolute; margin-top:-15px; margin-left:350px;">
                    </span>
                    <div class="card" style="margin:10px;">
                    	<img src="../img/default_profile_male.png" style="width:100px; height:100px;" />
                        <div style="display:inline-block; padding-left:10px; margin-top:-1px;">
                        	<h4 style="color:black; ">Dineth Hettiarachchi</h4>
                            <h5 style="color:gray; ">Message: This is a message.</h5>
                        </div>
                    </div>
                    <div class="card" style="margin:10px;">
                    	<img src="../img/default_profile_male.png" style="width:100px; height:100px;" />
                        <div style="display:inline-block; padding-left:10px; margin-top:-1px;">
                        	<h4 style="color:black; ">Dineth Hettiarachchi</h4>
                            <h5 style="color:gray; ">Message: This is a message.</h5>
                        </div>
                    </div>
                    <div class="card" style="margin:10px;">
                    	<img src="../img/default_profile_male.png" style="width:100px; height:100px;" />
                        <div style="display:inline-block; padding-left:10px; margin-top:-1px;">
                        	<h4 style="color:black; ">Dineth Hettiarachchi</h4>
                            <h5 style="color:gray; ">Message: This is a message.</h5>
                        </div>
                    </div>
                    <div class="card" style="margin:10px;">
                    	<img src="../img/default_profile_male.png" style="width:100px; height:100px;" />
                        <div style="display:inline-block; padding-left:10px; margin-top:-1px;">
                        	<h4 style="color:black; ">Dineth Hettiarachchi</h4>
                            <h5 style="color:gray; ">Message: This is a message.</h5>
                        </div>
                    </div>
            	</div>
                 <?php
						$profile_info = currentUser ($_SESSION['USERID']);
						//global $uname;
						$uname = $_SESSION['username'];
						$profile1_info = mysql_fetch_array(mysql_query("SELECT * FROM profile1 WHERE username = '$uname'"));
						
						
				?>
        	<li id="log-after2"><img role="button" id="profile-pic-mini" src="<? 
			
								if ($profile_info['userRoleID'] == 1) 
									echo '../img/default_profile_male.png'; 
								else if (strlen ($profile1_info['avatar']) > 0) 
									echo '../includes/show-image.php?ID='.$profile_info['username']; 
								else
									echo '../img/default_profile_male.png'; 
									?>" class="img-circle" style="width:40px; height:40px; cursor:pointer" /></li>
            	<div class="popup-profile" style="display:none; ">
               
                	<table>
                    	<tr>
                        	<td style="padding:20px; padding-right:0px; width:120px;">
                            	<img src="<? 
								if ($profile_info['userRoleID'] == 1) 
									echo '../img/default_profile_male.png'; 
								else if (strlen ($profile1_info['avatar'])  > 0) 
									echo '../includes/show-image.php?ID='.$profile_info['username']; 
								else
									echo '../img/default_profile_male.png'; 
								 ?>
                                 " class="img-circle" style="width:100px; height:100px;" />
                            </td>
                            <td style="width:160px;">
                            	<div style="color:black; padding-right:20px;">
                                	
                                	<h4><?php echo $profile_info['firstName'].' '.$profile_info['lastName']; ?></h4>
                                    <a href="../profile/"><button class="btn btn-primary inline">Account</button></a>
                                    <!--<button class="btn btn-primary inline">Inbox</button>-->
                                </div>
                            </td>
                        </tr>
                    </table>
                    <span class="popup-triangle" style="position:absolute; margin-top:-155px; margin-left:260px;">
                    </span>
                    <div style="background-color:#e7e7e7; width:100%">
                    	<div style="text-align:right; padding:10px;">
                        	<a href="../includes/logout.php" role="button" class="btn"><strong>Sign out</strong></a>
                        </div>
                    </div>
            	</div>
                
                <script>
					// show, hide the mini profile
					$(document).click(function() {
						$(".popup-profile").hide();
						$(".popup-notifications").hide();
					});

					$("#profile-pic-mini").click(function(event){
						event.stopPropagation();
					});

					$("#profile-pic-mini").click(function(){
						$(".popup-profile").fadeIn(300);
						$(".popup-notifications").hide();
					});
					// show, hide the notificaiton panel

					$("#image-bell").click(function(event){
						event.stopPropagation();
					});

					$("#image-bell").click(function(){
						//$(".popup-notifications").fadeIn(300);
						$(".popup-profile").hide();
					});
				</script>
          <?php
				} else {
			?>
          <!-- if session is not set -->
          <li id="log-before1"><a href="../login/">Login</a></li>
          	
          <li id="log-before2" class="session-unset"><a href="../signup/">Signup</a></li>
          
          <?php }
		  ?>
          	
    	</ul>
    </div>
  </div>
</div>
	</div>
</header>