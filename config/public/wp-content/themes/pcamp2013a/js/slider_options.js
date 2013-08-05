jQuery(document).ready(function() {

	$var_1 = php_data.transition_header;
	$var_2 = php_data.navigation_header;
	$var_3 = php_data.auto_header;
	$blog_title = php_data.blog_title;
	$arrow_prev = '<img src="' + $blog_title + '/images/arrow-slide_prev.png">';
	$arrow_next = '<img src="' + $blog_title + '/images/arrow-slide_next.png">';
	$var_4 = php_data.auto_photos;
	$var_5 = php_data.random_photos;
	$var_8 = php_data.transition_photo;
	$var_6 = php_data.auto_sentences;
	$var_7 = php_data.transition_sentences;

	jQuery(function(){
		$('.flexslider').flexslider({
			animation: "fade",
			startAt: 0, 
			controlNav: false,               
			directionNav: true,       
			prevText: $arrow_prev,           
			nextText: $arrow_next,
			animationLoop: true,
			animationSpeed: 1500,
			slideshow: $var_4,
			slideshowSpeed: $var_8,
			randomize: $var_5,
		});
	});

	jQuery(function(){
	  $("#slides").slidesjs({
	    width: 2000,
	    height: 2000,
	    play: {
			auto: $var_3,
			interval: $var_1,
			pauseOnHover: true
		},
		navigation: {
	      active: $var_2,
	      effect: "slide"
	    }
	  });
	});

	jQuery(function() {
	
		$('#da-slider').cslider({
			autoplay: $var_6,
			interval    : $var_7
		});
		
	});

});