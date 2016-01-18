<?php
	require_once("../template/header.php");
	require_once("../template/wrapper.php");
?>
<style>
@media (max-width:1300px) {
	.container-fluid {
		width:80%;
	}
}
</style>
<div class="container-fluid " style="margin:0 auto; margin-left:10%">
  <div class="row-fluid" style="margin:0 auto">
    <aside class="span3 card advanced-search" style="padding:20px; max-width:300px;">
      <!--Sidebar content-->
      <legend>Advanced Search</legend>
		<?php
			require_once("../forms/advanced-search.php");
		?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- PTS300 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:260px;height:600px"
     data-ad-client="ca-pub-5846712583215181"
     data-ad-slot="4112551830"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

    </aside>
    <div class="span9" style="margin-top:-10px;">
      <!--Body content-->
      <div class="fluid-row" id="search-results" >
        	<?php
				
				if (isset($_POST['basic-search'])) {
					$zipcode = $_POST['zipcode'];
					$category = $_POST['categories'];
					if (strlen($zipcode) > 0) {
						$sql = (mysql_query("SELECT * FROM
												(((users LEFT JOIN profile1 ON users.username = profile1.username)
													LEFT JOIN profile4 ON users.username = profile4.username)
														LEFT JOIN profile5 ON users.username = profile5.username)
												WHERE (zipcode = '$zipcode' && pstatus = 6) "
												));
						$_SESSION['zipcode'] = $zipcode;
						$_SESSION['category'] = $category;
						$basic = true;
					} else if (!isset($_POST['advanced-search'])) {
						$sql = (mysql_query("SELECT * FROM
												(((users LEFT JOIN profile1 ON users.username = profile1.username)
													LEFT JOIN profile4 ON users.username = profile4.username)
														LEFT JOIN profile5 ON users.username = profile5.username)
												WHERE (pstatus = 6) "
												));
						$_SESSION['category'] = $category;
						$_SESSION['zipcode'] = '';
						$basic = true;
					} 
				} else {
					$sql = (mysql_query("SELECT * FROM
											(((users LEFT JOIN profile1 ON users.username = profile1.username)
												LEFT JOIN profile4 ON users.username = profile4.username)
													LEFT JOIN profile5 ON users.username = profile5.username)
											WHERE (pstatus = 6) "
											));
					$basic = false;
					$zipcode = false;
				}
				$tCount = 0;
				if (mysql_affected_rows() > 0) {
				while ($row = mysql_fetch_array($sql)) {
					$username = $row['username'];
					$sqlCateID = mysql_fetch_array(mysql_query("SELECT * FROM categories WHERE cateName = '$category'"));
					$cateID = $sqlCateID['ID'];
					$sqlSubjects = mysql_query("SELECT * FROM categoriessub WHERE catID = '$cateID'");
					
					$flag = false;
					while ($rowSubs = (mysql_fetch_array($sqlSubjects))) {
						$sub = $rowSubs['subjects'];
						
						$sqlTutorSubs = mysql_query("SELECT * FROM profile4 WHERE (username = '$username' && subjects LIKE '%$sub%')");
						if (mysql_affected_rows() > 0) {
							$flag = true;
							break;
						}
					}
					if (($flag) || $category == -1 || !$basic) {
						
					echo '<div id="search-result-wrapper">';
					require("search-result.php");
					echo '</div>';
					$tCount++;
					}
				}
				} else {
					echo 'No results';
				}
			?>
         </div>
      	
      <!--Body content ends-->
          <!-- pagination -->
<?php
	if ($tCount > 100) {
		?>
    <div class="pagination ">
      <ul class="card" style="padding:10px; margin:0 auto; margin-top:20px; margin-left:10px;">
        <li class=""><a href="#">&laquo;</a></li>
        <li class=""><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li class=""><a href="#">3</a></li>
        <li class=""><a href="#">4</a></li>
        <li class=""><a href="#">5</a></li>
        <li class=""><a href="#">6</a></li>
        <li class=""><a href="#">7</a></li>
        <li class=""><a href="#">&raquo;</a></li>
      </ul>
    </div>
	<?php }
	?>
    </div>



  </div>
  
</div>
<script>
// on chage subject
$(document).ready(function(){
   $('#adSubject').change(function(){
       $('#advanced-search').submit();
    });
	$('#adLoc1').change(function(){
       $('#advanced-search').submit();
    });
	$('#adLoc2').change(function(){
       $('#advanced-search').submit();
    });
	$('#adLoc3').change(function(){
       $('#advanced-search').submit();
    });
	$('#adLoc4').change(function(){
       $('#advanced-search').submit();
    });
	$('#adTransportation1').change(function(){
       $('#advanced-search').submit();
    });
	$('#adTransportation2').change(function(){
       $('#advanced-search').submit();
    });
	$('#adTransportation3').change(function(){
       $('#advanced-search').submit();
    });
	$('#adRadius').change(function(){
       $('#advanced-search').submit();
    });
	$('#adEducation1').change(function(){
       $('#advanced-search').submit();
    });
	$('#adEducation2').change(function(){
       $('#advanced-search').submit();
    });
	$('#adEducation3').change(function(){
       $('#advanced-search').submit();
    });
	$('#adExperience1').change(function(){
       $('#advanced-search').submit();
    });
	$('#adExperience2').change(function(){
       $('#advanced-search').submit();
    });
	$('#adExperience3').change(function(){
       $('#advanced-search').submit();
    });
	$('#adLow').keyup(function(){
       $('#advanced-search').submit();
    });
	$('#adHigh').keyup(function(){
       $('#advanced-search').submit();
    });
	
}); 

// onchange input submit form
$(document).ready(function(){
   $('#advanced-search').submit(function(){
		$.ajax({
			url: $(this).attr('action'),
			type: $(this).attr('method'),
			data: $(this).serialize(),
				success:function(data){
				if (data == 1) {
					//load('search-process.php');
					var subject = $("[name=adSubject]").val();
					var location1 = $("[name=adLoc1]:checked").val();
					var location2 = $("[name=adLoc2]:checked").val();
					var location3 = $("[name=adLoc3]:checked").val();
					var location4 = $("[name=adLoc4]:checked").val();
					var transportation = $("[name=adTransportation]:checked").val();
					var radius = $("[name=adRadius]").val();
					var education = $("[name=adEducation]:checked").val();
					var experience = $("[name=adExperience]:checked").val();
					var lrate = $("[name=adLow]").val();
					var hrate = $("[name=adHigh]").val();
					$("#search-results").load("search-result.php?z=advanced&a="+subject+"&ba="+location1+"&bb="+location2+"&bc="+location3+"&bd="+location4+"&c="+transportation+"&d="+radius+"&e="+education+"&f="+experience+"&g="+lrate+"&h="+hrate);
				}
				else {
					alert (0);
					//console.log(data);
				}
			}
		});
		return false;
    });
}); 



</script>


<?php
	require_once("../template/footer.php");
?>