<!-- form div starts -->
<div style="width:700px; margin:0 auto; padding-top:40px;">
    <!-- alert starst -->
    <div style="display:none;" id="alert" class="alert alert-error fade-in"><a class="close" data-dismiss="alert" href="#">&times;</a></div>
    <!-- alert ends -->
    <form name="billing" id="billing" class="form-horizontal" method="post" action="?step=7">

	<div id="term" class="control-group">
            <label class="control-label" for="inputTerm">Term</label>
            <div class="controls">
            	<select class="selectpicker" name="inputTerm" id="inputTerm" onchange="validateTerm();">
            		<option value="select"></option>
        		      <option value="3 months">3 months</option>
		              <option value="6 months">6 months</option>
        		      <option value="1 year">1 year</option>
	            </select>
            </div>
        </div>
        
        
    <!-- invoice -->
        <div id="invoice" class="control-group">
            <label class="control-label" for="inputInvoice">Invoice $</label>
            <div class="controls">
            	<div class="input-append">
                	<input class="span4" type="text" name="inputInvoice" id="inputInvoice" style="text-align: right;width:100px" readonly/>
                </div>
            </div>
        </div>

        <!-- payment type -->
    	<div id="cardinfo" class="control-group">
            <label class="control-label" for="inputCardType">CardType</label>
            <div class="controls">
            	<select class="selectpicker" name="inputCardType" id="inputCardType" onchange="validatePaymentType();">
            		<option value="select"></option>
        		      <option value="visa">visa</option>
		              <option value="mastercard">mastercard</option>
        		      <option value="american express">american express</option>
    	    	      <option value="discover">discover</option>
	            </select>
            </div>
        </div>
        
        <div id="cardno" class="control-group">
            <label class="control-label" for="inputCardNo">Card No.</label>
            <div class="controls">
            	<div class="input-append">
                	<input class="span4" type="text" name="inputCardNo" id="inputCardNo" onkeyup="validateCardNo();">
                </div>
            </div>
        </div>
        
        <div id="security" class="control-group">
            <label class="control-label" for="inputSecurity">Security No.</label>
            <div class="controls">
            	<div class="input-append">
                	<input class="span4" type="text" name="inputSecurity" id="inputSecurity" onkeyup="validateSecurity();">
                </div>
            </div>
        </div>
        
        <div id="expiremonth" class="control-group">
            <label class="control-label" for="inputExpiremonth">Expire Month</label>
            <div class="controls">
            	<div class="input-append">
                	<input class="span4" type="text" name="inputExpiremonth" id="inputExpiremonth" onkeyup="validateExpireMonth();">
                </div>
            </div>
        </div>
        
        <div id="expireyear" class="control-group">
            <label class="control-label" for="inputExpireyear">Expire Year</label>
            <div class="controls">
            	<div class="input-append">
                	<input class="span4" type="text" name="inputExpireyear" id="inputExpireyear" onkeyup="validateExpireDate();">
                </div>
            </div>
        </div>
        
        <div id="fullname" class="control-group">
            <label class="control-label" for="inputFullname">Your Full Name</label>
            <div class="controls">
            	<div class="input-append">
                	<input class="span4" type="text" name="inputFullname" id="inputFullname" onkeyup="validateFullName();">
                </div>
            </div>
        </div>
        
        <div id="zipcode" class="control-group">
            <label class="control-label" for="inputZipcode">Zip Code</label>
            <div class="controls">
            	<div class="input-append">
                	<input class="span4" type="text" name="inputZipcode" id="inputZipcode" onkeyup="validateZipCode();">
                </div>
            </div>
        </div>
        
        <div class="control-group">
        	<div class="controls" style="float:right">
        		<button name="submit" id="submit" type="submit" class="btn btn-warning">Make a payment</button>
        		<button name="cancel" type="button" class="btn btn-warning" action="">Cancel</button>
        	</div>
      </div>
</form>

<script>
function validateTerm() {
	var paymentType = $("#inputTerm").val();
	if (paymentType == "3 months") {
		$("#inputInvoice").val("100");
	} else if (paymentType == "6 months") {
		$("#inputInvoice").val("200");
	} else if (paymentType == "1 year") {
		$("#inputInvoice").val("400");
	}
	if (paymentType == "3 months" || paymentType == "6 months" || paymentType == "1 year") {
		$("#term").removeClass("error");
		$("#term").addClass("success");
		return true;
	} else {
		$("#term").removeClass("success");
		$("#term").addClass("error");
		return false;
	}
}

function validatePaymentType() {
	var paymentType = $("#inputCardType").val();
	if (paymentType == "visa" || paymentType == "mastercard" || paymentType == "american express" || paymentType == "discover") {
		$("#cardinfo").removeClass("error");
		$("#cardinfo").addClass("success");
		return true;
	} else {
		$("#cardinfo").removeClass("success");
		$("#cardinfo").addClass("error");
		return false;
	}
}

function validateCardNo() {
	if($.isNumeric($("#inputCardNo").val())) {
		$("#cardno").removeClass("error");
		$("#cardno").addClass("success");
		return true;
	} else {
		$("#cardno").removeClass("success");
		$("#cardno").addClass("error");
		return false;
	}
}

function validateSecurity() {
	if($.isNumeric($("#inputSecurity").val())) {
		$("#security").removeClass("error");
		$("#security").addClass("success");
		return true;
	} else {
		$("#security").removeClass("success");
		$("#security").addClass("error");
		return false;
	}
}

function validateExpireDate() {
	if($.isNumeric($("#inputExpireyear").val())) {
		$("#expireyear").removeClass("error");
		$("#expireyear").addClass("success");
		return true;
	} else {
		$("#expireyear").removeClass("success");
		$("#expireyear").addClass("error");
		return false;
	}
}

function validateExpireMonth() {
	if($.isNumeric($("#inputExpiremonth").val())) {
		$("#expiremonth").removeClass("error");
		$("#expiremonth").addClass("success");
		return true;
	} else {
		$("#expiremonth").removeClass("success");
		$("#expiremonth").addClass("error");
		return false;
	}
}

function validateFullName() {
	if($("#inputFullname").val().length >= 5) {
		$("#fullname").removeClass("error");
		$("#fullname").addClass("success");
		return true;
	} else {
		$("#fullname").removeClass("success");
		$("#fullname").addClass("error");
		return false;
	}
}

function validateZipCode() {
	if($.isNumeric($("#inputZipcode").val())) {
		$("#zipcode").removeClass("error");
		$("#zipcode").addClass("success");
		return true;
	} else {
		$("#zipcode").removeClass("success");
		$("#zipcode").addClass("error");
		return false;
	}
}

// validate next form
$(document).ready(function() {
	$("form").submit(function() {
		referrer = document.referrer;
		
		validateTerm();
		validatePaymentType();
		validateCardNo();
		validateSecurity();
		validateExpireDate();
		validateExpireMonth();
		validateFullName();
		validateZipCode();
		
		if (validateTerm() && validatePaymentType() && validateCardNo() && validateSecurity() && validateExpireDate() && validateExpireMonth() && validateFullName() && validateZipCode()) {
			flag = true;
		} else { 
			$("#alert").text("Please fill in the highlighted fields with proper requirement.");
			$("#alert").slideDown();
			$(".close").show();
			$(".alert").alert();
			flag = false;
		}
		return flag;
	});
});
</script>