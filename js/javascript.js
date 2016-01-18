// JavaScript Document
// Check whether a value is numeric and if not remove the non numerical characters
function validateNumeric () {
	$('.numeric').keyup(function () { 
		this.value = this.value.replace(/[^0-9\.]/g,'');
	});
}

// Validate Checkboxes
function validateCheckBox (cbox, group) {
	if($(cbox).is(':checked')) {
		$(group).removeClass("error");
		return true;
	} else {
		$(group).addClass("error");
		return false;
	}
	return false;
};

// Display/hide the browser date picker for B'day using Modernizr feature detection
function toggleBDatePicker () {
	if (Modernizr.inputtypes.date) {
		//$("#dob5").hide();
		$("#month").removeClass("selectpicker");
		$("#month").css("display","none") ;
		$("#day").removeClass("selectpicker");
		$("#day").css("display","none") ;
		$("#year").removeClass("selectpicker");
		$("#year").css("display","none") ;
	} else {
		$("#dob5").hide();
	}
}

// Toggle popover
function togglePopover (id) {
	$(id).popover();
}

// Validate first name
function validateFirstName() {
	if (($("#inputFirstName").val().length) > 0) {
		$("#firstName").removeClass("error");
		return true;	
	} else {
		$("#firstName").addClass("error");
		return false;
	};
};

// Validate last name
function validateLastName() {
	if (($("#inputLastName").val().length) > 0) {
		$("#lastName").removeClass("error");
		return true;	
	} else {
		$("#lastName").addClass("error");
		return false;
	};
};
// Validate email address
function validateEmail() {
	var email = $("#inputEmail").val();
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm;
	if (($("#inputEmail").val().length) > 0 & re.test(email)) {
			$.ajax({
				url: ('../includes/duplicate-email.php?'),
				type: "get",
				data: 'email='+email,
					success:function(data){
					if (data == 1) {
						$("#email").addClass("error");
						$("#alert").text("There's already an account with this email address");
						$("#alert").slideDown();
						return false;
					}
					else {
						$("#email").removeClass("error");
						$("#alert").slideUp();
						return true;
					}
				}
				});		
	} else {
		$("#email").addClass("error");
		return false;
	};
	return true;
};
// Validate username > 3 characters && duplicates
function validateUsername() {
	var username = $("#inputUsername").val();
	if (($("#inputUsername").val().length) > 3) {
			$.ajax({
				url: ('../includes/duplicate-username.php?'),
				type: "get",
				data: 'username='+username,
					success:function(data){
					if (data == 1) {
						$("#usernameGroup").addClass("error");
						$("#alert").text("Username is already taken.");
						$("#alert").slideDown();
						return false;
					}
					else {
						$("#usernameGroup").removeClass("error");
						$("#alert").slideUp();
						return true;
					}
				}
				});	

	} else {
		$("#usernameGroup").addClass("error");
		return false;
	};
	return true;
	
};
// Validate password; length > 5; regex validation
function validatePassword() {
	var password = $("#inputPassword").val();
	var re = (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])([0-9a-zA-Z]{6,})$/);	
	if (re.test(password)) {
		$("#passwordGroup").removeClass("error");
		return true;
	} else {
		$("#passwordGroup").addClass("error");
		return false;
	};
};
// Validate re-entered password is the same
function validatePassword2() {
	var password1 = $("#inputPassword").val();
	var password = $("#inputPassword2").val();
	if (password1 == password) {
		$("#passwordGroup2").removeClass("error");
		return true;
	} else {
		$("#passwordGroup2").addClass("error");
		return false;
	};
};
// Validate classic b'day
function validateDOB () {
	var month = $("#month").val();
	var day = $("#day").val();
	var year = $("#year").val();
	
	if (month != -1 || day != -1 || year != -1) {
		if (month != -1 && day != -1 && year != -1) {
			$("#DOB").removeClass("error");
			//$("#DOB").addClass("success");
			return true;
		} else {
			$("#DOB").removeClass("success");
			$("#DOB").addClass("error");
			return false;
		};
	} else {
		return true;
	};		
};
// Validate classic b'day 2
function validateDOB2 () {
	var month = $("#month").val();
	var day = $("#day").val();
	var year = $("#year").val();
	
	//if (month != -1 || day != -1 || year != -1) {
		if (month != -1 && day != -1 && year != -1) {
			$("#DOB").removeClass("error");
			//$("#DOB").addClass("success");
			return true;
		} else {
			$("#DOB").removeClass("success");
			$("#DOB").addClass("error");
			return false;
		};		
};
// Validate address
function validateAddress () {
	var address1 =  $("#inputAddress1").val();
	var city	 =  $("#inputCity").val();
	var state	 =  $("#inputState").val();
	var zipcode	 =  $("#inputZipcode").val();
	if (address1.length > 0 || city.length > 0 || state != -1 || zipcode.length > 0) {
		if (address1.length > 0 && city.length > 0 && state != -1 && zipcode.length > 0 && $.isNumeric(zipcode)) {
			$("#address1").removeClass("error");
			$("#city").removeClass("error");
			$("#stateGroup").removeClass("error");
			return true;
		} else {
			$("#address1").addClass("error");
			$("#city").addClass("error");
			$("#stateGroup").addClass("error");
			return false;
		};

	} else {
		$("#address1").removeClass("error");
		$("#city").removeClass("error");
		$("#stateGroup").removeClass("error");
		return true;
	};
}
// validate address 2 
function validateAddress2 () {
	var address1 =  $("#inputAddress1").val();
	var city	 =  $("#inputCity").val();
	var state	 =  $("#inputState").val();
	var zipcode	 =  $("#inputZipcode").val();
	//if (address1.length > 0 || city.length > 0 || state != -1 || zipcode.length > 0) {
		if (address1.length > 0 && city.length > 0 && state != -1 && zipcode.length > 0 && $.isNumeric(zipcode)) {
			$("#address1").removeClass("error");
			$("#city").removeClass("error");
			$("#stateGroup").removeClass("error");
			return true;
		} else {
			$("#address1").addClass("error");
			$("#city").addClass("error");
			$("#stateGroup").addClass("error");
			return false;
		};
}

// validate SSN
function validateSSN() {
	if ($.isNumeric($("#inputSSN").val())) {
		$("#SSN").removeClass("error");
		return true;
	}
	else {
		$("#SSN").addClass("error");
		return false;
	}
}



