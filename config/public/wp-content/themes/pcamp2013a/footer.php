<section id="contact"> <!-- CONTACT -->

				<?php $contact_visible = get_option('wps_active_contact_page');
				if($contact_visible){

					$mail = get_option('wps_contact_mail_footer');
					$blog_name = get_option('wps_general_name');
				?>

			<div id="contact_content">
				<div class="left_contact_content"> <!-- FORM CONTAINER -->

					<?php $leftText = get_option('wps_contact_left_text');
						$rightText = get_option('wps_contact_right_text');
						if($leftText != ""){ echo '<h2>'.$leftText.'</h2>'; }
					?>

				<div id="contact_form">
				  <form name="contact" method="POST" action="">
				      <input type="text" name="name" id="name" size="30" value="" class="text-input" placeholder="Name *" /><br>

				      <input type="text" name="email" id="email" size="30" value="" class="text-input" placeholder="E-mail *"/><br>

				      <textarea name="message" id="message" class="text-input" cols="" rows="5" placeholder="Message"></textarea><br>

				      <input type="hidden" id="mailTo" name="mailTo" value="<?php echo $mail; ?>" />
				      <input type="hidden" id="blog_name" name="blog_name" value="<?php echo $blog_name; ?>" />

				      <input type="submit" name="submit" class="button_footer" id="submit_btn" value="Send" />
				  </form>
				</div>


			</div> <!-- END FORM CONTAINER -->
				<div class="right_contact_content">

					<?php if($rightText != ""){ echo '<h2>'.$rightText.'</h2>'; } ?>

					<?php
						$mapchoice = get_option('wps_map_choice');
						if($mapchoice == 'gmap'){
							$mapaddress = get_option('wps_contact_map_address');
							echo '<div id="map"><iframe width="" height="" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q='.$mapaddress.'&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed&amp;iwloc=near"></iframe></div>';
						} else if($mapchoice == 'photo'){
							$mapphoto = get_option('wps_contact_map_photo');
							echo '<div id="map" style="background-image: url('.$mapphoto.');"></div>';
						}
					?>

					<!-- BACKGROUND MAP

					END BACKGROUND MAP -->
				</div>
				<div class="cb"></div>
			</div>
				<?php } ?>


		<div id="contact_social"> <!-- SOCIAL LINKS -->
			<table><tr>
				<?php
					$facebook = get_option('wps_general_facebook');
					$twitter = get_option('wps_general_twitter');
					$gplus = get_option('wps_general_gplus');
					$dribbble = get_option('wps_general_dribbble');
					$flickr = get_option('wps_general_flickr');
					$instagram = get_option('wps_general_instagram');
					$skype = get_option('wps_general_skype');
					$github = get_option('wps_general_github');
					$vimeo = get_option('wps_general_vimeo');
					$youtube = get_option('wps_general_youtube');

					if(!empty($facebook)){ echo '<td><a href="'.$facebook.'" target="blank"><div id="contact_social_facebook"></div></a></td>'; }
					if(!empty($twitter)){ echo '<td><a href="'.$twitter.'" target="blank"><div id="contact_social_twitter"></div></a></td>'; }
					if(!empty($gplus)){ echo '<td><a href="'.$gplus.'" target="blank"><div id="contact_social_gplus"></div></a></td>'; }
					if(!empty($dribbble)){ echo '<td><a href="'.$dribbble.'" target="blank"><div id="contact_social_dribbble"></div></a></td>'; }
					if(!empty($flickr)){ echo '<td><a href="'.$flickr.'" target="blank"><div id="contact_social_flickr"></div></a></td>'; }
					if(!empty($instagram)){ echo '<td><a href="'.$instagram.'" target="blank"><div id="contact_social_instagram"></div></a></td>'; }
					if(!empty($skype)){ echo '<td><a href="'.$skype.'" target="blank"><div id="contact_social_skype"></div></a></td>'; }
					if(!empty($github)){ echo '<td><a href="'.$github.'" target="blank"><div id="contact_social_git"></div></a></td>'; }
					if(!empty($vimeo)){ echo '<td><a href="'.$vimeo.'" target="blank"><div id="contact_social_vimeo"></div></a></td>'; }
					if(!empty($youtube)){ echo '<td><a href="'.$youtube.'" target="blank"><div id="contact_social_youtube"></div></a></td>'; }
				?>
			</tr></table>
		</div> <!-- END SOCIAL LINKS -->

		<div id="footer"> <!-- FOOTER -->
			<p>ProductCamp Nashville</p>
		</div>

</section> <!-- END CONTACT -->

<?php $googleanalytics = get_option('wps_general_google_analytics');
if($googleanalytics){
	echo $googleanalytics;
} ?>

<?php wp_footer(); ?>

<script type="text/javascript">
jQuery(function($) {
    function setAspectRatio() {
      jQuery('.header_video iframe').each(function() {
        jQuery(this).css('height',jQuery(this).width()*9/16);
		$wdH = -(parseInt($(window).height()) * 0.15);
		/*$(this).css('margin-top', $wdH);*/
      });
    }

    setAspectRatio();
    jQuery(window).resize(setAspectRatio);
});
jQuery(function($){
	$('#text_part_content p').first().css('margin-top', 0);
})
</script>

</body>
</html>