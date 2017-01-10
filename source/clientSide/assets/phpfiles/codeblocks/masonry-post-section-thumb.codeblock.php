<?php if ( $type != 'question') {?>



<a href="<?php echo $permalink; ?>">
    <paper-ripple></paper-ripple>
    <!-- Secondary image  -  for Multiple Post Thumbnails plugin -->
    <?php //  if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image'); endif; ?>

    <?php
    include( \SZN\App::getFileDirectoryPath('templates','masonry-output-images.template.php') );
		?>

    <!-- FEATURED IMAGE -------------------------------------------->
    <?php
    /*
    if (has_post_thumbnail()) {
        $imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'medium');
        $imgwidth = $imgsrc[1];
        $imgheight = $imgsrc[2];
        $imgsrc = $imgsrc[0];
    } elseif ($postimages = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=0")) {
        foreach($postimages as $postimage) {
            $imgsrc = wp_get_attachment_image_src($postimage->ID, 'medium');
            $imgwidth = $imgsrc[1];
            $imgheight = $imgsrc[2];
            $imgsrc = $imgsrc[0];
        }
    } elseif (preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', $content, $match) != FALSE) {
        $imgsrc = $match[1];
    } else {
        $imgsrc = get_template_directory_uri() . '/img/blank.gif';
    }

    if ($type != 'case') {
    ?>
    <!-- Fixed width of masonry brick is 230 px -->
    <img src="<?php echo $imgsrc; $imgsrc = ''; ?>" alt="<?php the_title_attribute(); ?>"
    style=" <?php // if ($title == NULL ) { echo 'border-top-left-radius: 3px; border-top-right-radius: 3px;'; } ?>
            <?php if ($imgwidth != '') { ?>
                    height:<?php echo round(230/$imgwidth*$imgheight); ?>px;
            <?php } else { ?>
                    height:200px;
            <?php } ?> "
    class="post-img" />
    <?php }
	*/
	?>

</a>

<?php } // if not question type post?>
