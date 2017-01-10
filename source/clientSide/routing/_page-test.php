<?php get_header('start'); ?>
<?php include ( \SZN\App::getFileDirectoryPath('codeblocks','setup-post-data-for-pages.codeblock.php') ); ?>
<?php get_header('end'); ?>

<?php
  $template = \SZN\App::$templateObject;

  $template->includeCodeblock([
      'codeblockFile' => '_testing/test2.test.php',
      'codeblockPositionInLayout' => 'content'
  ]);

  $template->insertViewsIntoLayout(\SZN\App::$defaults['DocumentLayout']); // save the rendered HTML into variables here and then add them when calling insert views.
?>

<?php get_footer('end'); ?>
