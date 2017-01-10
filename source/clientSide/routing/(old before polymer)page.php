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



<div class="container-fluid">

    <!-- Silence is Gold. -->
    <h1 style="text-align:center; width:100%; "> <?php echo get_the_title($ID); ?>  </h1>

	<!-- Loader masonry  -->
	<div id="ajax-loader-masonry" class="ajax-loader"></div>


<!------------------------------------- "About" Section  -------------------------------------------->
<div class="horizontal-section">
	<div id="" class="brick">
   		<span> Coming Soon </span>
    </div>
	<div id="" class="brick">
   		<span> Study Material For All Dental proffessions  </span>
    </div>
</div>


<!-----------------------------------------  NAVIGATION FOR NEXT/PREVIOUS POSTS  -------------------------------------------->
	<div id="navigation">
		<ul class="pager">
			<li id="navigation-next"><?php next_posts_link(__('&laquo; Previous', 'ipin')) ?></li>
			<li id="navigation-previous"><?php previous_posts_link(__('Next &raquo;', 'ipin')) ?></li>
		</ul>
	</div>

<!-----------------------------------------  SCROLL TOP  -------------------------------------------->
	<div id="scrolltotop"><a href="#"><i class="fa fa-chevron-up"></i><br /><?php _e('Top', 'ipin'); ?></a></div>

</div>

                
<?php get_footer('start'); ?>
<?php get_footer('end'); ?>