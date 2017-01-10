<div id="navigation-between-posts" style="display: inline-block; visibility:visible; width:99%;">
        <div class="next-wrapper next">
            <?php next_post_link('%link', '<i class="fa fa-angle-left" style="font-size:38px;color: #CCC;"></i>'); ?>
        </div>
        <div id="brick-next-post" >
        <?php



        $adjacent_post = get_adjacent_post(false,'',false) ;
        $next_post_id = $adjacent_post->ID;

            $args = array(
            'p' => $next_post_id, // id of a page, post, or custom type
            'posts_per_page' => 1,

            'post_type' => array('case', 'article', 'question', 'entertainment', 'book')

            );
            $next_post_query = new WP_Query($args);


            // The Loop...
            while ($next_post_query->have_posts()) :

                // replace default post to custom query post
                $next_post_query->the_post();

                // Post query all VARIABLES
                include ( SZN_template_directory('query','variables.php') );


                if ($singlepage_main_post_id != $id) {
                    // choose Brick
                    include ( SZN_template_directory('section','masonry-bricks.php') );

                }
            endwhile;
            // Restore original Post Data
            wp_reset_postdata();
        ?>
        </div>
        <div class="previous-wrapper previous">
            <?php previous_post_link('%link', '<i class="fa fa-angle-right" style="font-size:38px;color: #CCC;"></i>'); ?>
        </div>
        <div id="brick-previous-post">
        <?php
        $singlepage_main_post_id = get_the_ID();

        $previous_post = get_previous_post();
        $previous_post_id = $previous_post->ID;

            $args = array(
            'p' => $previous_post_id, // id of a page, post, or custom type
            'posts_per_page' => 1,

            'post_type' => array('case', 'article', 'question', 'entertainment','book')

            );
            $previous_post_query = new WP_Query($args);


            // The Loop...
            while ($previous_post_query->have_posts()) :

                // replace default post to custom query post
                $previous_post_query->the_post();

                // Post query all VARIABLES
                include ( SZN_template_directory('query','variables.php') );

                if ($singlepage_main_post_id != $id) {
                    // choose Brick
                    include ( SZN_template_directory('section','masonry-bricks.php') );

                }
            endwhile;
            // Restore original Post Data
            wp_reset_postdata();
        ?>
        </div>

</div>
