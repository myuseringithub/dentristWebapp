<div class="clearfix" ></div>

<?php while (have_posts()) : the_post(); ?>
<div id="singlepage-wrapper">

    <!--
    <p style="width:100%; text-align: center;"> <?php  echo get_post_type( $post_id ); ?> > <?php echo the_title(); ?></p>
    -->

    <!-- TITLE
    <title-concept
    	titleconcept="<?php echo get_the_title(); ?>"
        description="<?php echo get_the_excerpt(); ?>"
    >
    </title-concept>
    -->

    <!-- IMAGES -->
    <?php \SZN\App::includeFilePath('codeblocks','singlepostpage-images.codeblock.php'); ?>

	<!-- Recent Posts -->
    <div class="h1-wrapper"><center>
    	<h1 style="margin:0;">Recent Posts:</h1>
        <p style=" font-size:16px; font-style:italic; color:white;"></p>
	</center></div>
		<?php
    \SZN\App::insert($views['masonryRecentposts']);
		?>


    <!-- Study sub -fields -->
    <div class="h1-wrapper"><center>
    	<h1 style="margin:0;">Study Subfields:</h1>
        <p style=" font-size:16px; font-style:italic; color:white;"></p>
	</center></div>
		<?php // There is a parent id, global variable used
		$GLOBALS['parent_id'] = get_the_ID();
    \SZN\App::insert($views['masonryChildrenofparentid']);
		?>

    <!-- COMMENTS -->
    <card-section concepttitle="Comments :">
        <div class="post-comments">
                <?php comments_template(); ?>
        </div>
    </card-section>



<!--  POST AREA ---------------------------------->
    <div id="singlepage-post-wrapper" class="sidebar-wrapper">

        <div id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>



        </div>
    </div>


</div>
<?php endwhile; ?>

<div class="clearfix"></div>
