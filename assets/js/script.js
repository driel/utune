jQuery(function($){
	$(window).on("scroll", function(e){
		console.log($(this).scrollTop());
		if($(this).scrollTop() > 90){
			$('.utune-backto-top').fadeIn();
		}else{
			$('.utune-backto-top').fadeOut();
		}
	});

	$('.utune-backto-top').on('click', function(){
		$('html, body').animate({
			'scrollTop': '0'
		});
	});

	$('#menu-footer li:last-child').css({
		'border-right': '0'
	});

	$('.page-numbers').addClass('pagination');
});