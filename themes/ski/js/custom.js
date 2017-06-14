$(function(){
	$('.c-header').affix({
	    offset: {
	        top: 163
	    }
	});
	
	$(".o-menu-mobile").click(function(){
		$(this).toggleClass("fa-bars");
		$(".o-menu").slideToggle();
	});
	
	$(window).scroll(function() {
	    if ($(this).scrollTop() >= 50) {
	        $('#return-to-top').fadeIn(200);
	    } else {
	        $('#return-to-top').fadeOut(200);
	    }
	});

	$('#return-to-top').click(function() {
	    $('body,html').animate({
	        scrollTop : 0
	    }, 500);
	});
	
	$('a[href*=\\#]').on('click', function(event){     
	    $('html,body').animate({scrollTop:$(this.hash).offset().top - 60}, 500);
	});
});

$('html').click(function() {
	$('.o-menu-mobile').addClass('fa-bars');
	if ($(window).width() <= 1200) {
		$('.o-menu').slideUp();
	}
});

$(window).resize(function(){
	if ($(window).width() > 1200) 
		$('.o-menu').fadeIn();
	else 
		$('.o-menu').fadeOut();
	$('.o-menu-mobile').addClass('fa-bars');
});

$('.o-menu-mobile').click(function(event){
	event.stopPropagation();
});

function validateEmail(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}