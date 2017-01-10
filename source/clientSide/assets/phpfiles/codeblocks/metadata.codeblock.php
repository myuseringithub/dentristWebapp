<!-- METADATA -->

<link rel="manifest" href="<?php echo WP_HOME; ?>/manifest.json">

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=0.5, initial-scale=0.75, user-scalable=no"> <!-- Bootstrap CSS coded for mobile devices -->

<title><?php wp_title( '|', true, 'right' );	bloginfo( 'name' );	$site_description = get_bloginfo( 'description', 'display' ); if ($site_description && (is_home() || is_front_page())) echo " | $site_description"; ?></title>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="profile" href="http://gmpg.org/xfn/11" />



<!-- Old platforms support -->

<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--[if IE 7]>
  <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome-ie7.css" rel="stylesheet">
<![endif]-->
