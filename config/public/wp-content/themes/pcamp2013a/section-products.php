<section class="container"> <!-- BOXED CONTAINER -->

	<section id="products" class="cat"> <!-- OUR PRODUCTS -->

		<div class="products_top">
		
			<div class="title">
				<?php echo get_option('wps_title_carousel_page'); ?>
			</div>
			<h1>
				<?php echo get_option('wps_title_intro_3'); ?>
			</h1>

			<table id="buttons_products"> <!-- TABS -->
				<tr>
					<?php
						$number_tabs_products = get_option('wps_number_tabs_products');
						for($i=1; $i<=$number_tabs_products; ++$i){
							echo '<td><div id=button_products_'.$i.' class="button_products">'.get_option('wps_tab_'.$i.'_products').'</td>';
						}
					?>
				</tr>
			</table> <!-- END TABS -->

		</div>

			<?php
				$blog_title = get_template_directory_uri();
				for($i=1; $i<=$number_tabs_products; ++$i){
					echo '<div id="showcase_'.$i.'" class="'.get_option('wps_presentation_product_'.$i.'').' showcase">';
						$number_screenshots = get_option('wps_number_screenshots_tab_'.$i.'_products');
					for($j=1; $j<=$number_screenshots; ++$j){
						echo '<img class="img_products img_products_'.$i.'" id="product_'.$i.'_'.$j.'" src="'.get_option('wps_screenshot_'.$j.'_tab_'.$i.'_product').'" alt="Screenshot '.$j.'">';
					}
					echo '</div>
					<div id="presentation_product_'.$i.'" class="'.get_option('wps_presentation_product_'.$i.'').' product">
						<img src="'.$blog_title.'/images';
					echo '/'.get_option('wps_presentation_product_'.$i.'').'.png" alt="product">
					  </div>';
			}
		?>

	</section> <!-- END OUR PRODUCTS -->

</section> <!-- END BOXED CONTAINER -->

<div id="container_description_showcase"> <!-- DESCRIPTION SHOWCASE -->

	<div id="top_description_showcase"> <!-- NAVIGATION BAR -->

		<table id="nav_showcase">
			<tr>
				<td><div id="nav_left_showcase"></div></td> <!-- SLIDE LEFT -->
				 <!-- PAGINATION -->
				 <?php
				 for($j=1; $j<=$number_tabs_products; ++$j){
				 	$number_screenshots = get_option('wps_number_screenshots_tab_'.$j.'_products');
				 	for($k=1; $k<=$number_screenshots; ++$k){
				 		echo '<td class="all_dots dots_'.$j.'"><div class="pagination_showcase" id="dot_product_'.$j.'_'.$k.'"></div></td>';
				 	}
				 }
				 ?>
				 <!-- END PAGINATION -->
				<td><div id="nav_right_showcase"></div></td> <!-- SLIDE RIGHT -->
			</tr>
		</table>

	</div> <!-- END NAVIGATION BAR -->

	<div id="description_showcase"> <!-- TEXT DESCRIPTION -->

			<?php
				for($j=1; $j<=$number_tabs_products; ++$j){
					echo '<h2 id="title_showcase_'.$j.'" class="title_showcase">';
					echo get_option('wps_tab_products_'.$j.'_title'); 
					echo '</h2>
					<div id="showcase_desc_'.$j.'" class="showcase_desc">
						<p>';
							echo get_option('wps_tab_products_'.$j.'_description');
					echo '</p>
					</div>
					<div id="check_out_showcase_'.$j.'" class="check_out_showcase"><a href="';
							echo get_option('wps_tab_products_'.$j.'_link');
					echo '" target="blank">';
					echo get_option('wps_link_text_carousel');
					echo '</a></div>
					';
				}
			?>	
		<div class="cb"></div>

	</div> <!-- END TEXT DESCRIPTION -->

</div> <!-- END DESCRIPTION SHOWCASE -->