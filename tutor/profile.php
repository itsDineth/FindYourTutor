     <div class="container-fluid" style="margin:0 auto; min-width:500px; max-width:1200px; margin-top:15px;">
     	<div style="width:33%; margin-left:-20px;" class="pull-left">
             <div class="span10 card" style="min-width:180px; width:98%;">
              <legend><h3 style="padding-left:10px;">Biography</h3></legend>
             <?php echo $sqlProfile['biography']; ?>
            </div>
            <div class="span10 card" style="min-width:180px; width:98%; margin-top:15px;">
          <legend><h3 style="padding-left:10px;">Teaching</h3></legend>
          <p style="padding-left:10px; line-height:26px;">
          	<strong>Subjects Teach:</strong><br /><?php echo str_replace(" ", ", ", trim($sqlProfile['subjects'])); ?><br /><br />
			<strong>Languages Spoken:</strong><br /><?php echo str_replace(" ", ", ", trim($sqlProfile['languages'])); ?><br /><br />
            <?php if (strlen($sqlProfile['special']) > 0) { ?><strong>Special Care:</strong><br />
				<?php echo str_replace(" ×", ", ", rtrim($sqlProfile['special'],  " ×")); ?><br /><?php } ?>
          </p>
        </div>
        </div>
        <div style="width:33%; margin-left:6px; " class="pull-left">
             <div class="span10 card" style="width:98%; min-width:180px;">
              <legend><h3 style="padding-left:10px;">Education</h3></legend>
              <p style="padding-left:10px; line-height:26px;">
               <?php if (strlen($sqlProfile['highschool']) > 0) { ?><strong>High School</strong><br />
                <?php echo str_replace(" ×", "<br />", rtrim($sqlProfile['highschool'],  " ×")); ?><br /><br /><?php } ?>
              <?php if (strlen($sqlProfile['degree']) > 0) { ?><strong>College</strong><br />
                <?php echo str_replace(" ×", "<br />", rtrim($sqlProfile['degree'],  " ×")); ?><br /><br /><?php } ?>
              <?php if (strlen($sqlProfile['certificate']) > 0) { ?><strong>Certifications</strong><br />
               <?php echo str_replace(" ×", "<br />", rtrim($sqlProfile['certificate'],  " ×")); ?><br /><?php } ?>
              </p>
            </div>
            <?php
				$locationArray = array ("","Student's House", "Tutor's House", "In a Center", "Online")
			?>
                 <div class="span10 card" style="width:98%; min-width:180px; margin-top:15px;">
              <legend><h3 style="padding-left:10px;">Tutoring</h3></legend>
              <p style="padding-left:10px; line-height:26px;">
                <strong>Tutoring Rate:</strong><br />$<?php echo $sqlProfile['rate']; ?>/hour<br /><br />
                <?php if (strlen($sqlProfile['locations']) > 0) {?>
                <strong>Service Location(s):</strong><br /><?php 
																$lArray = explode(",",rtrim($sqlProfile['locations'], ','));
																foreach ($lArray as $lArrayS) {
																	foreach ($locationArray as $key => $value) {
																		if ($key == $lArrayS) {
																			echo $value."<br />";
																		}
																	}
																}
															?><br /><?php } ?>
                <strong>Transportation:</strong><br /><?php if ($sqlProfile['transport'] == 'yes') echo "Available"; else echo "Not available"; ?><br /><br />
                <?php if ($sqlProfile['radius'] != '-1') { ?><strong>Travel Radius:</strong><br /><?php if (strlen($sqlProfile['radius']) > 0); echo $sqlProfile['radius']; ?> mile(s)<br /><?php } ?>
              </p>
            </div>
        </div>
        <div style="width:33%; margin-right:22px;" class="pull-right">
        		        <div class="span10 card" style="width:98%; min-width:180px; padding-right:7px;">
          <legend><h3 style="padding-left:10px;">Experience</h3></legend>
          <p style="padding-left:10px; line-height:26px;">
          	<strong>Experience: </strong><?php echo $sqlProfile['experience']; ?><br />
			<?php if (strlen($sqlProfile['detail']) > 0); echo $sqlProfile['detail']; ?>
          </p>
        </div>
      </div>
        </div>

    </div>