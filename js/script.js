function myDelete (){
    var x = confirm('Are you sure?');

    if(x) {
        return true;
    }else {
        return false;
    }
}

$(document).ready(function(){


	// Login Id
	$('.id_req').click(function(){
		if ($(".id_req").hasClass("show-email")) {
		  	$('.input-group input#log_id').hide();
			$('.input-group input#name').show();
			$('.email-label').text('Your Email');
			$('.id_req').text('Login with ID').removeClass('show-email');
		} else {
			$('.input-group input#name').hide();
			$('.input-group input#log_id').show();
			$('.email-label').text('Your ID');
			$('.id_req').text('Login with email').addClass('show-email');
		}
	});
// scroll korar time  e kaj kkorbe
	$(window).scroll(function(){
	    if ($(window).scrollTop() >= 300) {
	        $('.menu-area').addClass('fixed');
	    }
	    else {
	        $('.menu-area').removeClass('fixed');
	    }
	});

	
	// Join Now banner
	$('.hero-button-area.join-area ul li a').click(function(){
		$('.hero-button-area.join-area').hide();
		$('.hero-button-area.all').fadeIn();
		return false;
	});

	// Owl Carousel 
	$('.banner').owlCarousel({
	  loop: true,
	  items: 1,
	  autoplay: true,
	  autoplayTimeout: 4000,
	  nav: false,
	  dots: false,
	  smartSpeed: 0,
	});

	$('.mobile-nav').click(function(){
		$('.menu-area').addClass('show');
	});
	$('.close-nav').click(function(){
		$('.menu-area').removeClass('show');
	});






	
})