 <?php /*if ( ! is_user_logged_in() ) { wp_die("Undergoing maintenance... Be back soon :)"); }*/ ?>

<?php get_header(); ?> <!-- ouvrir header,php -->

<?php $home_visible = get_option('wps_active_slider_header');
if($home_visible){ ?>

<header id="header"> <!-- HEADER -->

	<h1 id="pcamp-logo"><a href="<?php echo site_url(); ?>">ProductCamp Nashville</a></h1>

	<?php
	$blog_title = get_template_directory_uri();

	$number_slides = get_option('wps_number_slides');

	if($number_slides >= 2){

	echo '<div id="slides">';

	} else {
		echo '<div id="slide">';
	}

		for($i=1; $i<=$number_slides; ++$i){
			$videoId = get_option('wps_header_video_id_slide_'.$i);
			$videoSource = get_option('wps_header_video_source_slide_'.$i);
			$imgUrl = get_option('wps_header_slide_'.$i);
			$autoplayVideo = get_option('wps_header_slide_video_autoplay');
			if($autoplayVideo){$apVideo = 1;}else{$apVideo = 0;}

			if($videoId != "" && $imgUrl != ""){
				echo "<div id='header".$i."' class='header_slides'>
						<div id='header_img_".$i."' class='header_img' style='background-image: url(".$imgUrl.")'><span id='header_play_button_".$i."' class='header_play_button animated fadeIn'><img class='header_play_img' src='".$blog_title."/images/play.png'></span></div>
						<div id='header_video_".$i."' class='header_video'><iframe src='".$videoSource."".$videoId."?autoplay=0&controls=0&showinfo=0&rel=0&wmode=opaque' frameborder='0' allowfullscreen></iframe></div>";
			}else if($videoId != "" && $imgUrl == ""){
				echo "<div id='header".$i."' class='header_slides'>
						<div class='header_video'><iframe src='".$videoSource."".$videoId."?autoplay=".$apVideo."&controls=0&showinfo=0&rel=0&wmode=opaque' frameborder='0' allowfullscreen></iframe></div>";
			}else{
				echo "
				<div id='header".$i."' class='header_slides'>";
			}
			echo "
					<div class='text_header_contain'>
						<div class='text_header'>
							<h1>";
							echo get_option('wps_title_header_slide'.$i.'');
							echo "</h1>
							<p>";
							echo get_option('wps_description_header_slide'.$i.'');
							echo"</p>
						</div>
					</div>
			    </div>
			";
		}
		?>
	</div> <!-- END SLIDE HEADER -->

</header> <!-- END HEADER -->

<?php } ?>

<div id="top"> <!-- TOP BAR -->

	<div id="top_content">

		<!-- TOP SOCIAL -->
		<?php
			$twitter_top = get_option('wps_general_twitter_top');
			$facebook_name = get_option('wps_general_facebook_name');
			$facebook_id = get_option('wps_general_facebook_id');
		?>
		<?php $contact_visible = get_option('wps_active_contact_page');
				if($contact_visible){ ?>
		<a href="#contact"><div id="top_mail"></div></a>
		<?php } ?>
		<?php if($twitter_top != ""){ echo '<a href="https://twitter.com/'.$twitter_top.'" target="blank"><div id="top_twitter"><div id="followers"></div></div></a>'; }
			if($facebook_name != "" && $facebook_id != ""){ echo '<a href="https://www.facebook.com/pages/'.$facebook_name.'/'.$facebook_id.'" target="blank"><div id="top_facebook"><div id="fans"></div></div></a>'; }
		?>
		<!-- END TOP SOCIAL -->

		<div id="current_menu_phone"><?php echo get_option('wps_header_name_mobile'); ?></div> <!-- CURRENT PAGE FOR TABLET/PHONE STYLE -->

	</div>

	<div id="menu_phone"> <!-- MENU FOR TABLET/PHONE STYLE -->
		<ul>

		</ul>
	</div> <!-- END MENU FOR TABLET PHONE/STYLE -->

</div>

<?php $home_visible = get_option('wps_active_slider_header'); ?>

<?php
	if($home_visible){
		echo '<nav id="nav">';
	} else {
		echo '<nav id="nav" class="floatable">';
	}
?>
	<div id="menu">
		<table>
			<tr>

			</tr>
		</table>

		<?php $contact_visible = get_option('wps_active_contact_page');
				if($contact_visible){ ?>
					<div id="nav_contact"><a id="contact_nav" href="#contact"><img src="<?php echo get_template_directory_uri(); ?>/images/contact.png" alt="contact"></a></div>
		<?php } ?>

	</div>
</nav> <!-- END DESKTOP NAVIGATION --> <!-- END HEADER -->

<?php
$nbCat = get_option('wps_number_text_page') + 7;
for($c=0; $c<=$nbCat; ++$c){
	$pos = 'pos-'.$c;
	$position = get_option($pos);
	if($position == 'Timeline page'){
		$about_visible = get_option('wps_active_timeline_page');
		if($about_visible){
			get_template_part('section','thestory');
		}
	}else if($position == 'Thumbnail page'){
		$team_visible = get_option('wps_active_thumbnail_page');
		if($team_visible){
			get_template_part('section','team');
		}
	}else if($position == "Slider photos"){
		$slider_photos_visible = get_option('wps_active_slider_photos');
		if($slider_photos_visible){
			get_template_part('section','photo-middle-slide');
		}
	}else if($position == 'Carousel page'){
		$products_visible = get_option('wps_active_carousel_page');
		if($products_visible){
			get_template_part('section','products');
		}
	}else if($position == 'Gallery page'){
		$services = get_option('wps_active_gallery_page');
		if($services){
			get_template_part('section','services');
		}
	}else if($position == 'Slider sentences'){
		$slider_sentences_visible = get_option('wps_active_slider_sentences');
		if($slider_sentences_visible){
			get_template_part('section','sentences-middle-slide');
		}
	}else if($position == 'Showcase page'){
		$work = get_option('wps_active_showcase_page');
		if($work){
			get_template_part('section','work');
		}
	}else if($position == 'Blog page'){
		$blog_visible = get_option('wps_active_blog_page');
		if($blog_visible){
			get_template_part('section','blog');
		}
	}
	$nbTextPage = get_option('wps_number_text_page');
	global $idTextPage;
	for($i=1;$i<=$nbTextPage;++$i){
		if($position == 'Text page '.$i){
			$idTextPage = $i;
			$text = get_option('wps_active_text_page');
			if($text){
				get_template_part('section','text');
			}
		}
	}
}

?>

<?php get_footer(); ?>