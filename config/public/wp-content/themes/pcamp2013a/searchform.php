<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
	<div>
		<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="To search type and hit enter" />
	</div>
</form>