<?php get_header('start'); ?>
<?php get_header('end'); ?>

<?php include(\SZN\App::$scripts_directory_path . '/js' . '/facebook-javascript-sdk.js.php');  ?>

<?php \SZN\App::createRouteDocument(__FILE__); ?>

<?php get_footer('end'); ?>
