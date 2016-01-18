<div style="width:50%; margin-left:-20px;" class="pull-left">
    	<?php 

			while ($count <= $half && $row = mysql_fetch_array($sqlViewReview)) {
		?>
        <div class="span10 card" style="min-width:180px; width:95%; margin-bottom:15px; padding:20px;">
        	<strong>"<?php echo $row['rsummary']; ?>"</strong><br><br>
        	<table id="ratingTable">
            	<tr>
                	<td>Helpfulness:</td>
                    <td><?php
						$r1 = $row['r1'];
						for ($i = 0; $i<=$r1; $i++) {
							echo '<img style="height:18px; display:inline;" src="../img/star.png">';
						}
                    ?></td>
                </tr>
                <tr>
                	<td>Clarity:</td>
                    <td><?php
						$r2 = $row['r2'];
						for ($i = 0; $i<=$r2; $i++) {
							echo '<img style="height:18px; display:inline;" src="../img/star.png">';
						}
                    ?></td>
                </tr>
                <tr>
                	<td>Friendliness:</td>
                    <td><?php
						$r3 = $row['r3'];
						for ($i = 0; $i<=$r3; $i++) {
							echo '<img style="height:18px; display:inline;" src="../img/star.png">';
						}
                    ?></td>
                </tr>
                 <tr>
                	<td>Knowledgeable:</td>
                    <td><?php
						$r4 = $row['r4'];
						for ($i = 0; $i<=$r4; $i++) {
							echo '<img style="height:18px; display:inline;" src="../img/star.png">';
						}
                    ?></td>
                </tr>
            </table><br>
			<?php echo stripcslashes($row['review']); ?>
            
            <div style="text-align:right"><?php echo $row['firstName']." ".substr($row['lastName'],0,1)."."; ?></div>
        </div>
		<?php
				$count++;
			}
		?>
    </div>