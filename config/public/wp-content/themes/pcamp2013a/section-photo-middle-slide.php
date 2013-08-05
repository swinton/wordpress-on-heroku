<?php $photos_slide = get_option('wps_active_slider_photos');
if($photos_slide){
?>

<div id="trans-slides_contain"> <!-- PHOTO SLIDER -->

	<?php 
		$number_slides = get_option('wps_number_slides_photo');
		if($number_slides == 1){
			echo "<div class='flexslider1'>";
		}else{
			echo "<div class='flexslider'>";
		}
	?>
	  <ul class="slides">
	  	<?php
		$blog_title = get_template_directory_uri();


		for($i=1; $i<=$number_slides; ++$i){
			echo "
				<li id='flexslide".$i."' class='flexslides' style='background-image: url("; 
					echo get_option('wps_photo_slide_'.$i.''); 
					echo ")'>
					<h1 class='animated-slide fadeInUpBig'>";
							echo get_option('wps_title_photo_slide'.$i.'');
					echo "</h1>
			    </li>
			";
		}
		?>
	  </ul>
	</div>

</div> <!-- END PHOTO SLIDER -->

<?php } ?>