<?php get_header('start'); ?>

<style is="custom-style">


/* paper-drawer-panel id="paperDrawerPanel" ---------------------------------------- */

	  #paperDrawerPanel [main] {
		background-color: var(--google-grey-100);
	  }
	
	  #paperDrawerPanel [drawer] {
		border-right: 1px solid var(--google-grey-300);
	  }
	
	  #paperDrawerPanel[right-drawer] [drawer] {
		border-left: 1px solid var(--google-grey-300);
	  }
	
	  paper-button {
		color: white;
		margin: 10px;
		background-color: var(--google-blue-700);
		white-space: nowrap;
	  }

/* Paper Scroll Header Panel ---------------------------------------- */
	
    paper-scroll-header-panel {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-color: var(--paper-grey-200, #eee);

      /* background for toolbar when it is at its full size */
      --paper-scroll-header-panel-full-header: {
        background-image: url(http://www.willowspringslv.com/images/dentist_in_las_vegas.jpg);
      };

      /* background for toolbar when it is condensed */
      --paper-scroll-header-panel-condensed-header: {
        background-color: var(--paper-deep-orange-500, #ff5722);
      };
    }

    paper-toolbar {
      background-color: transparent;
    }

    paper-toolbar .title {
      font-size: 40px;
      margin-left: 60px;
    }

    paper-toolbar iron-icon {
      margin: 0 8px;
    }

    .content {
      padding: 8px;
    }
/* ---------------------------------------------- */

.branding-heading {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-flex;
  display: -ms-flexbox;
  display: -o-flex;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-align-items: center;
  -ms-align-items: center;
  -o-align-items: center;
  align-items: center;
  height: 80px;
  padding-left: 24px;
}

.left-sidebar iron-icon {
	margin: 0 16px 0 4px;		
}

paper-icon-item {
	 cursor:pointer;	
}
paper-icon-item:hover {
	background-color: #F4F4F4;
}


</style>



<?php get_header('end'); ?>



<!-- SECONDARY TOP MENU -->
<?php // echo SZN_template_includer('section/navigation','top-secondary-navigation.php');	?>

<!-- FACEBOOK JAVASCRIPT SDK -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=772123976141765";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- END FACEBOOK JAVASCRIPT SDK -->

<div class="clearfix"></div>

<?php 
while (have_posts()) : the_post(); 
	include ( SZN_template_directory('query','variables.php') ); // Post query all VARIABLES
?>


    <!-- TITLE -->
    <title-concept
    	titleconcept="<?php the_title(); ?>"
        description=""
    ></title-concept>
    <!-- END TITLE -->

<div id="singlepage-wrapper">
	

    <!------------------------------------------- LEFT SIDEBAR ------------------------------------------->
	<?php  if ((is_mobile() == 0)) {?>
    <div id="singlepage-left-sidebar" class="">
       
            <?php  

				// include ( SZN_template_directory('section','singlepostpage-author.php') );
			?>
        <!-- Advs Desktop & tablet -->
		<?php echo SZN_ads( $showADS , 'default', 'skyscraper', array('tablet','desktop')); ?>

    </div>
	<?php } ?>
    <!-- Advs Mobile  -->
    <div id="" class="" style="padding-top: 10px;">
        <?php echo SZN_ads( $showADS , 'medium', 'rectangle', array('mobile')); ?>
    </div>

    <!------------------------------------------- RIGHT SIDEBAR ------------------------------------------->
    <div id="singlepage-right-sidebar" class="sidebar-wrapper">
        <?php // get_sidebar('right'); ?>
        <?php // get_sidebar('left'); ?>
    </div>

    <!---------------------------------------  POST AREA ---------------------------------->
    <div id="singlepage-post-wrapper" class="sidebar-wrapper">

        <!-- NAVIGATION -->
        <?php // include ( SZN_template_directory('section','navigation-between-posts.php') ); ?>
        <!-- END NAVIGATION -->

        <div id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>
                        
                <!-- POST INFO - Time, Comments, Likes -->
                <div class="post-meta-top">	
                                
                    <!--<div class="pull-right"><a href="#navigation"><?php //comments_number(__('0 Comments','ipin'), __('1 Comment', 'ipin'), __('% Comments',' ipin'));?></a><?php //edit_post_link(__('Edit', 'ipin'), ' | '); ?></div> -->
                    <div class="pull-left">
                        <!-- TAGS & CATEGORIES -->
                        <div class="post-meta-category-tag">
							<?php 
							$terms_as_text = get_the_term_list( $id, 'studyfield', '', ', ', '' ) ;
							echo 'Dental Fields: '. strip_tags($terms_as_text);
							?>
                        
                        </div>
                    </div>
                    
                    <div class="pull-right">
                    	<time is="relative-time" datetime="<?php echo $post_time_iso8106; ?>" style="margin-right:20px;"></time>
                    <!-- <a href="" style="width:inherit;"><span style=" float:right; margin-right:11px;font-size:11px;"><i class="fa fa-heart" style="font-size:11px;"></i> 24 Shares</span></a> -->
                    <a class="comments_number" href="#comments" style="width:inherit;"><span id="comments_number"><i class="fa fa-comment"></i> <?php comments_number(__('0','ipin'), __('1', 'ipin'), __('%',' ipin')); ?></span></a>
                    </div>

          	  </div>
                    
            <!-- IMAGES -->
            <?php 
			include ( SZN_template_directory('section','singlepostpage-images.php') );?>
            <!-- POST CONTENT AREA & INFO -->
            <div class="post-content">
                        

                <!-- CONTENT -->
                <div id="post-content-text">

                
				
                <?php
                the_content();
                wp_link_pages( array( 'before' => '<p><strong>' . __('Pages:', 'ipin') . '</strong>', 'after' => '</p>' ) );							
                ?>
                
					<?php 
					// Reference Field Links
                    if( have_rows('reference') ):
                    /*
                    *  Loop through a Repeater field
                    */ ?>
                        
                    <div id="post-reference">
                        
                        <card-section concepttitle="References :">
                    
                        
						<?php
                            // Order number
                            $x = 1;
                            // loop through the rows of data
                            while ( have_rows('reference') ) : the_row();
								$title_reference = get_sub_field('title');
								
								if (!empty($title_reference)) {
							
								?>
                            
                                <reference-listitem 
                                        referencetitle="<?php echo $x.'. ' . $title_reference; ?>" 
                                        referencelink=" <?php echo get_sub_field('link'); ?>" 
                                    ></reference-listitem>

                                <?php
									$x ++; // increase order num
								}
                            endwhile;
                        else :
                        endif; 
						
						
					if ( is_user_logged_in() ) { 
						
						// BOOK Post Type Links
						if( have_rows('links') ): 
						/*
						*  Loop through a Repeater field
						*/ ?>
						<div id="brick-links-section">
						<p style="background-color:#c0f0b3; border: 1px solid #e9ffe3; text-align:center; border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px; padding-top: 10px; padding-bottom:10px;">
                        <i class="fa fa-download" style="font-size:34px; margin-right:10px;vertical-align: middle;"> </i>
						<span><strong>Links:</strong></span> <br />
							<?php
							// Order number
							$x = 1;
							// loop through the rows of data
							while ( have_rows('links') ) : the_row();
								$title_link = get_sub_field('title');
									if (!empty($title_link)) {
										echo $x . '. '. '<a href="'. get_sub_field('link') .'" title="Add Article"> ' . $title_link . '</a>';
										echo '<br>';
										$x ++; // increase order num
									}
							endwhile;
						else :
						endif;                      
					} elseif ($post_type == 'book') {
						echo '<p style="background-color:#c0f0b3; border: 1px solid #e9ffe3; text-align:center; border-radius: 10px; -moz-border-radius: 10px; -webkit-border-radius: 10px; padding-top: 10px; padding-bottom:10px;"> <i class="fa fa-download" style="font-size:34px; margin-right:20px;vertical-align: middle;"> </i>  You must be <a href="' . wp_login_url( $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ). '" title="Login">logged-in</a> to view the download links.';	
					}
					
                    ?>
					</card-section>
                    
                <!-- FACEBOOK COMMENTS - The script of faceboo should be added above-->
                <card-section concepttitle="Facebook Comments :">
                    <div class="post-comments" style="border-top: 1px solid #CCC;">
                        <div class="fb-comments" data-href="<?php echo wp_get_shortlink(); ?>" data-numposts="5" data-colorscheme="light"></div>
                    </div>
                </card-section>
                <!-- END FACEBOOK COMMENTS -->


                <!-- Dentrist Users COMMENTS -->
                <card-section concepttitle="Dentrsit Users Comments :">
                    <div class="post-comments">
                            <?php comments_template(); ?>
                    </div>
                </card-section>
                <!-- END Dentrist Users COMMENTS -->
                    
                    
                    
                    </div>
                </div>
                
     
                


                <!-- Like post  -->
                <?php // include 'incphp_theme/like-post.php';?>

                
                
                
                
                
     		   
            </div>
        	
            <!-- Author info for mobile (using default wordpress php check) or tablet || is_tablet() (using mobble plugin) -->
            <?php if ((is_mobile() == 1) ) {?>
                <?php  
				include ( SZN_template_directory('section','singlepostpage-author.php') );
				?>
            <?php }?>
            
        </div>
        <?php endwhile; ?>
    </div>

    
    
    
    <!-- SCROLL TO TOP  -->
    <scroll-top></scroll-top>

</div>



<div class="clearfix"></div>

<!------------------------------------------- MASONRY - ALL POSTS ------------------------------------------->
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
		include ( SZN_template_directory('query','variables.php') );

		
		if ($count % 16 == 0  || $count == 2) {
		?>
        <div id="ads-masonry-brick" class="thumb brick" style="a">
        <center>
        <!-- Ads -->
        <?php echo SZN_ads('small', 'square', array('tablet','desktop','mobile')); ?>
        </center>
        </div>
    
		<?php
		}
	
		// choose Brick
		include ( SZN_template_directory('section','masonry-bricks.php') );

		
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

                
                
<?php get_footer('start'); ?>
<?php get_footer('end'); ?>