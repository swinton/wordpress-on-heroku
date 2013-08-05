<?php get_header(); ?> <!-- ouvrir header,php -->

		<nav id="nav" class="floatable news"> <!-- NAVIGATION -->
			<div id="menu">
				<table>
					<tr>
						<td><a href="<?php bloginfo('siteurl'); ?>"><div id="back_onepage" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/arrow.png')"></div></a></td>
						<td><a href="#news" id="menu_news" class="active">the<br><strong>ARCHIVES</strong></a></td>
					</tr>
				</table>
			</div>

		</nav> <!-- END NAVIGATION -->
		<div id="top">

				<div id="top_content">
				
					<div id="logo_news">
						<a href="#">K.</a> <!-- LOGO -->
					</div>

					<div id="current_menu_phone" class="news_menu_phone">the<br><strong>ARCHIVES</strong></div>
					
					<a href="<?php bloginfo('siteurl'); ?>"><img id="menu_phone_control" class="phone_back_onepage" src="<?php echo get_template_directory_uri(); ?>/images/arrow.png"></a>
				</div>

				<div id="menu_phone">
					
				</div>

			</div>


<section id="container"> <!-- BOXED CONTAINER -->

	<section id="news" class="cat"> <!-- OUR BLOG -->


<div class="title">
	<?php echo get_option('wps_title_blog_page'); ?>
</div>
<h1>
	<?php echo get_option('wps_title_intro_6'); ?>
</h1>

<div id="blog_content"> <!-- THE NEWS -->

		<?php 
		$number_posts = get_option('wps_blog_number_posts');
		$order_by = get_option('wps_blog_select_order_by');
		$order = get_option('wps_blog_select_order');
		$paged = get_query_var('paged');
		if(have_posts()): while(have_posts()): the_post(); ?>
			<?php 
			$categories = get_the_category();
			foreach($categories as $category){
			   $name_cat = $category->slug; //category name
			}
			$icon = get_option('wps_category_'.$name_cat.'_icon');
			$icon_2x = get_option('wps_category_'.$name_cat.'_icon_2x');
			?>

			<div class='news'>
				<div class='icon'><?php echo "<img src='".$icon."' data='".$icon_2x."'>" ?></div>
				<div id='news_<?php the_ID(); ?>' class='content_news'>
					<div class='media'><?php the_post_thumbnail(); ?></div>
					<div class='top'>
						<div class='title_news'><h2><?php the_title(); ?></h2></div>
						<div class='news_share'>
							<div class='likes'><p><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></p></div>
							<div class='nb_comments'><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></div>
						</div>
					</div>
					<div class="cb"></div>
					<div class='meta_news'>
						<div class='news_by'><img src='<?php echo get_template_directory_uri(); ?>/images/user.png' alt='user'> by <?php the_author(); ?></div>
						<div class='news_date'><img src='<?php echo get_template_directory_uri(); ?>/images/calendar.png' alt='calendar'><?php the_time('l, d F'); ?></div>
					</div>
					<div class="cb"></div>
					<div class='news_text'>
						<?php
							$content = get_extended($post->post_content);
							$first_content = apply_filters('the_content', $content['main']);
							$second_content = apply_filters('the_content', $content['extended']);

							echo $first_content;
							echo $second_content;
						?><hr><?php $withcomments = "1";comments_template(); ?>
					</div>

				</div>
			</div>
					
		
		<?php endwhile; endif; ?>

		<?php next_posts_link('&laquo; Older') ?>
		<?php previous_posts_link('More Recent &raquo;') ?>
		

</div>
		<?php get_sidebar(); ?>

	</section> <!-- END OUR BLOG -->

</section> <!-- END BOXED CONTAINER -->


<div class="cb"></div>

<?php get_footer(); ?>

</body>
</html>