<section class="container"> <!-- BOXED CONTAINER -->

	<section id="services" class="cat"> <!-- OUR SERVICES -->

		<div class="title">
			<?php echo get_option('wps_title_gallery_page'); ?>
		</div>
		<h1>
			<?php echo get_option('wps_title_intro_4'); ?>
		</h1>

			
		<?php
		$number_services = get_option('wps_number_services');
		$number_services_total = get_option('wps_number_services');
		$j = $number_services_total - $number_services + 1;
		while($number_services > 0){
			if($number_services >= 3){
				echo '<table class="services_table"><tr>';
				for($i=1; $i<=3; ++$i){
					$iconNormal = get_option('wps_service_'.$j.'_icon');
					if(get_option('wps_service_'.$j.'_icon_2x') != ""){$icon2x = get_option('wps_service_'.$j.'_icon_2x');}else{$icon2x = get_option('wps_service_'.$j.'_icon');}
					echo "
						<td>
							<div class='all_services'><img src='".$iconNormal."' data='".$icon2x."'></div>
							<h3>";echo get_option('wps_service_'.$j.'_title');echo "</h3>
							<p class='services_description'>";
							echo get_option('wps_service_'.$j.'_description');
							echo "</p>
						</td>
					";
					--$number_services;
					++$j;
				}
				echo '</tr></table>';
			} else if($number_services == 2){
				echo '<table class="services_table services_table_2cols"><tr>';
				for($i=1; $i<=2; ++$i){
					$iconNormal = get_option('wps_service_'.$j.'_icon');
					if(get_option('wps_service_'.$j.'_icon_2x') != ""){$icon2x = get_option('wps_service_'.$j.'_icon_2x');}else{$icon2x = get_option('wps_service_'.$j.'_icon');}
				echo "
					<td>
						<div class='all_services'><img src='".$iconNormal."' data='".$icon2x."'></div>
							<h3>";echo get_option('wps_service_'.$j.'_title');echo "</h3>
						<p class='services_description'>";
						echo get_option('wps_service_'.$j.'_description');
						echo "</p>
					</td>
				";
				--$number_services;
				++$j;
				}
				echo '</tr></table>';
			} else if($number_services == 1){
					$iconNormal = get_option('wps_service_'.$j.'_icon');
					if(get_option('wps_service_'.$j.'_icon_2x') != ""){$icon2x = get_option('wps_service_'.$j.'_icon_2x');}else{$icon2x = get_option('wps_service_'.$j.'_icon');}
				echo '<table class="services_table services_table_1col"><tr>';
				echo "
					<td>
						<div class='all_services'><img src='".$iconNormal."' data='".$icon2x."'></div>
						<h3>";echo get_option('wps_service_'.$j.'_title');echo "</h3>
						<p class='services_description'>";
						echo get_option('wps_service_'.$j.'_description');
						echo "</p>
					</td>
				";
				--$number_services;
				++$j;
				echo '</tr></table>';
			}
		}

		
		?>

	</section> <!-- END OUR SERVICES -->

</section> <!-- END BOXED CONTAINER -->