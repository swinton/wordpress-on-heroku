<?php $sentences_slide = get_option('wps_active_slider_sentences');
if($sentences_slide){ ?>

<div id="da-slider" class="da-slider"> <!-- SENTENCE SLIDER -->
	<?php 
		$number_slides = get_option('wps_number_slides_sentences');
		for($i=1; $i<=$number_slides; ++$i){
			$bgColor = get_option('wps_sentence_slide_'.$i.'_bg_color');
			$bgImage = get_option('wps_sentence_slide_'.$i.'_bg_image');
			echo '<div class="da-slide" style="background-color:'.$bgColor.';background-image:url('.$bgImage.');">
					<div class="content-slides">
						<div class="quote-slide"></div>
						<h1>'.get_option('wps_quote_slide_'.$i.'').'</h1>
						<p>'.get_option('wps_author_slide_'.$i.'').'</p>
					</div>
				</div>';
		}
	?>
	<div class="da-arrows">
		<span class="da-arrows-prev"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-slide_prev.png"></span>
		<span class="da-arrows-next"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-slide_next.png"></span>
	</div>
</div>

<?php } ?>