<?php

$blog_title =  get_template_directory();

/* Include back-end */
if(is_admin()){ include $blog_title.'/wps-panel/wps-panel.php'; }
 
/* Include front-end */
if(!is_admin()){ include $blog_title.'/wps-panel/wps-panel-front.php'; }

add_theme_support( 'post-thumbnails');
add_theme_support( 'automatic-feed-links' );

register_nav_menu( 'sidebar_navigation', 'Navigation secondaire' );


function wpk_add_editor_styles() {
    add_editor_style( '' );
}
add_action( 'init', 'wpk_add_editor_styles' );


/* ENQUEUE STYLESHEETS */

add_action('wp_enqueue_scripts', 'wpk_scripts_method');
function wpk_scripts_method() {

/* PHP DATA */

$data = array(
	'blog_title'		=>	get_template_directory_uri(),
	'transition_header' =>	get_option('wps_interval_header_slide'),
	'navigation_header'	=>	get_option('wps_arrow_header_slide'),
	'auto_header'		=>	get_option('wps_auto_header_slide'),
	'auto_photos'		=>	get_option('wps_auto_photo_slide'),
	'random_photos'		=>	get_option('wps_random_photo_slide'),
	'transition_photo' 	=>	get_option('wps_interval_photo_slide'),
	'transition_sentences' =>	get_option('wps_interval_sentences_slide'),
	'auto_sentences'	=>	get_option('wps_auto_sentences_slide'),

);

$data_color = array(
	'text_color'		=>	get_option('wps_main_text_color'),
	'text_size'			=>	get_option('wps_main_text_size'),
	'text_stand_font'	=>	get_option('wps_select_stand_font_text'),
	'text_google_font'	=>	get_option('wps_select_google_font_text'),
	'h1_color'			=>	get_option('wps_main_h1_color'),
	'h1_size'			=>	get_option('wps_main_h1_size'),
	'h1_stand_font'		=>	get_option('wps_select_stand_font_h1'),
	'h1_google_font'	=>	get_option('wps_select_google_font_h1'),
	'h2_color'			=>	get_option('wps_main_h2_color'),
	'h2_size'			=>	get_option('wps_main_h2_size'),
	'h2_stand_font'		=>	get_option('wps_select_stand_font_h2'),
	'h2_google_font'	=>	get_option('wps_select_google_font_h2'),
	'h3_color'			=>	get_option('wps_main_h3_color'),
	'h3_size'			=>	get_option('wps_main_h3_size'),
	'h3_stand_font'		=>	get_option('wps_select_stand_font_h3'),
	'h3_google_font'	=>	get_option('wps_select_google_font_h3'),
	'header_h1_color'			=>	get_option('wps_header_h1_color'),
	'header_h1_size'			=>	get_option('wps_header_h1_size'),
	'header_h1_stand_font'		=>	get_option('wps_select_stand_font_header_h1'),
	'header_h1_google_font'		=>	get_option('wps_select_google_font_header_h1'),
	'header_text_color'				=>	get_option('wps_header_text_color'),
	'header_text_size'				=>	get_option('wps_header_text_size'),
	'header_text_stand_font'		=>	get_option('wps_select_stand_font_header_text'),
	'header_text_google_font'		=>	get_option('wps_select_google_font_header_text'),
	'photo_slide_text_color'		=>	get_option('wps_photo_slide_text_color'),
	'sentence_slide_text_color'		=>	get_option('wps_sentence_slide_text_color'),
	'carousel_title_color'		=>	get_option('wps_carousel_title_color'),
	'carousel_text_color'		=>	get_option('wps_carousel_text_color'),
	'showcase_title_color'		=>	get_option('wps_showcase_title_color'),
	'showcase_text_color'		=>	get_option('wps_showcase_text_color'),
	'first_color'		=>	get_option('wps_first_color'),
	'second_color'		=>	get_option('wps_second_color'),
	'third_color'		=>	get_option('wps_third_color'),
	'timeline_color'	=>	get_option('wps_timeline_bg_color'),
	'thumbnail_color'	=>	get_option('wps_thumbnail_bg_color'),
	'carousel_color'	=>	get_option('wps_carousel_bg_color'),
	'gallery_color'		=>	get_option('wps_gallery_bg_color'),
	'showcase_color'	=>	get_option('wps_showcase_bg_color'),
	'news_color'		=>	get_option('wps_news_bg_color'),
	'cols_thumbnail'	=>	get_option('wps_number_cols_thumbnail'),
	'cols_showcase'		=>	get_option('wps_number_cols_showcase'),
	'top_bar_height'	=>	get_option('wps_general_top_bar_height'),
	'gallery_height_pict'	=> get_option('wps_gallery_height_pict')
);

$data_work_color = array(
	'third_color'		=>	get_option('wps_third_color')
);

$data_init = array(
	'facebookname'		=>	get_option('wps_general_facebook_name'),
	'facebookid'		=>	get_option('wps_general_facebook_id'),
	'twitter'		=>	get_option('wps_general_twitter_top')
);

wp_enqueue_style('style', get_template_directory_uri().'/style.css');
wp_enqueue_style('responsive', get_template_directory_uri().'/responsive.css'); 
wp_enqueue_style('animate', get_template_directory_uri().'/css/animate.css'); 
wp_enqueue_style('retina', get_template_directory_uri().'/css/retina.css'); 
if (is_front_page()){ 
wp_enqueue_style('sliders', get_template_directory_uri().'/css/sliders.css');    
wp_enqueue_style('work', get_template_directory_uri().'/css/work.css'); 
}


/* ENQUEUE SCRIPTS */

wp_enqueue_script('modernizr', get_template_directory_uri().'/js/modernizr-slide.js');
wp_enqueue_script('jquery');
wp_enqueue_script('init', get_template_directory_uri().'/js/init.js');
wp_enqueue_script('scroll_nav', get_template_directory_uri().'/js/scroll_nav.js');
wp_enqueue_script('footer', get_template_directory_uri().'/js/footer.js');
wp_enqueue_script('touch', get_template_directory_uri().'/js/touch.js');
wp_enqueue_script('twitter', 'http://twitterjs.googlecode.com/svn/trunk/src/twitter.min.js');
if (is_front_page()){ 
wp_enqueue_script('sliders', get_template_directory_uri().'/js/sliders.js');
wp_enqueue_script('work', get_template_directory_uri().'/js/work.js');
wp_enqueue_script('showcasecarousel', get_template_directory_uri().'/js/showcase.carousel.js');
wp_enqueue_script('my_script', get_template_directory_uri().'/js/slider_options.js');
}
wp_enqueue_script('choice_color', get_template_directory_uri().'/js/choice_color.js');

wp_localize_script('my_script', 'php_data', $data);
wp_localize_script('choice_color', 'php_data_color', $data_color);
wp_localize_script('work', 'php_expand_color', $data_work_color);
wp_localize_script('init', 'php_init', $data_init);
}

/**
 * Enqueue Google fonts.
 */

function wpk_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    $googlefonth1 = get_option('wps_select_google_font_h1');
    $googlefonth2 = get_option('wps_select_google_font_h2');
    $googlefonth3 = get_option('wps_select_google_font_h3');
    $googlefonth1header = get_option('wps_select_google_font_header_h1');
    $googlefonttextheader = get_option('wps_select_google_font_header_text');
    $googlefonttext = get_option('wps_select_google_font_text');

    if($googlefonth1 != "0"){wp_enqueue_style( 'wpk-gfh1', "$protocol://fonts.googleapis.com/css?family=$googlefonth1:400,300,600" );}
    if($googlefonth2 != "0" && $googlefonth2 != $googlefonth1){
    	wp_enqueue_style( 'wpk-gfh2', "$protocol://fonts.googleapis.com/css?family=$googlefonth2:400,300,600" );
    }
    if($googlefonth3 != "0" && $googlefonth3 != $googlefonth2 && $googlefonth3 != $googlefonth1){
    	wp_enqueue_style( 'wpk-gfh3', "$protocol://fonts.googleapis.com/css?family=$googlefonth3:400,300,600" );
    }
    if($googlefonth1header != "0" && $googlefonth1header != $googlefonth3 && $googlefonth1header != $googlefonth2 && $googlefonth1header != $googlefonth1){
    	wp_enqueue_style( 'wpk-gfh1header', "$protocol://fonts.googleapis.com/css?family=$googlefonth1header:400,300,600" );
    }
    if($googlefonttextheader != "0" && $googlefonttextheader != $googlefonth3 && $googlefonttextheader != $googlefonth2 && $googlefonttextheader != $googlefonth1 && $googlefonttextheader != $googlefonth1header){
    	wp_enqueue_style( 'wpk-gftextheader', "$protocol://fonts.googleapis.com/css?family=$googlefonttextheader:400,300,600" );
    }
    if($googlefonttext != "0" && $googlefonttext != $googlefonth3 && $googlefonttext != $googlefonth2 && $googlefonttext != $googlefonth1 && $googlefonttext != $googlefonth1header && $googlefonttext != $googlefonttextheader){
    	wp_enqueue_style( 'wpk-gftext', "$protocol://fonts.googleapis.com/css?family=$googlefonttext:400,300,600" );
    }
    
}
add_action( 'wp_enqueue_scripts', 'wpk_fonts' );

add_filter('show_admin_bar', '__return_false');

if ( function_exists('register_sidebar') )
register_sidebar(array(
	'before_title' => '<h3>',
	'after_title' => '</h3>',
)); 

if ( ! isset( $content_width ) ) $content_width = 960;

function wpk_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = '<div';
			$add_below = 'comment';
		} else {
			$tag = '<div';
			$add_below = 'div-comment';
		}
?>
		<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>" class="comment">
		<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="pseudo comment-author vcard">
		<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<?php printf(__('%s'), get_comment_author_link()) ?>
		</div>
<?php if ($comment->comment_approved == '0') : ?>
		<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
		<br />
<?php endif; ?>

		<?php comment_text() ?>
		
		<?php if ( 'div' != $args['style'] ) : ?>
		</div></div>
		<?php endif; ?>
<?php
        }

?>