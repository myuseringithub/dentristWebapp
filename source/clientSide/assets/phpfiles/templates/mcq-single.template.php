<?php
$is_a_member = SZN\WPExtend\Visitor::isCurrentUserInGroup('MCQs');

if(is_user_logged_in() && (in_array('administrator', $current_user->roles) || $is_a_member)) {
?>
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


			<!-- Attention about the examination -->
				<section onclick="clickHandler(event)" style="text-align:center;direction: rtl;">

					<paper-button data-dialog="scrolling" align="center" style="margin:auto;direction: rtl; margin-bottom:10px;">חובה לקרוא !</paper-button>

					<!-- Attention dialog -->
					<paper-dialog id="scrolling" style="text-align:right;">
			      <h2 style="text-align:center;direction: ltr;">Attention ! Several things to mention:</h2>
			      <paper-dialog-scrollable>
			        <p>כתבתי את זה מהר אז תסלחו לי אם משהו לא מובן.</p>
							<p>1. חלק מהשאלות באתר ממוזגות ממבחני רישוי שונים. ניסוח קצת שונה יכול גם לשנות את התשובה המועדפת. </p>
							<p>2. לחלק מהשאלות במבחן יכול להיות ניסוח מטעה ולא שלם. לשאלה יכולות להיות מספר תשובות נכונות, אך בפועל מוגדרת רק תשובה אחת כנכונה. לפעמיםאחרי ערעור מוסיפים את אחת האופציות כתשובה נכונה ומקובלת בשאלה, ומוסיפים נקודות לכל מי שענה בה.</p>
							<p> 3. המשרד האחראי על מבחני הרישוי מחליט לפעמים להוסיף את אחת האופציות כתשובה נכונה מסיבות של ערעורים על השאלה. ואף מבטל שאלות מסוימות אם ניסוחם מטעה או לא נכון. כך שזה לא 100% נכון או 100% לא נכון.</p>
							<p>	4. בערעורים כותבים את התשובה הלא נכונה. אך גם כאן יש מקום לטעויות מטעם משרד הבריאות או הבוחנים. כל שנה כמעט יש שינויים בחלק מהשאלות ופוסלים חלק. היו מקרים בהם ערעורים שונים נוגדים אחד את השני. חלק גדול מהערעורים המוגשים מתקבלים.</p>
							<p>התשובות באתר מבוססות על שחזורים קודמים, חומר אוניברסיטת ת"א וירושלים, מקורות שונים כמו ספרים ואנטרנט, והגיון, ולבסוף ערעורים.</p>
							<p>כמו שאלה על "הגורם הסיכון המשמעותי ביותר למחלה פריודונטלית היינה ?" הוסיפו לשאלה אחרי ערעורים את התשובה "הגיינה אורלית" כתשובה נכונה חוץ מ- "עישון". כלומר כל מי שסימן הגיינה אורלית גם קיבל נקודות. וחוץ מזה השאלה מוזרה ופתוחה לויכוח.</p>
							<p> למשל השאלה על שחרור מושהה - "מה האנטיביוטיקה שניתנת בשביל שחרור מושהה ? |או| איזה אנטיביוטיקה מופיעה בתכשיר מקומי לשחרור מושהה ? " - יש שתי תשובות נכונות metronidazole ו- Minocycline. </p>
							<p> במבחן האחרון יש שתי תשובות או 3 שבטלו ( 2015פברואר ). ועוד שאלות שהוסיפו להם תשובה מהאופציות הקיימות כתשובה נכונה.</p>
							<p>דוגמא אחרונה היא על שאלה טטראצקלין. התשובה "חודר לפריזמות האמייל ודנטין" נכונה !". שאלה זו התבטלה עקב ערעורים.</p>


							<p>לפי כך השימוש באתר הוא בהתאם. אין זמן לתקן את כל השאלות ולפעמים אין הסבר לתשובה או אין הגיון פשוט לזכור בעל"פ. נא לזכור שיש מקום לטעויות.</p>
							<!-- Attention about the examination -->
			      </paper-dialog-scrollable>
			      <div class="buttons">
			        <!-- <paper-button dialog-dismiss>Cancel</paper-button> -->
			        <paper-button dialog-confirm autofocus>הבנתי</paper-button>
			      </div>
			    </paper-dialog>

			  </section>
				<!-- END Attention about the examination -->


			<!-- IOS DEVICES WARNING -->
			<?php if(is_ios() || is_iphone() || is_ipad() || is_ipod() ) {?>
				<?php if (is_mobile()) { $brick_width = '90%'; } else {$brick_width = '450px';} ?>

				<div id="add-new-post-wrapper" class="horizontal-section">
					<div id="brick-add-case" class="brick brick-add-post " style="width: <?php echo $brick_width; ?>; color:red;">
				   		<span> <i class="fa fa-exclamation-triangle"></i>  Be careful ! the answers are not rendered on Apple devices correctly, therefore you maybe seeing the wrong answers marked !. Please open the page in your desktop using Chrome browser. </span>
				    </div>
				</div>

			<?php } ?>
			<!-- IOS DEVICES WARNING -->

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
								iswrong="<?php if(get_sub_field('iswrong')==1) { echo 'לא נכון לפי ערעור'; } ?>"
                iscorrect="<?php if(get_sub_field('iscorrect')==1) { echo 'נכון'; } ?>"
                ordernumber=" <?php echo $x.'. '; ?>"
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
						\SZN\App::includeFilePath('codeblocks','singlepostpage-images.codeblock.php');
						?>
            <!-- ENDIMAGES -->

            <!-- POST CONTENT AREA & INFO -->
            <div class="post-content">
            <!-- CONTENT -->
            <div id="post-content-text">

							<!-- MCQ Status -->
							<card-section concepttitle="MCQ Status:" style="width:100%; margin:0; margin-top: 20px;">
								<?php
								$questionstatus = get_field('questionstatus');

									switch ($questionstatus) {
											case 'VV':
													echo '<iron-icon icon="icons:done-all" item-icon style="color: green;"></iron-icon> The answer is verified more than once and should be correct according to the material provided. 99% correct.';
													break;
											case 'V':
													echo '<i class="fa fa-check" style="color: Green;"></i> The answer is correct. Relying on previous examinations, the material provided, and logic.';
													break;
											case 'Exclamation':
													echo '<i class="fa fa-exclamation" style="color: Orange;"></i> Not sure about the answer. Something doesnt make sense.';
													break;
											case 'X':
													echo '<i class="fa fa-times" style="color: Red;"></i> The answer is not reliable.';
													break;
								}
								?>
							</card-section>
							<!-- END MCQ Status -->


                <!-- TEXT CONTENT & POST CONTENT -->
				<?php if($content != "") { ?><card-section concepttitle="Material for Answer:" style="width:100%; margin:0; margin-top: 20px;"></card-section><?php } ?>
                <?php
                the_content();
                wp_link_pages( array( 'before' => '<p><strong>' . __('Pages:', 'ipin') . '</strong>', 'after' => '</p>' ) );
                ?>

                <!-- END TEXT CONTENT & POST CONTENT -->

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
                        <!-- END TAGS & CATEGORIES -->

                    </div>

                    <div class="pull-right">
                        <time is="relative-time" datetime="<?php echo $post_time_iso8106; ?>" style="margin-right:20px;"></time>
                    <!-- <a href="" style="width:inherit;"><span style=" float:right; margin-right:11px;font-size:11px;"><i class="fa fa-heart" style="font-size:11px;"></i> 24 Shares</span></a> -->
                    <a class="comments_number" href="#comments" style="width:inherit;"><span id="comments_number"><i class="fa fa-comment"></i> <?php comments_number(__('0','ipin'), __('1', 'ipin'), __('%',' ipin')); ?></span></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- ENDPOST INFO -->

                <!-- DATE OF EXAMINATION APPEARED ON -->
                <card-section concepttitle="Examinations Appeared on:">
									<?php
									$examinations = get_field('examination');
									// check if the repeater field has rows of data
									$date = '';
									$dateisequal = true;
									if( $examinations ):
										foreach($examinations as $examination) {
											?>
													<reference-listitem
																align-items="center"
																	referencetitle="<?php echo $examination->post_title; ?>"
																	referencelink=" <?php echo $examination->guid; ?>"
																	style=" font-weight:bold; text-align:center; font-size:20px;"
															></reference-listitem>

											<?php

											$date .= $examination->post_title. ' '; // combines all dates or examination dates to one string
										}
									endif;
									?>
                </card-section>
                <!-- END DATE OF EXAMINATION APPEARED ON -->

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


               </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>

<div class="clearfix"></div>




<?php
} else {
?>
<paper-material elevation="3" align="center" style="background-color:white; display: block; text-align:center; max-width: 600px; margin: 0px auto 0px auto; padding: 10px;">
You don't have enough permissions to view the questions.
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
