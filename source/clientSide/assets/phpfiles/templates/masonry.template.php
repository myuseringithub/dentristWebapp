<script>
System.import("<?= \SZN\App::$locations['app']['url'] . '/styles' . '/masonry.css!'; ?>");
System.import("<?= \SZN\App::$locations['app']['url'] . '/styles' . '/loader.css!'; ?>");
System.import("<?= \SZN\App::$locations['app']['url'] . '/javascripts' . '/masonry.js'; ?>");
</script>

<!-- Masonry LOADER ------------------------------------------->
<div id="ajax-loader-masonry" class="ajax-loader"><!-- Loader masonry  --><center><paper-spinner active></paper-spinner><br /><a href="javascript:location.reload(true);">Refresh</a></center></div>

<!-- MASONRY - ALL POSTS ------------------------------------------->
<div id="masonry" class="masonry">
	<?php
	$count = 1;
	if($data['main']['queryObject']) {
		while ($data['main']['queryObject']->have_posts()) :
				$data['main']['queryObject']->the_post(); // replace default post to custom query post

				include( \SZN\App::getFileDirectoryPath('variables','variables.php') );

				if (($count % 16 == 0  || $count == 2)  && $type != 'case' && $type != 'examination' ) {
				?>
		        <div id="ads-masonry-brick" class="thumb brick" style="a">
		        <center>
		        <!-- Ads -->
		        <?php if(function_exists('SZN_ads'))	echo SZN_ads(true, 'small', 'square', array('tablet','desktop','mobile')); ?>
		        </center>
		        </div>

				<?php
				}

				// choose Brick - Check post type to match brick type
				// if not Quize type
				if(( ($post_type == "question") || ($post_type == "open-questin") || ($post_type == "sc-questions") || ($post_type == "mc-questions") )) {
					include ( \SZN\App::getFileDirectoryPath('templates','masonry-brick-flip.template.php') );
				} elseif ( $post_type == "studyfield") {
					include ( \SZN\App::getFileDirectoryPath('templates','masonry-brick-parentchildlist.template.php') );
				} else {
					include ( \SZN\App::getFileDirectoryPath('templates','masonry-brick-default.template.php') );
				}

				//add counter
				$count++;
		endwhile;
	} else {
		echo 'Data does not exist !';
	}
    ?>
</div>

<!-- INFINITE SCROLL - NAVIGATION FOR NEXT/PREVIOUS POSTS ------------------------------------------->
<?php // include( \SZN\App::getFileDirectoryPath('codeblocks','pager-infinitescroll.codeblock.php') ); ?>
