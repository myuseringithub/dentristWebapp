<script>
System.import('<?= \SZN\App::$locations['app']['url'] . '/styles' . '/flipEffects.css!'; ?>');
System.import('<?= \SZN\App::$locations['app']['url'] . '/javascripts' . '/masonryBrickFlipCard.js'; ?>');
</script>

<?php
/*
*  Get a field object and display it with it's value
*/
	$field_name = "question";
	$field = get_field_object($field_name);
	$title = $field['value'];
?>

<div id="post-<?php echo $id; ?>"  class="<?php foreach($post_class_flip as $value){echo $value.' ';}  // ontouchstart="this.classList.toggle('hover');" // THis is for hover on effect ?>" >
    <div class="flipper">

        <div  class="front" style=" <?php if ($title == NULL ) { echo 'padding-top: 0px;'; } ?>">
            <!-- POST CONTENT AREA  ----------------------------------------------------------->
            <a class="post-title" style="cursor: pointer;">
            <div id="post-title-wrapper" class="post-section-wrapper">
                <?php  echo $title; ?>
            </div>
            </a>




			<div class="post-option-answers">
			<?php
            if( have_rows('answer') || have_rows('answers') ):
			/*
			*  Loop through a Repeater field
			*/
				// Order number
				$x = 1;
				// loop through the rows of data
				while ( have_rows('answer') ) : the_row();
                        echo $x . '. '. get_sub_field('answer');
						echo '<br>';
						$x ++; // increase order num
				endwhile;
			else :
			endif; ?>
			</div>

            <!-- AUTHOR OF POST  -------------------------------------------------------------->
            <div id="post-author-wrapper" class="post-section-wrapper post-author masonry-meta<?php  if ($comments_number == 0 && $show_avatars == '0') { echo ' text-align-center'; } ?>">
            <?php
			include ( \SZN\App::getFileDirectoryPath('codeblocks','masonry-post-section-author.codeblock.php') );
			?>
            </div>
        </div>

        <div class="back">
        	<div class="post-option-answers">
			<?php // Show Correct Answers
            if( have_rows('answer') || have_rows('answers')):
			/*
			*  Loop through a Repeater field
			*/
				// Order number
				$x = 1;
				// loop through the rows of data
				while ( have_rows('answer') ) : the_row();
                        if (get_sub_field('correct_answer')) {
						echo '<br /><br />'. $x . '. '. get_sub_field('answer');
						}
						$x ++; // increase order num
				endwhile;

			elseif (get_field('answer')): {
				echo get_field('answer');
			}

			endif; ?>
            </div>
        </div>
    </div>
</div>
