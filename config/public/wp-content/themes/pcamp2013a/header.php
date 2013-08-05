<!DOCTYPE html>

    <html <?php language_attributes(); ?>>

    <head>

	<title><?php echo get_option('wps_general_name') ?> &raquo; <?php echo get_option('wps_general_description') ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<meta name = "viewport" content = "width=device-width, minimum-scale=0.57, maximum-scale=0.57, user-scalable=0">

    <link rel="icon" href="<?php echo get_option('wps_general_favicon') ?>" data="<?php echo get_option('wps_general_favicon_@2x') ?>" />

	<link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /><?php wp_head(); ?>

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>


