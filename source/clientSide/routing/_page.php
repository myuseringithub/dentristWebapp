<?php get_header('start'); ?>
<?php include ( \SZN\App::getFileDirectoryPath('codeblocks','setup-post-data-for-pages.codeblock.php') ); ?>

<?php get_header('end'); ?>

<?php \SZN\App::createRouteDocument(__FILE__); ?>

<?php
  // $template = TemplateSystem::$templateObject;
  //
  // $template->defineView([
  //   'queryargsFiles' => [
  //                       ],
  //     'viewFile' => 'page.view.php',
  //     'viewPositionInLayout' => 'content'
  // ]);
  //
  // $template->insertViewsIntoLayout(TemplateSystem::$defaults['DocumentLayout']); // save the rendered HTML into variables here and then add them when calling insert views.
?>


<?php get_footer('end'); ?>
