<div class="container-fluid">

    <!-- TITLE
    <title-concept
    	titleconcept="Dental Study Material"
        description=""
    >
    </title-concept>
	-->

	<!-- Loader masonry
	<div id="ajax-loader-masonry" class="ajax-loader"></div>
	-->

<!--- Horizontal Section  -------------------------------------------->

<div class="clearfix"></div>

<div id="" class="horizontal-section">
	<a href="#">

	<div id="" class="brick" >
   		<span style="font-size:20px; font-weight:bold; display:block; width:100%;padding-left: 12px; padding-top:5px;">
        	<br />
        	Coming Soon !
        	<br />
        	<br />

        </span>

        <!-- IMG AREA  -------------------------------------------------------------------->
        <div id="thumb-post-section" class="thumb-holder" style="position: absolute; left: -6px; top: -36px;">
            <!-- Secondary image  -  for Multiple Post Thumbnails plugin -->
            <div class="image-single-wrap" id="wrapper" style="background-image:url(http://dentrist.com/wp-content/uploads/2014/11/shutterstock_23210365.png); height: 125px; width: 64px;"> </div>
            <!-- FEATURED IMAGE -------------------------------------------->
        </div>

    </div>
	</a>

</div>



<?php
	while (have_posts()) : the_post();
			\SZN\App::includeFilePath('query','variables.php');
	?>

					<div id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?>>


							<!-- IMAGES -->
							<?php
							// \SZN\App::includeFilePath('section','singlepostpage-images.php');
							?>

							<!-- POST CONTENT AREA & INFO -->
							<div class="post-content">
									<!-- CONTENT -->
									<div id="post-content-text">

											<?php
											the_content();
											wp_link_pages( array( 'before' => '<p><strong>' . __('Pages:', 'ipin') . '</strong>', 'after' => '</p>' ) );
											?>

									</div>
							</div>



						<div style="max-width: 800px; margin: auto;" align: center;>


							<!-- FACEBOOK COMMENTS - The script of faceboo should be added above-->
							<card-section concepttitle="Facebook Comments :">
									<div class="post-comments" style="border-top: 1px solid #CCC; ">
											<div class="fb-comments" data-href="<?php echo wp_get_shortlink(); ?>" data-numposts="5" data-colorscheme="light" data-width="100%"></div>
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

							<!-- Like post  -->
							<?php // include 'incphp_theme/like-post.php';?>

					</div>
				</div>
	<?php endwhile; ?>


<!-- Horizontal Section  -------------------------------------------->
<!--
<div id="study-material" class="horizontal-section">
    <div id="" class="brick brick-link">
    	<a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUR3I0bXlIQlJ1UE0&usp=sharing" title="">
   		<span> USMF University - Chisinau </span>
        <div align="center"><img align="center" src="https://sites.google.com/site/myuseringsites/main/Google%20drive.jpg" style="border:5px solid white;border-top-left-radius:6px;border-top-right-radius:6px;border-bottom-right-radius:6px;border-bottom-left-radius:6px;display:block;margin-right:auto;margin-left:auto"></font></div>
        </a>
    </div>
    <div id="" class="brick brick-link">
    	<a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUeHpONjBfM1lTN0txck5jM1Z2TlA1dw&usp=sharing" title="">
   		<span> The University of Jordan - Jordan </span>
        </a>
    </div>
    <div id="" class="brick brick-link">
    	<a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUQjhTSkdvYWZYcFE&usp=sharing" title="">
   		<span> Hebrew University of Jerusalem</span>
        </a>
    </div>
    <div id="" class="brick brick-link">
    	<a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUbEIzdUV6aUh1Q3M&usp=sharing" title="">
   		<span> Baghdad Dental University  </span>
        </a>
    </div>
    <div id="" class="brick brick-link">
    	<a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUNVRVY3hrbEEtNXc&usp=sharing" title="">
   		<span> Other Study Material </span>
        </a>
    </div>
</div>
-->
