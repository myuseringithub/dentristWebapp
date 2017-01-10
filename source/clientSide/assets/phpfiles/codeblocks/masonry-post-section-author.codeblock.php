
	<?php if ($show_avatars == '1') { ?>
        <div id="post-author-right" onclick="location.href='<?php if($post_type == 'sc-questions' || $post_type == 'mc-questions' || $post_type == 'open-question') { echo 'http://dentrist.com/quize/' ; } else {echo $archive_link; } ?>';" style="cursor:pointer;">
            <div id="post-type">
                <!--  Check type and echo accordingly color:  -->
                <?php if ($type == 'entertainment') { ?>
                    <i class="fa fa-puzzle-piece"></i>
                <?php } elseif ($type == '2') {?>
                    <i class="fa fa-tasks "></i>
                <?php } elseif ($type == 'post') {?>
                    <i class="fa fa-thumb-tack"></i>
                <?php } elseif ($type == 'article') {?>
                    <i class="fa fa-file-text"></i>
                <?php } elseif ($type == 'question') {?>
                    <i class="fa fa-question-circle"></i>
                <?php } elseif ($type == '4') {?>
                    <i class="fa fa-bullhorn fa-flip-horizontal"></i>
                <?php } elseif ($type == 'case') {?>
                    <i class="fa fa-suitcase"></i>
                <?php } elseif ($type == 'open-question' || $type =='sc-questions' || $type =='mc-questions') {?>
                    <i class="fa fa-check-circle"></i>
                <?php } ?>
            </div>
        </div>

        <div id="post-author-seperator"></div>

        <div id="post-author-left" onclick="location.href='<?php echo $author_url; ?>';" style="cursor:pointer;">
            <div id="post-author-avatar">
                <a href="<?php echo $author_url; ?>" title=" <?php echo $author; ?> ">
                <?php echo $avatar; ?>
                </a>
            </div>
        <?php } ?>
            <div id="post-author-name">
                <!-- link author name to author archive page -->
                <a href="<?php echo $author_url; ?>" title=" <?php echo $author; ?> " style="font-style:normal; line-height:13px; font-size: 11px; color: #717171; font-weight: bold;">
                <?php echo $author_dispay_name; ?>
                </a>
            </div>
            <br />
            <div id="post-time" class="" style="font-size:10px; display: block; float: left; color: #999999; margin-left: 5px;">
            	<i class=" fa fa-clock-o"></i>
            	<time is="relative-time" datetime="<?php echo $post_time_iso8106; ?>"  style="font-size:10px; color: #999999;"></time>
            </div>
       </div>
<?php //if ($show_avatars == '1') { ?>
<?php //} ?>
