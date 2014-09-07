jQuery(function($){

	$(document).on('click', function(e){
		if(e.target.id == 'utune-keyword'){
			$('.utune-keyword').animate({'width':'200px'});
		}else{
			if(e.target.id != 'utune-search-button') $('.utune-keyword').animate({'width':'20px'});
		}
	});

	$('.utune-search-button').on('click', function(){
		$('.utune-keyword').animate({
			'width': '200px'
		});
	});
});