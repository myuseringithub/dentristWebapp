<?php
/*
foreach( $postsObjectsArray['main'] as $post ) :
  setup_postdata($post);
  echo '<pre>' . $post->post_title . '</pre>';
endforeach;
*/
if($data['main']['queryObject']) {
  if ( $data['main']['queryObject']->have_posts() ) {
    while ( $data['main']['queryObject']->have_posts() ) :
      $data['main']['queryObject']->the_post();
      echo '<pre>' . get_the_title() . '</pre>';
    endwhile;
  } else {
    echo 'data does not exist';
  }
}
?>
