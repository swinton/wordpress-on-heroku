<div id="sidebar"> <!-- THE SIDEBAR -->
					
	<ul>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	 
	<?php the_tags('Tagged with: ',' , ','<br />'); ?>
	<?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=page %'); ?>

	<?php if (has_nav_menu('sidebar_navigation')){
		    wp_nav_menu(
		        array(
		            'container'         => 'nav',
		            'container_class'   => 'sidebar-menu',
		            'theme_location'    => 'sidebar_navigation'
		        )
		    );
		} else {
		    // En cas d'absence de menu
		} 
	?>
	 
	<?php endif; ?>
	</ul>

</div>