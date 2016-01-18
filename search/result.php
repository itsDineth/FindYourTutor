
 
            	<div class="span3 card" style="width:575px; height:260px; margin:10px;">
                <div class="profile-pic-rating pull-left" style="text-align:center; width:170px;">
                    <div style="padding:15px;">
                    <div style="overflow:hidden; width:140px; height:140px;" class="img-circle">
                        <img src="<?php echo '../includes/show-image.php?ID='.$row['username']; ?>"  style="box-shadow: 0 3px 10px #999; min-height:140px;" />
                        
                    </div>
                    </div>
                    <div>
                    
                         <ul class="tutor-raing" style="display:inline-block; margin-top:5px;">

                                <?php
					$trID = $row['ID'];
					$sqlRatings = mysql_query("SELECT * FROM reviews WHERE reviewedTutorID = '$trID'");
					$trCount = 0;
					$trTotal = 0;
					while ($row3 = mysql_fetch_array($sqlRatings)) {
						$trTotal += ($row3['r1']+1);
						$trTotal += ($row3['r2']+1);
						$trTotal += ($row3['r3']+1);
						$trTotal += ($row3['r4']+1);
						$trCount++;
					}
					if ($trCount != 0)
						$ratingNumber = floor($trTotal/($trCount*5));
					else
						$ratingNumber = -1;
					
					for ($i = 0; $i<=$ratingNumber; $i++) {
							echo '<li><img style="width:20px;" src="../img/star.png"></li>';
						}
				?>
                        </ul>
                        <h4><?php if ($trCount != 0) { echo $trCount.' Review(s)'; } ?></h4>
                    </div>
                </div>
                
        
        
                <div class="profile-summary pull-right" style="padding-right:15px; width:380px; padding-bottom:10px;">
                    <a href="../tutor/?ID=<?php echo $row['ID']; ?>"><h2 style="font-size:24px;"><?php echo ucwords($row['firstName'].' '.$row['lastName']);  ?></h2></a>
                    <h3 style="color:green; font-size:16px;"><em><blockquote><?php echo substr(ucwords($row['tagline']),0,42);  ?></blockquote></em></h3><img src="../img/white-gadient.png" aria-hidden="true" style="margin-left:320px; margin-top:-93px;"/>
                    <table cellpadding="6" style="margin-top:-40px;">
                    	<tr>
                        	<td colspan="2"><div style="height:20px; overflow:hidden;"><strong>Subjects: </strong><?php echo ucwords(rtrim(str_replace(' ', ', ',substr($row['subjects'], 0, 38)), ", "));  ?><img src="../img/white-gadient.png" aria-hidden="true" style="margin-left:320px; margin-top:-50px;"/></div></td>
                        </tr>
                        <tr>
                        	<td><strong>Hourly Rate:</strong> $<?php echo $row['rate'];  ?><!--<strong><span class="label label-warning">Full-time</span>--></td>
                            <td></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="color:blue"><?php if ($row['radius'] != -1 && $row['radius'] != 0) { ?>Travels within <?php echo $row['radius'];  ?> mile(s) of <?php echo $row['city'];  ?>, <?php echo $row['state'];  } else echo ' '; ?></td>
                        </tr>
                    </table>
                    
                    <a href="../tutor/?ID=<?php echo $row['ID']; ?>" style="color:#CCC"><span style="font-size:30px; font-weight:bold; margin-left:355px; position:absolute; ">...</span></a>
                </div>
                </div>