<!-- Ads -->
<?php
if(function_exists('SZN_ads'))	{
  echo SZN_ads(true, 'default', 'leaderboard', array('tablet')).SZN_ads(true, 'large', 'leaderboard', array('desktop')).SZN_ads(true, 'large', 'mobilebanner', array('mobile'));
}
?>

    <!-- Coming soon  -------------------------------------------->
    <div id="" class="horizontal-section">
    	<div id="" class="brick">
       		<span> Coming Soon - Study Material For All Dental professions. Lectures ↓ Summaries ↓ Books ↓ Questions & Answers ↓ Material  </span>
        </div>
    </div>

    <!-- Download Books NEW !  -------------------------------------------->
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


<!-- Material from google drive  -------------------------------------------->
<div style="padding: 0; margin: max-height:400px; 0; list-style: none; display: -webkit-box; display: -moz-box; display: -ms-flexbox; display: -webkit-flex; display: flex; -webkit-flex-flow: row wrap; justify-content: center; align-items: center;">
  <div style="padding: 5px; <?php if(is_mobile()) {echo 'max-';} ?>width: 600px; height:100%;  margin-top: 10px; line-height: 2px; font-weight: bold; font-size: 3em; text-align: center;">
    <div id="brick-add-case" class="brick brick-add-post " style="<?php if(is_mobile()) {echo 'max-';} ?>width:600px; padding-top:15px; padding-bottom: 15px;">
      <span style=" width: 100%; font-size:20px; font-weight: bold; padding-top: 20px; "> All The Files  </span>
      <iframe src="https://drive.google.com/embeddedfolderview?id=0B7TY-evjcgCUOWRzNlpyNjNQWEE#list" width="100%" height="" style="margin-top:10px; min-height: 400px;" frameborder="0" seamless></iframe>
    </div>
  </div>
  <div style="padding: 5px; max-width: 500px;  height:100%;  margin-top: 10px; line-height: 1.2px;font-weight: bold; font-size: 3em; text-align: center;">
    <div id="brick-add-case" class="brick brick-add-post " style="<?php if(is_mobile()) {echo 'max-';} ?>width:450px; padding-top:15px; padding-bottom: 15px;">
      <a href="https://script.google.com/macros/s/AKfycbx5bCG-9qEZysXhOeKK5yuN56gmBxmp-MpOk_ZKtKGaaYP8QLk1/exec">
      <span> <i class="fa fa-upload" style="font-size:35px;"></i>  UPLOAD FILES - Material, Lectures, Videos, Books, Anything. <br>(MAX FILE SIZE = 10 MB) </span>
      </a>
      <div id="post-author-wrapper" class="post-section-wrapper post-author masonry-meta" style="background-color:#f5f5f5;border-top: 1px solid #e5e5e5; padding-top:10px;">
          <div id="post-title-wrapper" class="post-section-wrapper" style="font-size:18px; font-weight:bold;line-height: 10px; margin-top: 15px;">
              Recent Uploads:
            </div>
        <iframe src="https://drive.google.com/embeddedfolderview?id=0B7TY-evjcgCUX2t3MlRTblJMUHM#list" width="100%" height="" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>


<!-- Study Fields   -------------------------------------------->
<title-concept
    titleconcept="Study Fields:"
    description=""
    style="margin-top: 35px; display: block;"
>
</title-concept>

<?php
  \SZN\App::insert($views['masonry']);
?>
