
<?php
global $wp_query;
if ( !is_front_page() && !is_post_type_archive()) {
    $pagename = get_query_var('pagename');
		if ( !$pagename && $id > 0 ) {
			// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object
			$post = $wp_query->get_queried_object();
			$pagename = $post->post_name;
		}
		$slug = basename(get_permalink());
		$page_title = $wp_query->post->post_title;
		echo $page_title;
	} elseif (is_post_type_archive()) {
	?>

    <!-- SETUP POST DATA -->
    <?php
    $queried_object = get_queried_object();
    $queried_object_vars = get_object_vars ( $queried_object );
    // echo $vars['labels']->singular_name;
    $page_slug = $queried_object_vars['slug'];
    $page = get_page_by_path( $page_slug );
    $pageid = $page->ID;

    $myposts = get_posts( array('post_type'=>'page','numberposts' => 1,'include' => $pageid) );
    foreach( $myposts as $post ) :  setup_postdata($post);
        $archive_title = $post->post_title;
		echo $archive_title;
    endforeach; // end of the loop.
    wp_reset_postdata();
  ?>
  <!-- END SETUP POST DATA + RESET -->

<?php
} else {
	// This is not the blog posts index
	echo 'Dentrist';
}
// or

?>
