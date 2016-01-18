      <form name="advanced-search" id="advanced-search" method="post" action="../search/search-process.php">
      	<!-- subject -->
        <div id="subject" class="control-group">
        <label class="control-label" for="inputSubject"><strong>Subject</strong></label>
        <div class="controls">
          <select id="adSubject" name="adSubject" class="selectpicker span11" multiple="multiple" data-live-search="true" >
          	   <?php
		  	$sqlCatGroup = mysql_query("SELECT * FROM categories");
			while ($row = mysql_fetch_array($sqlCatGroup)) {
				$category = $row['cateName'];
				$categoryID = $row['ID'];
			?>
            	<optgroup label="<?php echo $category;  ?>">
                	<?php
						$sqlSubjects = mysql_query("SELECT * FROM categoriessub WHERE catID = '$categoryID'");
						while ($row = mysql_fetch_array($sqlSubjects)) {
							$subject = $row['subjects'];
					?>
                	<option value="<?php echo $subject; ?>"><?php echo $subject; ?></option>
                    <?php
						}
					?>
                 </optgroup>
            <?php
			}
		  ?>
            </select>
       
        </div>
      </div>
      
      	<!-- service location  -->
      <div id="serviceLocation" class="control-group">
        <label class="control-label" for="inputServiceLocation"><strong>Service Location</strong></label>
        <div class="controls">
          <label class="checkbox ">
  			<input name="adLoc1" type="checkbox" id="adLoc1" value="1"> Student's House
		  </label>
          <label class="checkbox ">
  			<input name="adLoc2" type="checkbox" id="adLoc2" value="2"> Tutors's House
		  </label>
          <label class="checkbox ">
  			<input name="adLoc3" type="checkbox" id="adLoc3" value="3"> In a Center
		  </label>
          <label class="checkbox ">
  			<input name="adLoc4" type="checkbox" id="adLoc4" value="4"> Online
		  </label>
       
        </div>
      </div>
        <!-- has transportation -->
        <div id="hasTransportation" class="control-group">
        <label class="control-label" for="inutHasTransportation"><strong>Has Transportation</strong></label>
        <div class="controls">
          <label class="radio">
              <input type="radio" name="adTransportation" id="adTransportation1" value="any" checked>
              Any or N/A
            </label>
          <label class="radio">
              <input type="radio" name="adTransportation" id="adTransportation2" value="yes">
              Yes
            </label>
          <label class="radio">
              <input type="radio" name="adTransportation" id="adTransportation3" value="no">
              No
            </label>
       
        </div>
      </div>
        <!-- travel radius -->
      <div id="travelRadius" class="control-group">
        <label class="control-label" for="inputTravelRadius"><strong>Travel Radius</strong></label>
        <div class="controls">
         <?php
			$travelRadius = array (2=>"2 miles", 5=>"5 miles", 10=>"10 miles", 20=>"20 miles", 30=>"30 miles", 50=>"50 miles", 100=>"100 miles");
		?>
          <select id="adRadius" name="adRadius" class="selectpicker span11">
          	<option value="-1">Any or N/A</option>
            <?php
				foreach ($travelRadius as $key => $radius) {
					echo '<option value="'.$key.'">'.$radius.'</option>';
				}
			?>
          </select>
        </div>
        </div>
         <!-- education -->
      <div id="education" class="control-group">
        <label class="control-label" for="inputEducation"><strong>Education</strong></label>
        <div class="controls">
        	 <label class="radio">
              <input id="adEducation1" type="radio" name="adEducation" value="any" checked>
              Any
            </label>
          <label class="radio">
              <input id="adEducation2" type="radio" name="adEducation" value="highschool">
              High School
            </label>
          <label class="radio">
              <input id="adEducation3" type="radio" name="adEducation" value="college">
              College
            </label>
        </div>
      </div>
      <!-- work experience -->
      <!--
      <div id="experience" class="control-group">
        <label class="control-label" for="inputExperience"><strong>Experience as a Tutor</strong></label>
        <div class="controls">
         <label class="radio">
              <input id="adExperience1" type="radio" name="adExperience" value="any" checked>
              Any
            </label>
          <label class="radio">
              <input id="adExperience2" type="radio" name="adExperience" value="6 months+">
              6 months+
            </label>
          <label class="radio">
              <input id="adExperience3" type="radio" name="adExperience" value="1 year+">
              1 year+
            </label>
        </div>
        </div>
        -->
      <!-- hourly rate -->
      <div id="hourlyRate" class="control-group">
        <label class="control-label" for="inputhHurlyRate"><strong>Hourly Rate (USD/hour)</strong></label>
        <div class="controls">
        	<div class="input-prepend input-append">
          	  <span class="add-on">$</span>
        	<input id="adLow" name="adLow" class="span3" type="number" placeholder="0" />
             <span class="add-on">to $</span>
             <input id="adHigh" name="adHigh" class="span3" type="number" placeholder="100" />
             <!--
             <button name="adSubmit" id="adSubmit" class="btn btn-info" type="submit" style="margin-left:10px; border-bottom-left-radius:4px; border-top-left-radius:4px;"><i class="icon-chevron-right icon-white"></i></button>
             -->
            </div>
        </div>
      </div>
      </form>