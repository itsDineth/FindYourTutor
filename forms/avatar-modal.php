<!-- Modal -->
<?php
	if (isset($_POST['saveImage'])) {
		//echo '<script>alert ("works");</script>';
	}
?>
<div id="avatar-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="add-avatar" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Upload an image</h3>
  </div>
  <form id="uploadImage"  name="uploadImage" class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="modal-body" style="text-align:center">
  <table>
  	<tr style="margin-bottom:30px;">
    	<td align="center">
        	<!--<img class="fileupload-preview thumbnail" style="max-width:300px; padding-bottom:30px;" id="uploadedImage" src="#" />-->
        </td>
    </tr>
  	<tr>
    	<td align="center">
            <div id="insertImage" class="">
            
                <div class="controls" style="text-align:center">
                    <input type="file" name="file" id="imgInp">
                </div>
            </div>        	
        </td>
    </tr>
  </table>
  

	
        
  </div>
  <div class="modal-footer">
    <button id="saveImage" type="submit" class="btn" aria-hidden="true">Save</button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    
  </div>
  </form>
  
  
  
  
</div>

<script>
	$('#uploadedImage').hide();
	//$("#uploadImage").submit( function () {
		//alert ("works");
		// image upload to buffer
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$('#profile-pic').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
		}
		
		// show a preview of the image; not used
		$("#imgInp").change(function(){
			if( $('#imgInp').val()!=""){
				$('#uploadedImage').show();
		  }
			else{ $('#uploadedImage').hide();}
			readURL(this);
			
		});
	
	//});
  
</script>