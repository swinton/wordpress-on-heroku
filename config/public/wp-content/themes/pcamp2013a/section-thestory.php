<section class="container"> <!-- BOXED CONTAINER -->

	<section id="story" class="cat">  <!-- THE STORY -->

		<div class="title">
			<?php echo get_option('wps_title_timeline_page'); ?>
		</div>
		<h1>
			<?php echo get_option('wps_title_intro_1'); ?>
		</h1>
		<p>
			<?php echo get_option('wps_intro_1'); ?>
		</p>

		<section class="main-timeline">
			<ul class="timeline">
				<?php 
				$number_events = get_option('wps_number_events');
				for($i=1; $i<=$number_events; ++$i){
			  	 echo '<li class="event">
			  			<label><img src="'.get_bloginfo("template_directory").'/images/bullet.png" alt="bullet"></label>
			  			<div class="thumb"><span>';
				  			echo get_option('wps_event_'.$i.'_month');
				  			echo ' /<br><strong>';
				  			echo get_option('wps_event_'.$i.'_year');
				  		echo '</strong></span></div>
						<div class="content-perspective">
							<div class="content">
								<div class="content-inner"> 
							  	 <h2>';
							  	 echo get_option('wps_event_'.$i.'_title');
							  	echo '</h2> 
							  	 <p>';
							  	  echo get_option('wps_event_'.$i.'_description');
							  	echo '</p>
							  	</div>
							</div>
						</div>
					</li> ';
				} ?>
			</ul>
		</section>

	</section> <!-- END THE STORY -->

</section> <!-- END BOXED CONTAINER -->