<section id="global_work">

	<section id="work" class="cat"> <!-- OUR WORK -->

		<div class="title">
			<?php echo get_option('wps_title_showcase_page'); ?>
		</div>
		<h1>
			<?php echo get_option('wps_title_intro_5'); ?>
		</h1>

		<?php 

			$effect = get_option('wps_effect_work');
			$blog_title = get_template_directory_uri();
			$number_works = get_option('wps_number_works');

			if($effect == 'overlay'){
				echo '<ul id="rb-grid" class="rb-grid clearfix">';
				for($i=1; $i<=$number_works; ++$i){
					echo '<li class="icon-clima-'.$i.'"  style="background-image: url('; 
									echo get_option('wps_work_'.$i.'_directory'); 
									echo ')">
							<div class="hover-work"></div>
							<div class="hover-work-eye"><img src="'.$blog_title.'/images/icon-oeil.png" alt="hover"></div>
							<div class="rb-overlay">
								<span class="rb-close">close</span>
								<div class="rb-fullwork">
									<div><span class="rb-pict"><img src="'.get_option('wps_work_'.$i.'_directory').'"></span></div>
									<div><span class="description"><h2>'.get_option('wps_work_'.$i.'_title').'</h2><p>'.get_option('wps_work_'.$i.'_description').'</p></span></div>
								</div>
							</div>
						</li>';
				}
				echo '</ul>';
			} else if($effect == 'expanding') {
				echo '<div class="superbox">';
				for($i=1; $i<=$number_works; ++$i){
					echo '<div class="superbox-list">
							<div class="hover-expand-work"></div>
							<div class="hover-expand-eye"><img src="'.$blog_title.'/images/icon-oeil.png" alt="hover"></div>
							<img src="'.get_option('wps_work_'.$i.'_thumb_directory').'" data-img="'.get_option('wps_work_'.$i.'_directory').'" data-title="<h2 style=\'color:'.get_option('wps_showcase_title_color').'\'>'.get_option('wps_work_'.$i.'_title').'</h2><p style=\'color:'.get_option('wps_showcase_text_color').'\'>'.get_option('wps_work_'.$i.'_description').'</p>" alt="" class="superbox-img">
						</div>';
				}
				echo '<div class="superbox-float"></div>
				</div>';
			}

		?>

	</section> <!-- END OUR WORK -->
	<div class="cb"></div>

</section>