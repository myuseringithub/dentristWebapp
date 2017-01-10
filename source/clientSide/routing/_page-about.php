<?php get_header('start'); ?>

<?php include ( \SZN\App::getFileDirectoryPath('codeblocks','setup-post-data-for-pages.codeblock.php') ); ?>
<?php get_header('end'); ?>
<?php include(\SZN\App::$appPath . '/javascripts' . '/facebook-javascript-sdk.js.php');  ?>

<?php \SZN\App::createRouteDocument(__FILE__); ?>

<script>
  document.addEventListener('WebComponentsReady', function () {
    var template = document.querySelector('template[is="dom-bind"]');
    template.selected = 0; // selected is an index by default
  });
</script>

<?php get_footer('end'); ?>
