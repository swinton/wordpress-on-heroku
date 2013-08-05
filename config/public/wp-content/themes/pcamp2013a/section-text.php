<?php 
$number_text_page = get_option('wps_number_text_page');
global $idTextPage;

	?>

<section class="container" style="background-color:<?php echo get_option('wps_text_part_'.$idTextPage.'_bg_color'); ?>"> <!-- BOXED CONTAINER -->

	<section id="text_part_<?php echo $idTextPage; ?>" class="text_part cat"> <!-- THE THEME -->
		<?php 
			$titleTextPage = get_option('wps_title_text_page_'.$idTextPage);
			$titleIntroText = get_option('wps_title_intro_text_'.$idTextPage);
			$titleContentText = get_option('wps_title_content_text_'.$idTextPage);
			$subtitleContentText = get_option('wps_subtitle_content_text_'.$idTextPage);
		?>

		<?php if($titleTextPage != ""){ echo '<div class="title">'.$titleTextPage.'</div>'; }
				if($titleIntroText != ""){ echo '<h1>'.$titleIntroText.'</h1>'; }
				if($titleContentText != ""){ echo '<h3>'.$titleContentText.'</h3>'; }
				if($subtitleContentText != ""){ echo '<div class= "sub_title">'.$subtitleContentText.'</div>'; }
		?>

		<div class="text_part_content <?php echo get_option('wps_number_cols_text_'.$idTextPage); ?>">
			<?php 
				$id = get_option('wps_text_part_'.$idTextPage.'_name_page'); 
				$post = get_page($id); 
				$content = apply_filters('the_content', $post->post_content); 
				echo $content;
			?>
		</div>

		<?php 
			$link = get_option('wps_link_content_text_'.$idTextPage);
			$linkText = get_option('wps_link_text_content_text_'.$idTextPage);

			if($link != "" && $linkText != ""){ echo '<div class="contact_text"><p><a class="text_contact" href="'.$link.'" target="blank">'.$linkText.'</a></p></div>'; }
		?>

	</section> <!-- END THE THEME -->

</section> <!-- END BOXED CONTAINER -->