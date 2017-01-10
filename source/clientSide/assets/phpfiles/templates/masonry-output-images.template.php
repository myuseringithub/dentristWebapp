<script>
System.import("<?= \SZN\App::$locations['app']['url'] . '/javascripts' . '/brick-responsiveslides.js'; ?>");
</script>

<?php
global $post;

include( \SZN\App::getFileDirectoryPath('variables','variables.php') );

$ul_slider_height = 200;
$brick_ratio = $ul_slider_height / $brickwidth; //Brick_ratio variable is the width of Brick and Height of Slider container
if(is_single($post)) {
	$images_template = 'sequence'; // slider (http://responsiveslides.com/), sequence
} else {
	$images_template = 'slider'; // slider (http://responsiveslides.com/), sequence
}
?>

<?php
if(!function_exists('CompareBrickImageRatio')) {
	// Comparing Brick Ratio to Image Ratio - Returns True/False for Width or Height; = 100%
	function CompareBrickImageRatio($brick_ratio, $image_ratio){
		//NOTE: Brick_ratio variable is the width of Brick and Height of Slider container
		if($brick_ratio > 1) { // Brick is wider
			if($brick_ratio > $image_ratio) { // image wider than Brick
					return false; // Image(H) = 100%
			} else { // Brick wider than image (or equal)
					return true; // Image(W) = 100%
			}
		} else { // Brick is taller (or equal)
			if($brick_ratio > $image_ratio) { // Brick taller than Image
				return false;
			} else { // Image taller than Brick (or equal)
				return true;
			}
		}
	}
}
 ?>


<?php
// ACF image gallery - echo into FancyBox js gallery
if( $images ):
$i = 0;
?>
	<?php if ($images_template == 'slider' && !($imagesnumber <2)) { ?>
    <ul class="rslides rslides<?php echo $id; ?> " style="height:<?php echo $ul_slider_height; ?>px;">
    <?php }?>


<?php // LOOP - Start Loop to print images

foreach ( $images as $image ) :

// image-gallery field variables
include( \SZN\App::getFileDirectoryPath('variables','acf-images-gallery.variables.php') );


	// To change images to fixed height so will be affecting the position of the posts / bricks.
	$imgwidth = $image_medium_width; // Image true width
	$imgheight = $image_medium_height; // Image true height
	/*
	Conclusions:
	- if H/W > 1   -->   is wider
	- if H/W < 1   -->   is taller

	If : Brick(H/W) > 1 	-->	is wider
	- Case: Brick(H/W) > Image(H/W)		-->		Image wider than Brick		--> Image(H) = 100%
	- Case: Brick(H/W) < Image(H/W)		--> 	Brick wider than Image		--> Image(W) = 100%
	If : Brick(H/W) < 1		--> is taller
	- Case: Brick(H/W) > Image(H/W)		--> 	Brick taller than Image		-->	Image(H) = 100%
	- Case: Brick(H/W) < Image(H/W)		--> 	Image taller than Brick		--> Image(W) = 100%

	*/
	$hwratio = $imgheight/$imgwidth; // Image true H/W ratio
	$bimgheight = round($hwratio*$brickwidth);  // CALCULATE Height of fitted background image. Htrue/Wtrue = Hfit/Wfit, so the image fits exactly.
	$bimgwidth =  $maximizedimgdiv / $hwratio ;
	// $divhwratio  = round ($maximizedimgdiv / $divwidth);

	//For preventing thumb dislocation when only one image present & making the thumb fit img
	if ($imagesnumber <2) {
		// ONE IMAGE - Fixed height of image wrapper to show full extent, the divheight = bimgheight (processed imgheight to be applied with fixed width of div = brickwidth) ?>

		<div class="image-single-wrap" id="wrapper" style="background-image:url(<?php echo $image_url; ?>); height: <?php echo $bimgheight;?>px;"> </div>
	<?php } elseif ($images_template == 'sequence') { ?>
            <div class="image-wrap" id="wrapper" style="background-image:url(<?php echo $image_url; ?>);
            <?php // Check if fitted height to the specified width is larger than the predefined height to show (maximizedimgdiv)
            if ($bimgheight < $maximizedimgdiv) {echo 'background-size: '.$bimgwidth.'px auto;';} ?>">
            </div>
	<?php } elseif ($images_template == 'slider') {?>
		<li >
            <div class="image-slider-wrapper" id="wrapper" style="background-image:url(<?php echo $image_url; ?>); height:<?php echo $ul_slider_height; ?>px;
            <?php // Check if fitted height to the specified width is larger than the predefined height to show (maximizedimgdiv)
			if(CompareBrickImageRatio( $brick_ratio , $hwratio))
				 {echo 'background-size: '.'100%'.' auto;';}
			else {echo 'background-size: '.'auto'.' 100% ;';}
			?>">
            </div>


           	<?php /* For <img> TAG option
			if ($imgheight > $imgwidth) { $img_height = 'initial'; $img_width = '100%'; } else { $img_height = '100%'; $img_width = 'initial'; }
            echo '<li class="tr"><img class="tr" style="width:'. $img_width .'; height:'. $img_height .';';
			echo '" src="'.$image_url.'" alt="'.$alt.'" /></li>';
			*/



			?>



		</li>
     <?php  } ?>





<?php
$i++;
endforeach;
?>

	<?php if ($images_template == 'slider' && !($imagesnumber <2)) { ?>
    </ul>

    <?php }?>

<?php
endif;
?>
