
$(document).ready(function(){

	
	/* ---- Countdown timer ---- */
	var end = new Date('Sat Sep 15 2018	 11:00:00 GMT+0200 (CEST)');
	var now = new Date();
	var distance = end - now;
	

	$('#counter').countdown({

		timestamp : (new Date()).getTime() + distance	
	});


	/* ---- Animations ---- */

	$('#links a').hover(
		function(){ $(this).animate({ left: 3 }, 'fast'); },
		function(){ $(this).animate({ left: 0 }, 'fast'); }
	);

	$('footer a').hover(
		function(){ $(this).animate({ top: 3 }, 'fast'); },
		function(){ $(this).animate({ top: 0 }, 'fast'); }
	);


	/* ---- Using Modernizr to check if the "required" and "placeholder" attributes are supported ---- */

	/* if (!Modernizr.input.placeholder) {
		$('.email').val('Escribe tu E-mail aquí...');
		$('.email').focus(function() {
			if($(this).val() == 'Escribe tu E-mail aquí...') {
				$(this).val('');
			}
		});
	}

	// for detecting if the browser is Safari
	var browser = navigator.userAgent.toLowerCase();

	if(!Modernizr.input.required || (browser.indexOf("safari") != -1 && browser.indexOf("chrome") == -1)) {
		$('form').submit(function() {
			$('.popup').remove();
			if(!$('.email').val() || $('.email').val() == 'Escribe tu E-mail aquí...') {
				$('form').append('<p class="popup">Por favor, completa este campo.</p>');
				$('.email').focus();
				return false;
			}
		});
		$('.email').keydown(function() {
			$('.popup').remove();
		});
		$('.email').blur(function() {
			$('.popup').remove();
		});
	}
*/
});

