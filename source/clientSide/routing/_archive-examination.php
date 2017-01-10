<?php get_header('start'); ?>

<?php include ( \SZN\App::getFileDirectoryPath('codeblocks','setup-post-data.codeblock.php') ); ?>

<?php get_header('end'); ?>

<?php include(\SZN\App::$scripts_directory_path . '/js' . '/facebook-javascript-sdk.js.php');  ?>

<?php \SZN\App::createRouteDocument(__FILE__); ?>

<div class="clearfix"></div>
<?php get_footer('end'); ?>
