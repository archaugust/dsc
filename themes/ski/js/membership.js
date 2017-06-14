$(function() {
	$( "#form_dob" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd'
	});
	
	$("input[type=radio][name=MembershipType]").change(function(){
		var e = $(this),
			total;
		if (e.val() == "Individual")
			total = 75;
		else
			total = 100;
		if ($("#form_donation").val() != "") {
			total += parseInt($("#form_donation").val());
		}
		$(".o-payment").removeClass("u-hidden").find("span").html(total);
	});
	
	$("#form_donation").change(function(){
		var e = $("input[type=radio][name=MembershipType]"),
			total;
		if (e.val() == "Individual")
			total = 75;
		else
			total = 100;
		if ($(this).val() != "") {
			total += parseInt($("#form_donation").val());
		}
		$(".o-payment").find("span").html(total);
	});
} );

$(".o-submit").click(function(event){
	var emptyFields = $('#Form_MembershipForm input[required], #Form_MembershipForm textarea[required]').filter(function() {
	    return $(this).val() === "";
	}).length;

	if (emptyFields == 0) {
		if (validateEmail($('#Form_MembershipForm_Email').val()))
			$('#Form_MembershipForm').trigger('submit');
		else
			$('#msgDiv').html('Please enter a valid email address.');
	}
	else {
		$('#msgDiv').html('Sorry, you haven’t completed all mandatory fields.');
	}
    event.preventDefault();
});

$('#Form_MembershipForm').submit(function(event) {
	var data = $('#Form_MembershipForm').serialize();
    $('.o-submit').html('<i class="fa fa-refresh fa-spin"></i><span class="sr-only">Sending...</span>');
    $.ajax({
        url: "/membership/MembershipForm",
        data: data,
        type: "POST",
        success: function (data) {
            $('#msgDiv').html(data);
           	$('.o-submit').html('Application Sent').attr('disabled','true');
        }
    })
    event.preventDefault();
});
