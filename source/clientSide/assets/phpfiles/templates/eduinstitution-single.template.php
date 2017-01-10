

<?php while (have_posts()) : the_post(); ?>
<div id="singlepage-wrapper">
					<?php \SZN\App::includeFilePath('variables','variables.php'); ?>
			    <!-- <p style="width:100%; text-align: center;"> <?php // echo get_post_type( $post_id ); ?> > <?php // echo the_title(); ?></p> -->
					<?php  // LEFT SIDEBAR
					if ((is_mobile() == 0)) {?>
				    <div id="singlepage-left-sidebar" class="">
				        <!-- Advs Desktop & tablet -->
								<?php if(function_exists('SZN_ads'))	echo SZN_ads('default', 'skyscraper', array('tablet','desktop')); ?>
				    </div>
					<?php } ?>

			    <!-- Advs Mobile  -->
			    <div id="" class="" style="padding-top: 10px;">
			        <?php if(function_exists('SZN_ads'))	echo SZN_ads('medium', 'rectangle', array('mobile')); ?>
			    </div>

			    <!--- RIGHT SIDEBAR ------------------------------------------->
			    <div id="singlepage-right-sidebar" class="sidebar-wrapper">
			        <?php // get_sidebar('right'); ?>
			        <?php // get_sidebar('left'); ?>
			    </div>
		    	<!--  POST AREA ---------------------------------->
			    <div id="singlepage-post-wrapper" class="sidebar-wrapper">
					        <div id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
							            <div class="h1-wrapper">
														<h1><?php the_title(); ?></h1>
						                <div class="masonry" style="position: absolute; top: 0; width: 100%;visibility: visible;">
						                </div>
							            </div>
							            <!-- POST INFO - Time, Comments, Likes -->
							            <div class="post-meta-top">
							                <div class="pull-right">
							                	<time is="relative-time" datetime="<?php echo $post_time_iso8106; ?>" style="margin-right:20px;"></time>
							                <!-- <a href="" style="width:inherit;"><span style=" float:right; margin-right:11px;font-size:11px;"><i class="fa fa-heart" style="font-size:11px;"></i> 24 Shares</span></a> -->
							                <a class="comments_number" href="#comments" style="width:inherit;"><span id="comments_number"><i class="fa fa-comment"></i> <?php comments_number(__('0','ipin'), __('1', 'ipin'), __('%',' ipin')); ?></span></a>
							                </div>
							      	  	</div>

							            <!-- IMAGES -->
							            <?php	\SZN\App::includeFilePath('codeblocks','singlepostpage-images.codeblock.php');	?>


													<?php
					                if( have_rows('reference') ) { // Reference Field Links
													?>


									                <card-section concepttitle="References :">
																	<?php

							                    $x = 1; // Order number
							                    while ( have_rows('reference') ) : the_row(); // loop through the rows of data
							                        $title_reference = get_sub_field('title');

							                        if (!empty($title_reference)) {  ?>
								                        <reference-listitem
								                                referencetitle="<?php echo $x.'. ' . $title_reference; ?>"
								                                referencelink=" <?php echo get_sub_field('link'); ?>"
								                            ></reference-listitem>
							                        	<?php
							                        	$x ++; // increase order num
							                        }
																	endwhile;
																	?>
																	</card-section>
												<?php
												}
												?>

							            <!-- Recent Posts -->
							            <div class="h1-wrapper">
														<center>
							                <h1 style="margin:0;">Recent Posts:</h1>
							                <p style=" font-size:16px; font-style:italic; color:white;"></p>
							            	</center>
													</div>


  													<?php
														\SZN\App::insert($views['main']);
  													?>

							            <!-- POST CONTENT AREA & INFO -->
							            <div class="post-content">
							                <div id="post-content-text">
							                <?php
							                the_content();
							                wp_link_pages( array( 'before' => '<p><strong>' . __('Pages:', 'ipin') . '</strong>', 'after' => '</p>' ) );
							                ?>
							                    <!-- COMMENTS -->
							                    <card-section concepttitle="Comments :">
							                        <div class="post-comments">
							                          <?php comments_template(); ?>
							                        </div>
							                    </card-section>
							                </div>
							            </div>
							</div>

</div>
<?php endwhile; ?>


<!--- MASONRY - ALL POSTS ------------------------------------------->
	<?php /* Custom Query - All posts masonry

	//Solve next link - http://wordpress.stackexchange.com/questions/20424/wp-query-and-next-posts-link
	//save old query
	$temp = $wp_query;

	$wp_query->is_single = false; // wouldn't treat it as singlepage.

	//clear $wp_query;
	$wp_query= null;

	// All custom post types
	$custom_post_types = array('case', 'question', 'entertainment', 'sc-questions', 'open-question', 'mc-question', 'article');

    // create new query for to display masonry bricks
    // arguments
    $args = array (
        'post_type' => $custom_post_types,
        'posts_per_page' => 25,
        'orderby' => 'date'
    );
    // Create new query
    $queryObject = new WP_Query($args);

	// Trick wordpress to use new query as default inorder to use global parameters i.e. next_posts_link(); - ALLOW NEXT LINK TO WORK
	$wp_query = $queryObject;

	// Define post counter
	$count = 1;
	?>

<div id="masonry">
	<?php
	// The Loop...
	while ($queryObject->have_posts()) :

		// replace default post to custom query post
		$queryObject->the_post();

		// Post query all VARIABLES
		SZN\\SZN\App::includeFilePath('query','variables.php');



		if ($count % 16 == 0  || $count == 2) {
		?>
        <div id="ads-masonry-brick" class="thumb brick" style="a">
        <center>
        <!-- Ads -->
        <?php if(function_exists('SZN_ads'))	echo SZN_ads('small', 'square', array('tablet','desktop','mobile')); ?>
        </center>
        </div>

		<?php
		}

		// choose Brick
		SZN\\SZN\App::includeFilePath('section','masonry-bricks.php');



		//add counter
		$count++;

	endwhile;


    ?>
</div>

<!-----------------------------------------  INFINITE SCROLL - NAVIGATION FOR NEXT/PREVIOUS POSTS  -------------------------------------------->
<div id="navigation">
    <ul class="pager">
        <li id="navigation-next"><?php next_posts_link(); ?></li>
        <li id="navigation-previous"><?php previous_posts_link(__('Next &raquo;', 'ipin')) ?></li>
    </ul>
</div>

<?php
	//clear again
	$wp_query = null;
	//reset
	$wp_query = $temp;

    // Restore original Post Data
    wp_reset_postdata();
*/?>
