<!-- ALL OTHER OR ALL QUESTIONS TEMPORARY  -------------------------------------------->
<?php
	// $count = 1; DO not reset the count variable in the second loop to allow unique "collapseid" variables.
	while ($queryObjects['main']->have_posts()) :
		$queryObjects['main']->the_post(); // replace default post to custom query post

    include( \SZN\App::getFileDirectoryPath('variables','variables.php') );
        $studyfield = strip_tags(get_the_term_list( $id, 'studyfield', '', ', ', '' ));
				if(is_user_logged_in()) { $isopened = 'true'; } else { $isopened = 'false'; }

		$examinations = get_field('examination');
		// check if the repeater field has rows of data
		$date = '';
		$dateisequal = true;
		if( $examinations ):
			foreach($examinations as $examination) {
				$date .= $examination->post_title. ' ';
			}
		elseif (have_rows('date') ) :
			$x=1;
			while ( have_rows('date') ) : the_row();

			// if (get_sub_field('year') == 2014) {$dateisequal = true;}
				$dateisequal = true;
				if($x > 1) {$date .= ', ';}
				$date .= get_sub_field('year');
				$x++;
			endwhile;
		endif;
		?>



		<?php if($dateisequal == true) { ?>
            <mcq-listitem
            style =" direction: rtl;"
            titlebook="<?php echo $title; ?>"
            field="<?php echo $date; ?>"
            status="<?php echo $studyfield; ?>"
            linkbook="<?php echo $permalink; ?>"
						image=""
						isopened="<?php echo $isopened; ?>"
            collapseid="<?php echo 'collapse'.$count; ?>"
            >

	            	<div id="qstatus">
	           		<?php
								$questionstatus = get_field('questionstatus');

	                switch ($questionstatus) {
	                    case 'VV':
													echo '<iron-icon icon="icons:done-all" item-icon style="color: green;"></iron-icon>';
	                        break;
											case 'V':
	                        echo '<i class="fa fa-check" style="color: Green;"></i>';
	                        break;
	                    case 'Exclamation':
	                        echo '<i class="fa fa-exclamation" style="color: Orange;"></i>';
	                        break;
	                    case 'X':
	                        echo '<i class="fa fa-times" style="color: Red;"></i>';
	                        break;
                }
                ?>
                </div>

								<div id="is_image" style="  margin: auto;">
									<?php if($images) { ?>
									<div class="docs-homescreen-list-item-cell docs-homescreen-list-item-image" aria-label="image" style="  text-align: center;  display: block; min-width:24px;"><iron-icon icon="image:panorama" style="height: 46px;"></iron-icon></div>
									<?php } ?>
								</div>


	            	<div id="qcontent">
	                	<?php include( \SZN\App::getFileDirectoryPath('templates','mcq-archive-content.template.php') ); ?>
	            	</div>

            </mcq-listitem>
		<?php } ?>

		<?php
		// add counter
		$count++;
	endwhile;
?>
