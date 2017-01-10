


<card-section
    concepttitle="Dental books of different fields :"
    style=" text-decoration: none;"
>
<div id="thumb-post-section" class="thumb-holder" style=" margin-bottom:15px;  text-decoration: none;">


<!-- POSTS LOOP  -------------------------------------------->
<?php
	$count = 1;
if($data['main']['queryObject']) {
	while ($data['main']['queryObject']->have_posts()) :
		$data['main']['queryObject']->the_post(); // replace default post to custom query post


    include( \SZN\App::getFileDirectoryPath('variables','variables.php') ); // Post query all VARIABLES
    $studyfield = strip_tags(get_the_term_list( $id, 'studyfield', '', ', ', '' ));

		?>


        <!-- IMG AREA  -------------------------------------------------------------------->
              <!-- Secondary image  -  for Multiple Post Thumbnails plugin-->

    			<list-item
                	titlebook="<?php echo $title; ?>"
                    field="<?php echo $studyfield; ?>"
                    status="<?php echo $content_notags; ?>"
                    linkbook="<?php echo $permalink; ?>"
    			></list-item>




        <!-- FEATURED IMAGE -------------------------------------------->





		<?php
		// add counter
		$count++;
	endwhile;
}
?>



  <!-- POST CONTENT AREA  ----------------------------------------------------------->
  <div class="brick-content-section">
  </div>
</div>


</card-section>
