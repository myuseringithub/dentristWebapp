<div class="container-fluid">
	<?php
	// echo SZN_template_processor('query-examination','archive-examination-mcqlist', array('mobile','desktop','tablet'));
	?>
	<?php
	if($data['QueryExamination']['queryObject']) {
		while ($data['QueryExamination']['queryObject']->have_posts()) : $data['QueryExamination']['queryObject']->the_post();
			include( \SZN\App::getFileDirectoryPath('variables','variables.php') );
		  echo '<pre>';
		  echo $title;
			$examination_id = $id;
					if($data['QueryMCQ']['queryObject']) {
						while ($data['QueryMCQ']['queryObject']->have_posts()) : $data['QueryMCQ']['queryObject']->the_post();
							include( \SZN\App::getFileDirectoryPath('variables','variables.php') );

							$dateisequal = false;
							$examinations = get_field('examination');
							foreach($examinations as $examination) {
								if ($examination_id == $examination->ID) {
									$dateisequal = true;
								}
							}
							if($dateisequal == true) {
							  echo '<pre>';
							  echo $title;
							  echo '</pre>';
							}
						endwhile;
					}
		  echo '</pre>';
		endwhile;
	} else {
		echo '!Data';
	}

		?>
</div>
