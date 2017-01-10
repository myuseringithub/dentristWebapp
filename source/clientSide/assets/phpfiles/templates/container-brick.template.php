<?php
// The Loop...
while ($queryObjects['main']->have_posts()) :
$queryObjects['main']->the_post();
include( \SZN\App::getFileDirectoryPath('variables','variables.php') );
?>

	<div id="" class="horizontal-section">
	<a href="<?php echo $permalink; ?>">
        <div id="" class="brick">
            <span style="font-size:20px; font-weight:bold; display:block; width:100%; background-color:black; color:white;">
                <br>
                <?php echo $title;?>
                <br>
                <br>
            </span>
        </div>
	</a>

    </div>

    <?php
	// $GLOBALS['term_id'] = get_the_ID();
	echo get_the_ID();
	// echo SZN_template_processor('query-studyfield-childterm-recentpostsinterm','masonry', array('mobile','desktop','tablet'));
	?>


	<?php

	//echo get_the_ID();
	//echo count(get_pages('child_of='.get_the_ID()));
	//$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
	//echo $children;

	// FOR SUB CHILDREN - execute in both cases if there are children or not, and the template processor will echo if query retreives posts.
	$GLOBALS['parent_id'] = get_the_ID();
	// echo SZN_template_processor('studyfield-childrenofparentid-query','section-container-brick', array('mobile','desktop','tablet'));
	?>


<?php
endwhile;
?>
