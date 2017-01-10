<script>
System.import('<?= \SZN\App::$locations['app']['url'] . '/sharedApp/javascripts' . '/stopImageStealing.js'; ?>');
</script>

<?php
  while (have_posts()) : the_post();
      \SZN\App::includeFilePath('variables','variables.php');
  ?>

              <?php
              // if has no children (is not a parent)
              if ($post->post_parent != false) {
              ?>
              <?php
              \SZN\App::insert($views['mcqlist']);
              ?>
              <section onclick="clickHandlerCollapse(event)" style="text-align:center;direction: rtl;">
                <paper-button data-collapse="ironcollapse" align="center" style="margin:auto;direction: rtl; margin-bottom:10px;margin-top:10px;">Open/Close (Toggle) Collapsed Questions</paper-button>
              </section>
              <?php

              }
              else {
                {
                }
              }
              ?>


          <!-- NAVIGATION -->
          <?php // include ( SZN_template_directory('section','navigation-between-posts.php') ); ?>
          <!-- END NAVIGATION -->



          <?php
          $is_a_member = SZN\WPExtend\Visitor::isCurrentUserInGroup('MCQs');

          if((is_user_logged_in() && (in_array('administrator', $current_user->roles) || $is_a_member))) {
              if(wp_get_post_parent_id( get_the_ID () )) {
          ?>
              <template is='dom-bind'>
                <examinations-data examinations="{{examinations}}" examinationid="<?php echo get_the_ID(); ?>"></examinations-data>
                <examinations-view examinations="{{examinations}}"></examinations-view>
              </template>
            <?php
              }

            } else {
            ?>

            <paper-material elevation="3" align="center" style="background-color:white; display: block; text-align:center; max-width: 600px; margin: 15px auto 0px auto; padding: 10px;">
            You don't have enough permissions to view the questions, please proceed with payment.
            </paper-material>
            <paper-material elevation="3" align="center" style="background-color:white; display: block; text-align:center; max-width: 600px; margin: 0px auto 0 auto; padding: 10px;">
            	<?php
            	$current_url = WP_HOME . '/' . $_SERVER["REQUEST_URI"]; // get current url of the page.
            	$current_url = strtok($current_url, '?');
            	$logginglink = wp_login_url($current_url);

            	?>
            	<paper-button dialog-confirm autofocus onclick="window.location.href='<?php echo $logginglink; ?>'">Sign-In</paper-button>
            </paper-material>
            <span style="margin: auto; text-align: center; display: block; margin: 15px auto 15px auto;"> OR </span>

            <paper-material elevation="3" align="center" style="background-color:white; display: block; text-align:center; max-width: 600px; margin: 0px auto 30px auto; padding: 10px;">
            	<paper-button raised  align="center" style="text-align: center; margin: auto; display: table; " onclick="javascript:window.open('<?php echo WP_HOME . '/' .mcq; ?>','Dentrist | MCQs','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=2000, height=2000'); return false;"><iron-icon icon="communication:vpn-key" style="margin-right: 10px;"></iron-icon>Get Access | Examination Multiple Choice Questions</paper-button>
            </paper-material>

            <?php
            }
            ?>




          <div id="post-<?php the_ID(); ?>" <?php post_class('post-wrapper'); ?> >


              <!-- IMAGES -->
              <?php	// \SZN\App::includeFilePath('codeblocks','singlepostpage-images.codeblock.php');	?>


              <!-- ONLY FOR SPECIFIC POST 2345 n NBDE -->
              <?php if($id == 2612) { ?>
                            <div id="" class="horizontal-section">
                              <div id="frame-google-drive" class="brick">
                                  <!-- <span style=" width: 100%; font-size:20px; font-weight: bold; padding-top: 10px; display:inline-block;"> All The Files  </span> -->
                                    <iframe src="https://drive.google.com/embeddedfolderview?id=0B7TY-evjcgCUZGkyMVZfMHdyX1k#list" width="100%" height="" style="margin-top:10px; min-height: 200px;" frameborder="0" seamless></iframe>
                                </div>
                            </div>
              <?php } ?>


              <?php if(get_the_ID() == 2345) {
                ?>
                  <?php
                  if((is_user_logged_in() && (in_array('administrator', $current_user->roles) || $is_a_member))) {
                  ?>

                  <template is="dom-bind">
                    <style is="custom-style" >
                    paper-card.access {
                      max-width: 400px;
                      margin-right: 10px;
                      margin-left: 10px;

                      --paper-card-header-text:	{
                        text-align: center;
                        width: 100%;
                      }
                      --paper-card-actions: {
                      }
                		}

                    paper-card.access div.card-actions paper-button {
                      color: black;
                      background-color: transparent;
                      font-weight: bold;
                    }

                    </style>
                    <div class="horizontal center-justified layout" style="margin: auto; margin-bottom: 30px; padding-top: 15px;">
                      <paper-card class="access" heading="Google Drive Files" image="<?php echo WP_HOME; ?>/site/../content/uploads/2016/02/1-text.png">
                        <div class="card-content">
                          Shared files using Google Drive.
                        </div>
                        <div class="card-actions">
                          <paper-menu-button style="padding: 0; margin: 0;" horizontal-align="left" allow-outside-scroll>
                            <paper-button class="dropdown-trigger" alt="menu" style="">
                              <iron-icon icon="more-vert" class="dropdown-trigger" alt="menu"></iron-icon>
                              Access
                            </paper-button>
                            <paper-menu class="dropdown-content" style="display: block; max-width: 250px; ">
                              <paper-item style="cursor: pointer; display: none;">Display None.</paper-item>
                              <paper-item style="cursor: pointer; " onclick="javascript:window.open('https://drive.google.com/folderview?id=0B7TY-evjcgCUUERlUEp6LUVDVm8&usp=sharing#list')">Study Material</paper-item>
                              <paper-item onclick="javascript:window.open('https://drive.google.com/folderview?id=0B7TY-evjcgCUdzhaWGh4aFFRMEE&usp=sharing#list')" style="cursor: pointer;">Examinations & Answers</paper-item>
                              <paper-item onclick="javascript:window.open('https://drive.google.com/folderview?id=0B7TY-evjcgCUVTFiV0E5ZDNPbHM&usp=sharing#list')" style="cursor: pointer;">English Questions</paper-item>
                              <paper-item onclick="javascript:window.open('https://drive.google.com/folderview?id=0B7TY-evjcgCUfk5ENXhzSVJ3LVZuWXhuYXIzNkV4TjZINzlobEJKZEpEaG9EQndXdmI4eEk&usp=sharing#list')" style="cursor: pointer;">Trusted Course Answers</paper-item>
                            </paper-menu>
                          </paper-menu-button>

                          <!-- <paper-button>Explore!</paper-button> -->
                        </div>
                      </paper-card>
                      <paper-card class="access" heading="Examination MCQs" onclick="javascript:window.open('<?php echo WP_HOME . '/' .mcq; ?>','Dentrist | MCQs','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=2000, height=2000'); return false;" image="<?php echo WP_HOME; ?>/site/../content/uploads/2016/02/1-text-1.png">
                        <div class="card-content">
                          Dentrist database's multiple choice questions.
                        </div>
                        <div class="card-actions">
                          <paper-button><iron-icon icon="icons:open-in-new"></iron-icon>  Open</paper-button>
                          <!-- <paper-button>Explore!</paper-button> -->
                        </div>
                      </paper-card>
                    </div>
                  </template>

                  <?php
                  } else {
                  ?>
                    <!-- <paper-button raised  align="center" style="text-align: center; margin: auto; display: table;" onclick="javascript:window.open('<?php echo WP_HOME . '/' .mcq; ?>','Dentrist | MCQs','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=2000, height=2000'); return false;"><iron-icon icon="communication:vpn-key" style="margin-right: 10px;"></iron-icon>Examination Multiple Choice Questions</paper-button> -->
                  <?php
                  }
                  ?>
              <?php } else {?>
                <div style="display: block; text-align:center; padding-top: 30px; margin: auto; font-weight: bold;" > Here you may also view examination statistics & comments. </div>


                <?php } ?>
              <!-- ONLY FOR SPECIFIC POST 2345 PREVIOUSLY FOR ISL EXAMINATION-->
              <?php if($id == 2345) { ?>
                            <!-- Examination Questions Button -->
                            <div id="" class="horizontal-section">

                                <a href="http://dentrist.com/mcq/">
                                <div id="" class="brick" >
                                    <span style="font-size:20px; font-weight:bold; display:block; width:100%;padding-left: 12px; padding-top:5px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.32);">
                                        <br />
                                        Examination Questions
                                        <br />
                                        <br />
                                      </span>
                                      <!-- IMG AREA  -------------------------------------------------------------------->
                                      <div id="thumb-post-section" class="thumb-holder" style="position: absolute; left: -6px; top: -36px; ">
                                          <!-- Secondary image  -  for Multiple Post Thumbnails plugin -->
                                          <div class="image-single-wrap" id="wrapper" style="background-image:url(http://dentrist.com/wp-content/uploads/2014/11/shutterstock_23210365.png); height: 125px; width: 64px;"> </div>
                                          <!-- FEATURED IMAGE -------------------------------------------->
                                      </div>
                                      <paper-ripple recenters></paper-ripple>
                                  </div>
                                </a>
                                <!-- Previous Exam answers Button -->
                                <a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUdzhaWGh4aFFRMEE&usp=drive_web&tid=0B7TY-evjcgCUUERlUEp6LUVDVm8#list">
                                <div id="" class="brick" style="  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.32);" >
                                    <span style="font-size:20px; font-weight:bold; display:block; width:100%;padding-left: 60px; padding-top:5px;">
                                        <br />
                                        שיחזורים למבחן הרישוי
                                        <br />
                                        <br />
                                      </span>
                                      <!-- IMG AREA  -------------------------------------------------------------------->
                                      <div id="thumb-post-section" class="thumb-holder" style="position: absolute; left: 10px; top: -22px;">
                                          <!-- Secondary image  -  for Multiple Post Thumbnails plugin -->
                                          <div class="image-single-wrap" id="wrapper" style="background-image:url(http://dentrist.com/wp-content/uploads/2015/07/christmas_star.png); height: 100px; width: 49px;"> </div>
                                          <!-- FEATURED IMAGE -------------------------------------------->
                                      </div>
                                      <paper-ripple recenters></paper-ripple>
                                  </div>
                                </a>
                                <!-- Material for exam Button -->
                                  <a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUUERlUEp6LUVDVm8&usp=drive_web#list">
                                  <div id="" class="brick" style="  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.32);">
                                      <span style="font-size:20px; font-weight:bold; display:block; width:100%;padding-left: 12px; padding-top:5px;">
                                          <br />
                                          חומר לימודים מאוניברסיטת ת"א ואוניברסיטת ירושלים
                                          <br />
                                          <br />
                                        </span>
                                        <paper-ripple recenters></paper-ripple>
                                    </div>
                                  </a>


                              </div>

                          <?php
                          \SZN\App::insert($views['list']);
                          ?>



              <?php			} ?>
              <!-- END ONLY FOR SPECIFIC POST 2345 -->

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
              <!-- END POST INFO - Time, Comments, Likes -->


        </div>



        <div style="max-width: 800px; margin: auto;" align: center;>

          <!-- Articles about examination -->
          <card-section concepttitle="Recent Articles:">
            <div class="post-comments" style="border-top: 1px solid #CCC; ">
              <?php
                \SZN\App::insert($views['masonry']);
              ?>

            </div>
          </card-section>

          <!-- REFERENCES -->
          <div id="post-reference">
            <?php
            // Reference Field Links
            if( have_rows('reference') ):
              /*
              *  Loop through a Repeater field
              */ ?>
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
              ?>
            </card-section>
            <?php
            else :
            endif;
            ?>
          </div>
          <!-- END REFERENCES -->


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



  <?php endwhile; ?>

<!---<div class="clearfix"></div>
MASONRY - ALL POSTS ------------------------------------------->
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
  \SZN\App::includeFilePath('query','variables.php');



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
  \SZN\App::includeFilePath('section','masonry-bricks.php');



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
