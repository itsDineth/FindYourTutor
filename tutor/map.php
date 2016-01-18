		
		<?php $street = $sqlProfile['address1'];
			  $city = $sqlProfile['city'];
			  $state = $sqlProfile['state'];
			  $zipcode = $sqlProfile['zipcode'];
			  $location = "$street,+$city,+$state,+$zipcode";
			  
		?>
		<iframe name ="mapframe" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
				src="https://maps.google.com/maps?q=<?php echo"$zipcode";?>&amp;ie=UTF8&amp;hq=&amp;hnear= <?php echo"$location";?>&amp;t=m&amp;z=13&amp;output=embed">
		</iframe><br /><small>
</div>