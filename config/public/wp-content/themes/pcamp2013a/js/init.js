jQuery(document).ready(function($){

	setTimeout(function(){
      $('.header_play_button').css('display','block');
    },2000);

	if (navigator.userAgent.match(/iPad/i)) {
		var viewportmeta = document.querySelector('meta[name="viewport"]');
		if (viewportmeta) {
			viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0';
			document.body.addEventListener('gesturestart', function() {
				viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0';
			}, false);
		}
	}
	//ipad and iphone fix
	if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
	    $(".p-member").click(function(){
	        //we just need to attach a click event listener to provoke iPhone/iPod/iPad's hover event
	        //strange
	    });
	    $('.p-member a').on('click touchend', function(e) {
		    var el = $(this);
		    var link = el.attr('href');
		    window.location = link;
		});
		$('.hover-work').css('display','none');
		$('.hover-work-eye').css('display','none');
		$('.rb-grid li').click(function(){

		});
		$('.hover-expand-work').css('display','none');
		$('.hover-expand-eye').css('display','none');
		$('.superbox-list').click(function(){

		});
	}

	// Set pixelRatio to 1 if the browser doesn't offer it up.
	var pixelRatio = !!window.devicePixelRatio ? window.devicePixelRatio : 1;

	// Rather than waiting for document ready, where the images
	// have already loaded, we'll jump in as soon as possible.
	$(window).on("load", function() {
	    if (pixelRatio > 1) {
	        $('img.retina').each(function() {

	            // Very naive replacement that assumes no dots in file names.
	            $(this).attr('src', $(this).attr('src').replace(".","@2x."));
	        });
	        $('.all_services img').each(function(){
				$(this).attr('src', $(this).attr('data'));
			});
	        $('.news .icon img').each(function(){
				$(this).attr('src', $(this).attr('data'));
			});
			if($('#logo a img').attr('data')){
				$('#logo a img').attr('src', $('#logo a img').attr('data'));
			}
			if($('link[rel="icon"]').attr('data')){
				$('link[rel="icon"]').attr('href', $('link[rel="icon"]').attr('data'));
			}
	    }
	});

	$('.cat').each(function(){
	    var title = $(this).find('.title');
		var id = $(title).text();
	    var t = id.split(" ");
	    var title1 = t[0];
	    var title2 = t[1];
	    var link = $(this).attr('id');
		var menu = '<td><a href="#' + link + '" id="menu_' + link + '" class="menu_links">' + title1 + '<br><strong>' + title2 + '</strong></a></td>';
		var menu_phone = '<a href="#' + link + '"><li><strong>' + title1 + ' ' + title2 + '</strong></li></a>'
		$('#menu table tr').append(menu);
		$('#menu_phone ul').append(menu_phone);
	});
	var anchor = $('.cat').first().attr('id');
	$('#discover a').attr('href', '#' + anchor);

	/* ANIMATION OF DISCOVER */

	// var textheadercontain = $('.text_header_contain');
	// var discover = $('#discover');
	//   textheadercontain.addClass('animated bounceInRight');
	//   discover.addClass('animated fadeInUpBig');
	//  setTimeout(function(){
	//   discover.removeClass('animated fadeInUpBig');
	// },2000);

	/* HEADER VIDEO */

	function playHeaderVideo(){
		var id = $(this).attr('id');
		var cut = id.split("_");
		var cutID = cut[3];

		var img = '#header_img_' + cutID;
		var video = '#header_video_' + cutID + ' iframe';
		$(img).css('opacity', 0);
		var src = $(video).attr('src');
		$(video).attr('src', src.replace("autoplay=0", "autoplay=1"));
		setTimeout(function(){$(img).css('display', 'none');},1000)
	}

	$('.header_play_button').click(playHeaderVideo);

	var widthDiscover = parseInt($('#discover').css('width')) / 2 + 15;
	$('.header_play_button').css('margin-left', widthDiscover);

	/* MENU PHONE */

	function heightMenuPhone(){
		var maxHeight = parseInt(window.innerHeight) - 88;
		$('#menu_phone').css('max-height', maxHeight);
	}
	heightMenuPhone();
	$(window).resize(heightMenuPhone);

	/* THUMBNAILS */

	$('.members').css('display','none');
	$('.members').first().css('display','block');

	$('.button_team').first().addClass('active_team');

	$('.button_team').click(function(){
		$(".button_team").removeClass("active_team");
		$(this).addClass("active_team");
		$('.members').css('display','none');
		var current = $(this).attr('id');
		$('#members-' + current).css('display','block');
	});

	/* TEXT PART */

	$('.text_part_content p iframe').parent().css({'position': 'relative', 'height': 0, 'padding-bottom': '56.25%', 'overflow': 'hidden'});

	/* ANIMATION SERVICES */

	var allservices = $('.all_services');
	allservices.mouseenter(function(){
		$(this).animate({top: '-20'}, 250, function(){

		});
	}),
	allservices.mouseleave(function(){
		$(this).animate({top: '0'}, 250, function(){

		});
	});

	/* SHOWCASE */

	/* SHOWCASE */
	var showcase = $('#showcase_1');
	if(showcase.hasClass('iphone5')){
		showcase.showcase({separation: 250})
	} else if(showcase.hasClass('ipad')){
		showcase.showcase({separation: 400})
	} else if(showcase.hasClass('imac')){
		showcase.showcase({separation: 570})
	} else if(showcase.hasClass('null')){
		showcase.showcase({separation: 570})
	}
	$('.button_products').click(function(){
		var current = $(this).attr('id');
	    var n=current.split("_");
	    showcasen = '#showcase_' + n[2];
		if($(showcasen).hasClass('iphone5')){
			$(showcasen).showcase({separation: 250})
		} else if($(showcasen).hasClass('ipad')){
			$(showcasen).showcase({separation: 400})
		} else if($(showcasen).hasClass('imac')){
			$(showcasen).showcase({separation: 570})
		} else if($(showcasen).hasClass('null')){
			$(showcasen).showcase({separation: 570})
		}
	});

	/* READ MORE */

	var showText='READ MORE';
	var hideText='READ LESS';
	var is_visible = false;

	var more = $('.more');
	more.next().append('<div class="read_more"><a href="#" class="toggleLink">'+showText+'</a></div>');

	more.hide();

	$('a.toggleLink').click(function() {
		is_visible = !is_visible;
		$(this).html( (!is_visible) ? showText : hideText);
		$(this).parent().parent().prev('.more').slideToggle('slow');

		return false;
	});

	/* NUMBER OF FACEBOOK FANS */
	var nbfbfan = php_init.facebookid;
	$.ajax({
	    url: 'https://graph.facebook.com/' + nbfbfan + '',
	    dataType: 'jsonp',
	    success: function(data) {
	        $('#fans').html(data.likes);
	   }
	});

	/* NUMBER OF FOLLOWERS TWITTER */
	/*var nbtwitterfan = php_init.twitter;
    $.ajax({
        url: 'https://api.twitter.com/1.1/users/show.json',
        data: {screen_name: nbtwitterfan},
        dataType: 'jsonp',
        success: function(data) {
            $('#followers').html(data.followers_count);
       }
    });*/

	function zillaLikesActive(){
		$(this).parent().parent().addClass('red');
	}
	$('.zilla-likes.active').each(zillaLikesActive);
	$('.news_share').on('click', '.zilla-likes', zillaLikesActive);

});

/*!
 * jQuery Cookie Plugin v1.3.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD. Register as anonymous module.
		define(['jquery'], factory);
	} else {
		// Browser globals.
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function raw(s) {
		return s;
	}

	function decoded(s) {
		return decodeURIComponent(s.replace(pluses, ' '));
	}

	function converted(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}
		try {
			return config.json ? JSON.parse(s) : s;
		} catch(er) {}
	}

	var config = $.cookie = function (key, value, options) {

		// write
		if (value !== undefined) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setDate(t.getDate() + days);
			}

			value = config.json ? JSON.stringify(value) : String(value);

			return (document.cookie = [
				config.raw ? key : encodeURIComponent(key),
				'=',
				config.raw ? value : encodeURIComponent(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// read
		var decode = config.raw ? raw : decoded;
		var cookies = document.cookie.split('; ');
		var result = key ? undefined : {};
		for (var i = 0, l = cookies.length; i < l; i++) {
			var parts = cookies[i].split('=');
			var name = decode(parts.shift());
			var cookie = decode(parts.join('='));

			if (key && key === name) {
				result = converted(cookie);
				break;
			}

			if (!key) {
				result[name] = converted(cookie);
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		if ($.cookie(key) !== undefined) {
			// Must not alter options, thus extending a fresh object...
			$.cookie(key, '', $.extend({}, options, { expires: -1 }));
			return true;
		}
		return false;
	};

}));

jQuery(function() {

var Boxgrid = (function() {

	$=jQuery;

	var $items = $( '#rb-grid > li' ),
		transEndEventNames = {
			'WebkitTransition' : 'webkitTransitionEnd',
			'MozTransition' : 'transitionend',
			'OTransition' : 'oTransitionEnd',
			'msTransition' : 'MSTransitionEnd',
			'transition' : 'transitionend'
		},
		// transition end event name
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		// window and body elements
		$window = $( window ),
		$height = window.screen.height;
		$height = $height * 2;
		$body = $( 'BODY' ),
		// transitions support
		supportTransitions = Modernizr.csstransitions,
		// current item's index
		current = -1,
		// window width and height
		winsize = getWindowSize();

	function init( options ) {
		initEvents();
	}

	function initEvents() {

		$items.each( function() {

			var $item = $( this ),
				$close = $item.find( 'span.rb-close' ),
				$overlay = $item.children( 'div.rb-overlay' );

			$item.on( 'click', function() {

				$(this).css('opacity',1);

				if( $item.data( 'isExpanded' ) ) {
					return false;
				}
				$item.data( 'isExpanded', true );
				// save current item's index
				current = $item.index();

				var layoutProp = getItemLayoutProp( $item ),
					clipPropFirst = 'rect(' + layoutProp.top + 'px ' + ( layoutProp.left + layoutProp.width ) + 'px ' + ( layoutProp.top + layoutProp.height ) + 'px ' + layoutProp.left + 'px)',
					clipPropLast = 'rect(0px ' + winsize.width + 'px ' + $height + 'px 0px)';

				$overlay.css( {
					clip : supportTransitions ? clipPropFirst : clipPropLast,
					opacity : 1,
					zIndex: 9999,
					pointerEvents : 'auto'
				} );

				if( supportTransitions ) {
					$overlay.on( transEndEventName, function() {

						$overlay.off( transEndEventName );

						setTimeout( function() {
							$overlay.css( 'clip', clipPropLast ).on( transEndEventName, function() {
								$overlay.off( transEndEventName );
								$body.css( 'overflow-y', 'hidden' );
							} );
						}, 25 );

					} );
				}
				else {
					$body.css( 'overflow-y', 'hidden' );
				}

			} );

			$close.on( 'click', function() {

				$body.css( 'overflow-y', 'auto' );

				var layoutProp = getItemLayoutProp( $item ),
					clipPropFirst = 'rect(' + layoutProp.top + 'px ' + ( layoutProp.left + layoutProp.width ) + 'px ' + ( layoutProp.top + layoutProp.height ) + 'px ' + layoutProp.left + 'px)',
					clipPropLast = 'auto';

				// reset current
				current = -1;

				$overlay.css( {
					clip : supportTransitions ? clipPropFirst : clipPropLast,
					opacity : supportTransitions ? 1 : 0,
					pointerEvents : 'none'
				} );

				if( supportTransitions ) {
					$overlay.on( transEndEventName, function() {

						$overlay.off( transEndEventName );
						setTimeout( function() {
							$overlay.css( 'opacity', 0 ).on( transEndEventName, function() {
								$overlay.off( transEndEventName ).css( { clip : clipPropLast, zIndex: -1 } );
								$item.data( 'isExpanded', false );
							} );
						}, 25 );

					} );
				}
				else {
					$overlay.css( 'z-index', -1 );
					$item.data( 'isExpanded', false );
				}

				return false;

			} );

		} );

		$( window ).on( 'debouncedresize', function() {
			winsize = getWindowSize();
			// todo : cache the current item
			if( current !== -1 ) {
				$items.eq( current ).children( 'div.rb-overlay' ).css( 'clip', 'rect(0px ' + winsize.width + 'px ' +$height + 'px 0px)' );
			}
		} );

	}

	function getItemLayoutProp( $item ) {

		var scrollT = $window.scrollTop(),
			scrollL = $window.scrollLeft(),
			itemOffset = $item.offset();

		return {
			left : itemOffset.left - scrollL,
			top : itemOffset.top - scrollT,
			width : $item.outerWidth(),
			height : $height
		};

	}

	function getWindowSize() {
		$body.css( 'overflow-y', 'hidden' );
		var w = $window.width(), h =  $window.height();
		if( current === -1 ) {
			$body.css( 'overflow-y', 'auto' );
		}
		return { width : w, height : h };
	}

	return { init : init };

})();
	Boxgrid.init();
});