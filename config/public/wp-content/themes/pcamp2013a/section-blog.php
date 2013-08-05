<section class="container"> <!-- BOXED CONTAINER -->

	<section id="news" class="cat"> <!-- OUR BLOG -->

		<?php
			$titleBlogPage = get_option('wps_title_blog_page');
			$titleIntro6 = get_option('wps_title_intro_6');
			if($titleBlogPage != ""){ echo '<div class="title">'.$titleBlogPage.'</div>'; }
			if($titleIntro6 != ""){ echo '<h1>'.$titleIntro6.'</h1>'; }
		?>

		<div id="blog_content"> <!-- THE NEWS -->

			<?php 
			$number_posts = get_option('wps_blog_number_posts');
			$order_by = get_option('wps_blog_select_order_by');
			$order = get_option('wps_blog_select_order');
			$postClass = get_post_class();
			if(have_posts()): query_posts(array ( 'orderby' => $order_by, 'order' => $order, 'posts_per_page' => $number_posts )); while(have_posts()): the_post(); ?>
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
							<div class="news_text_content">
							<?php
								$content = get_extended($post->post_content);
								$first_content = apply_filters('the_content', $content['main']);
								$second_content = apply_filters('the_content', $content['extended']);

								echo $first_content;
							?>
							</div>
							<div class='more'>
								<p><?php echo $second_content ?>
							</p><hr>
								<div class='comments index'><?php global $withcomments; $withcomments = 1;comments_template( '', true ); ?>
									<div class='cb'></div>
								</div>
							</div>
							<p></p>
						</div>

					</div>
				</div>
						
			
			<?php endwhile; endif; ?>

			<div class="cb"></div>
			<?php $archives = get_option('wps_blog_name_archives'); ?>
			<a href="<?php echo $archives; ?>"><div id="view_all_posts"><p><?php echo get_option('wps_link_text_blog'); ?></p></div></a> <!-- VIEW ALL POSTS BUTTON -->

		</div>

		<?php get_template_part('sidebar') ?> <!-- INCLUDE SIDEBAR -->

		<div class="cb"></div>

	</section> <!-- END OUR BLOG -->

</section> <!-- END BOXED CONTAINER -->