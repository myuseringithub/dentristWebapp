<?php
// The Loop...
if($data['secondary']['queryObject']) {
  while ($data['secondary']['queryObject']->have_posts()) :
  $data['secondary']['queryObject']->the_post(); // replace default post to custom query post
  include( \SZN\App::getFileDirectoryPath('variables','variables.php') ); // Post query all VARIABLES
    if($parent_id == $GLOBALS['parent_id']) {
  ?>
      <a href="<?php echo $permalink; ?>">
          <div id="post-title-wrapper" class="post-section-wrapper">
              <?php echo $title;
  					// echo get_the_ID();

  			?>
          </div>
      </a>
  	<?php
    }

  	//echo get_the_ID();
  	//echo count(get_pages('child_of='.get_the_ID()));
  	//$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
  	//echo $children;

  	// FOR SUB CHILDREN - execute in both cases if there are children or not, and the template processor will echo if query retreives posts.
  	//$GLOBALS['parent_id'] = get_the_ID();
  	// echo SZN_template_processor('studyfield-childrenofparentid-query','masonry-brick-title-section', array('mobile','desktop','tablet'));

  	?>


  <?php
  endwhile;
} else {
  echo 'Data does not exist !';
}
?>
