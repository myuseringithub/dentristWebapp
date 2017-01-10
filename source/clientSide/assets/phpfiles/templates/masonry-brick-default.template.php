
<div id="post-<?php echo $id;  ?>" class="<?php foreach($post_class as $value){echo $value.' ';}  ?>" style=" <?php if ($title == NULL ) { echo 'padding-top: 0px;'; } ?>">

	<!-- IMG AREA  -------------------------------------------------------------------->
	<div id="thumb-post-section" class="thumb-holder">
	<?php
	include ( \SZN\App::getFileDirectoryPath('codeblocks','masonry-post-section-thumb.codeblock.php') );
	?>

	</div>

	<!-- POST CONTENT AREA  ----------------------------------------------------------->
	<?php if($content != "") { ?>
	<div id="post-content-wrapper" class="post-section-wrapper" >
		<!-- Echo Content-->
	</div>
	<?php }?>

	<!-- TITLE of post - post only if there is a value -->
	<?php // if ($title != NULL ) { echo ' <div class="thumbtitle" align="center"><span>' . $title . '</span></div>';} ?>
	<!-- Title  ----------------------------------------------------------->
	<a href="<?php echo $permalink; ?>">
	<div id="post-title-wrapper" class="post-section-wrapper">
		<span><?php  echo $title; ?><span>
	</div>
	</a>

    <?php if ($post_type != 'book') {?>
	<!-- AUTHOR OF POST  -------------------------------------------------------------->
	<div id="post-author-wrapper" class="post-section-wrapper post-author masonry-meta<?php  if ($comments_number == 0 && $show_avatars == '0') { echo ' text-align-center'; } ?>">
	<?php
	include ( \SZN\App::getFileDirectoryPath('codeblocks','masonry-post-section-author.codeblock.php') );
	?>
	</div>
    <?php } ?>

	<?php if ($post_type == 'book') {?>
    <div class="brick-content-section">
		<?php
		$content = get_the_content('Read more');
        echo $content;
		?>
	</div>
    <?php } ?>


</div>
