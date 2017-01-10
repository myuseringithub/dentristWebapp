<?php get_header('start'); ?>

<style is="custom-style">


/* paper-drawer-panel id="paperDrawerPanel" ---------------------------------------- */

	  #paperDrawerPanel [main] {
		background-color: var(--google-grey-100);
	  }
	
	  #paperDrawerPanel [drawer] {
		border-right: 1px solid var(--google-grey-300);
	  }
	
	  #paperDrawerPanel[right-drawer] [drawer] {
		border-left: 1px solid var(--google-grey-300);
	  }
	
	  paper-button {
		color: white;
		margin: 10px;
		background-color: var(--google-blue-700);
		white-space: nowrap;
	  }

/* Paper Scroll Header Panel ---------------------------------------- */
	
    paper-scroll-header-panel {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-color: var(--paper-grey-200, #eee);

      /* background for toolbar when it is at its full size */
      --paper-scroll-header-panel-full-header: {
        background-image: url(http://www.willowspringslv.com/images/dentist_in_las_vegas.jpg);
      };

      /* background for toolbar when it is condensed */
      --paper-scroll-header-panel-condensed-header: {
        background-color: var(--paper-deep-orange-500, #ff5722);
      };
    }

    paper-toolbar {
      background-color: transparent;
    }

    paper-toolbar .title {
      font-size: 40px;
      margin-left: 60px;
    }

    paper-toolbar iron-icon {
      margin: 0 8px;
    }

    .content {
      padding: 8px;
    }
/* ---------------------------------------------- */

.branding-heading {
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-flex;
  display: -ms-flexbox;
  display: -o-flex;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -moz-align-items: center;
  -ms-align-items: center;
  -o-align-items: center;
  align-items: center;
  height: 80px;
  padding-left: 24px;
}

.left-sidebar iron-icon {
	margin: 0 16px 0 4px;		
}

paper-icon-item {
	 cursor:pointer;	
}
paper-icon-item:hover {
	background-color: #F4F4F4;
}


</style>



<?php get_header('end'); ?>

<!-- SECONDARY TOP MENU -->
<?php // echo SZN_template_includer('section/navigation','top-secondary-navigation.php');	?>

<div class="container-fluid">

    <!-- TITLE -->
    <title-concept
    	titleconcept="<?php post_type_archive_title(); ?>"
        description=""
    >
    </title-concept>


    <!-----------------------------------------  AUTHOR ARCHIVE PAGE  -------------------------------------------->
        <?php
        // Echo author information on the top of author archive pages, using the plugin "wp-about-author" functions.
        if ( is_author() ) {/* If this is an author archive */
                //echo '<div align="center" style="margin:auto; margin-top: -6px;"><h3 class="pagetitle">Posts by Author'; 
                //echo $author->display_name;
                //echo '</h3> </div><br>'; 
            if(function_exists('wp_about_author_display')){
                $for_feed = false;
                echo '<div id="author-box" style="max-width: 800px; margin: auto; margin-bottom: 0; margin-top:-15px; border-radius:120px;overflow:hidden;">';
                echo wp_about_author_display();
                echo '</div>';
            } else {
                echo ""; // deat there is no function !!
            } 
        }
        ?>
    
    
    <!------------------------------------- Masonry Posts Area  -------------------------------------------->
	<?php echo SZN_template_processor('query-archive','masonry', array('mobile','desktop','tablet')); ?> 

    <!-- SCROLL TO TOP  -->
    <scroll-top></scroll-top>

</div>


                
<?php get_footer('start'); ?>
<?php get_footer('end'); ?>