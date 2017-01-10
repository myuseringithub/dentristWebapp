<?php // TESTING !!!!!
		//echo 'Testing: ';
		//var_dump ( SZN_get_json( 'http://dentrist.com/wp-json/pages/'. $id )->acf->image_gallery[0]->sizes->large );
?>

<!-- Ads -->
<?php
if(function_exists('SZN_ads'))	{
	echo SZN_ads(true, 'default', 'leaderboard', array('tablet')).SZN_ads(true, 'large', 'leaderboard', array('desktop')).SZN_ads(true, 'large', 'mobilebanner', array('mobile'));
}
?>


<div class="container-fluid">

	<!-- Loader masonry
	<div id="ajax-loader-masonry" class="ajax-loader"></div>
	-->

<!-- Horizontal Section  -------------------------------------------->
<div id="" class="horizontal-section">
	<div id="" class="brick">
   		<span> Coming Soon - Study Material For All Dental professions. Lectures ↓ Summaries ↓ Books ↓ Questions & Answers ↓ Material  </span>
    </div>
</div>

<div class="clearfix"></div>

<div id="" class="horizontal-section">
	<a href="http://dentrist.com/book/">

	<div id="" class="brick" >
   		<span style="font-size:20px; font-weight:bold; display:block; width:100%;padding-left: 12px; padding-top:5px;">
        	<br />
        	Download Dental Books
        	<br />
        	<br />

        </span>

        <!-- IMG AREA  -------------------------------------------------------------------->
        <div id="thumb-post-section" class="thumb-holder" style="position: absolute; left: -6px; top: -36px;">
            <!-- Secondary image  -  for Multiple Post Thumbnails plugin -->
            <div class="image-single-wrap" id="wrapper" style="background-image:url(http://dentrist.com/wp-content/uploads/2014/11/shutterstock_23210365.png); height: 125px; width: 64px;"> </div>
            <!-- FEATURED IMAGE -------------------------------------------->
        </div>

    </div>
	</a>

</div>


<!-- Horizontal Section  -------------------------------------------->
<!--
<div id="study-material" class="horizontal-section">
    <div id="" class="brick brick-link">
    	<a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUR3I0bXlIQlJ1UE0&usp=sharing" title="">
   		<span> USMF University - Chisinau </span>
        <div align="center"><img align="center" src="https://sites.google.com/site/myuseringsites/main/Google%20drive.jpg" style="border:5px solid white;border-top-left-radius:6px;border-top-right-radius:6px;border-bottom-right-radius:6px;border-bottom-left-radius:6px;display:block;margin-right:auto;margin-left:auto"></font></div>
        </a>
    </div>
    <div id="" class="brick brick-link">
    	<a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUeHpONjBfM1lTN0txck5jM1Z2TlA1dw&usp=sharing" title="">
   		<span> The University of Jordan - Jordan </span>
        </a>
    </div>
    <div id="" class="brick brick-link">
    	<a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUQjhTSkdvYWZYcFE&usp=sharing" title="">
   		<span> Hebrew University of Jerusalem</span>
        </a>
    </div>
    <div id="" class="brick brick-link">
    	<a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUbEIzdUV6aUh1Q3M&usp=sharing" title="">
   		<span> Baghdad Dental University  </span>
        </a>
    </div>
    <div id="" class="brick brick-link">
    	<a href="https://drive.google.com/folderview?id=0B7TY-evjcgCUNVRVY3hrbEEtNXc&usp=sharing" title="">
   		<span> Other Study Material </span>
        </a>
    </div>
</div>
-->


<div id="" class="horizontal-section">
	<div id="frame-google-drive" class="brick">
   		<span style=" width: 100%; font-size:20px; font-weight: bold; padding-top: 10px; display:inline-block;"> All The Files  </span>
        <iframe src="https://drive.google.com/embeddedfolderview?id=0B7TY-evjcgCUOWRzNlpyNjNQWEE#list" width="100%" height="" style="margin-top:10px; min-height: 400px;" frameborder="0" seamless></iframe>
    </div>
</div>
