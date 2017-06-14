var recaptchaButton;
var onloadCallback = function() {
	
	recaptchaButton = grecaptcha.render('recaptchaButton', {
	    'sitekey' : '6LcaLCQUAAAAAB2MwIVNiCEAmaoUlHOucoblEQDk',
	    'callback' : onContactSubmit
	  });
};

function onContactSubmit(token) {
	var emptyFields = $('#Form_ContactForm input[required], #Form_ContactForm textarea[required]').filter(function() {
	    return $(this).val() === "";
	}).length;

	if (emptyFields == 0) {
		if (validateEmail($('#Form_ContactForm_Email').val()))
			$('#Form_ContactForm').trigger('submit');
		else
			$('#msgDiv').html('Please enter a valid email address.');
	}
	else {
		$('#msgDiv').html('Please complete all required fields.');
	}

	grecaptcha.reset(recaptchaButton);
}

$('#Form_ContactForm').submit(function(event) {
	var data = $('#Form_ContactForm').serialize();
    var recaptcha = grecaptcha.getResponse(recaptchaButton);
    $('#recaptchaButton').html('<i class="fa fa-refresh fa-spin"></i><span class="sr-only">Loading...</span>');
    $.ajax({
        url: "/contact/ContactForm",
        data: data+"&g-recaptcha-response="+recaptcha,
        type: "POST",
        success: function (data) {
            $('#msgDiv').html(data);
            if (data == "Your message has been sent. Thanks for getting in touch, we'll be with you soon.")
            	$('#recaptchaButton').html('Message Sent').attr('disabled','true');
            else
            	grecaptcha.reset(recaptchaButton);
        }
    })
    event.preventDefault();
});