
<card-concept
	id="post-<?php echo $id;  ?>"
    class="<?php foreach($post_class as $value){echo $value.' ';}  ?>"
	style=" <?php if ($title == NULL ) { echo 'padding-top: 0px;'; } ?>"
	concepttitle="<?php  echo $title; ?>" content="<?php  echo strip_tags($content); ?>"
    backgroundimageurl="<?php  echo $post_thumb_url; ?>"
    url="<?php echo $permalink; ?>"
	>

	<!-- IMG AREA  -------------------------------------------------------------------->
	<div id="thumb-post-section" class="thumb-holder">
	<?php
	include ( \SZN\App::getFileDirectoryPath('codeblocks','masonry-post-section-thumb.codeblock.php') );
	?>

	</div>

	<!-- TITLE OF POST  -------------------------------------------------------------->
	<div id="post-author-wrapper" class="post-section-wrapper post-author masonry-meta<?php  if ($comments_number == 0 && $show_avatars == '0') { echo ' text-align-center'; } ?>">

        <!-- CAUTION DO NOT DELETE TILL ABSOLUTELY SURE NO ERROR IS PRODUCED
        <div style=" display: none;"><?php echo $avatar; //not including this produces a problem for some reason !!!!!!!!!!?></div>
        -->
        <?php

		$GLOBALS['parent_id'] = get_the_ID();
		\SZN\App::insert($views['sublist']);

		//include ( TemplateSystem::getFileDirectoryPath('templates','masonry-brick-title-section.template.php') );
        ?>
	</div>


</card-concept>
