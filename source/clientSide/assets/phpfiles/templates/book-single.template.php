<div class="clearfix"></div>

<?php
while (have_posts()) : the_post();
	\SZN\App::includeFilePath('variables','variables.php');

?>


    <!-- TITLE -->
    <title-concept
    	titleconcept="<?php the_title(); ?>"
        description=""
        style=" direction:rtl;"
    ></title-concept>
    <!-- END TITLE -->

<div id="singlepage-wrapper">


    <!--  POST AREA ---------------------------------->
    <div id="singlepage-post-wrapper" class="sidebar-wrapper">

					<paper-material   style=" background: white; box-sizing: border-box; padding: 16px; border-radius: 2px; text-align:center;">
						<div style="display:flex; justify-content: center; text-align:center;">
							<div style="flex:20;">
		            <!-- IMAGES -->
		            <?php \SZN\App::includeFilePath('codeblocks','singlepostpage-images.codeblock.php');	?>
		            <!-- ENDIMAGES -->
							</div>

						<div style="flex:80;">
							<?php
							the_content();
							wp_link_pages( array( 'before' => '<p><strong>' . __('Pages:', 'ipin') . '</strong>', 'after' => '</p>' ) );
							?>
						</div>
					</div>
						<!-- DOWNLOAD AREA -->
								<?php
								// Reference Field Links
								if( have_rows('links') ):
								/*
								*  Loop through a Repeater field
								*/ ?>
										<?php
														// Order number
														$x = 1;
														// loop through the rows of data
														while ( have_rows('links') ) : the_row();
																$title_reference = get_sub_field('title');

																if (!empty($title_reference)) {

																?>
																<paper-button tabindex="0" raised class="colorful" onclick="<?php if(is_user_logged_in()) { ?> window.open( '<?php echo get_sub_field('link'); ?>', '_blank'  );  <?php } else { ?>document.querySelector('#toast2').show()<?php } ?>"> <iron-icon icon="icons:cloud-download" style="margin-right:10px;  flex-shrink: 0;"></iron-icon> Download</paper-button>


																<?php
																		$x ++; // increase order num
																}
														endwhile;
										?>

								<?php
								else :
								endif;
								?>
								<!-- END DOWNLOAD AREA -->

						</paper-material>


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


               </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>

<div class="clearfix"></div>

<paper-toast id="toast2" text="You must be signed in." style="z-index:1;">
  <span role="button" tabindex="0" style="color: #eeff41;margin: 10px; cursor: pointer;" onclick="window.location.href='<?php echo  wp_login_url($permalink); ?>'">Sign-in</span>
</paper-toast>
