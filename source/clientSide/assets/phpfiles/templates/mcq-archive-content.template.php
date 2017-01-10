<div id="singlepage-post-wrapper" class="sidebar-wrapper" style=" text-align:right; direction:rtl; background-color: white; margin-bottom:7px;">


<!-- CHOICES ANSWERS -->
<?php
// check if the repeater field has rows of data
if( have_rows('mcqanswers') ):

    // Order number
    $x = 1;
    // loop through the rows of data
    while ( have_rows('mcqanswers') ) : the_row();

?>
    <choice-listitem
        choicetext="<?php echo htmlspecialchars(get_sub_field('choicetext'), ENT_QUOTES); ?>"
        iscorrect="<?php if(get_sub_field('iscorrect')==1) { echo 'נכון'; } ?>"
        iswrong="<?php if(get_sub_field('iswrong')==1) { echo 'לא נכון לפי ערעור'; } ?>"
        ordernumber=" <?php echo $x.'. '; ?>"
        style=" text-align:left; direction:ltr;"
    ></choice-listitem>

<?php

    $x = $x+1; // increase order number
    endwhile;

else :

    // no rows found

endif;
?>
<!-- END CHOICES ANSWERS -->

<div id="post-<?php the_ID(); ?>" class="<?php post_class('post-wrapper'); ?>">

    <!-- IMAGES -->
    <?php
    include( \SZN\App::getFileDirectoryPath('codeblocks','singlepostpage-images.codeblock.php') );
    ?>
    <!-- ENDIMAGES -->

    <!-- POST CONTENT AREA & INFO -->
    <div class="post-content">
        <!-- CONTENT -->
        <div id="post-content-text">




            <!-- TEXT CONTENT & POST CONTENT
            <?php if($content != "") { ?>
                <card-section concepttitle="Material for Answer:" style="margin-top: 20px;">
                <?php
                //the_content();
                 // wp_link_pages( array( 'before' => '<p><strong>' . __('Pages:', 'ipin') . '</strong>', 'after' => '</p>' ) );
                ?>
                </card-section>
            <?php } ?>
             --><!-- END TEXT CONTENT & POST CONTENT -->

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

            <!-- Singl Question Page Link -->
            <div align="left">
              <a href="<?php echo $permalink; ?>" target="_blank" style="line-height: 40px; margin-top: 7px; margin-left: 20px; display: inline-block; margin-bottom: 5px; color: rgb(107, 107, 107);">
                <!-- <card-section concepttitle="View Full Question - Content, Comments, & References" align="left" style=" margin: 0; text-align: left;" >
                  <iron-icon icon="icons:open-in-new">
                </card-section>-->
                <?php if(is_mobile()) { ?>
                  Content, Comments, & References<iron-icon icon="icons:open-in-new" style="margin-right:10px;"></iron-icon>
                <?php } else { ?>
                    View question page - Content, Comments, & References<iron-icon icon="icons:open-in-new" style="margin-right:15px;"></iron-icon>
                <?php } ?>
              </a>
              <a href="<?php if(is_user_logged_in()) { echo $edit_link; } else { echo "javascript:document.querySelector('#toastsignin').show();"; }?>" target="_blank" style="    border-right: 1px rgba(107, 107, 107, 0.3) solid; line-height: 40px; margin-top: 7px; margin-left: 20px; display: inline-block; margin-bottom: 5px; color: rgb(107, 107, 107);">
                <!-- <card-section concepttitle="View Full Question - Content, Comments, & References" align="left" style=" margin: 0; text-align: left;" >
                  <iron-icon icon="icons:open-in-new">
                </card-section>-->
                  <iron-icon icon="icons:create" style="margin-right:10px;"></iron-icon>
              </a>
            </div>
            <!-- END Singl Question Page Link -->



        </div>
    </div>
</div>
</div>
