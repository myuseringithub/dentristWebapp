<!-- Examinations -->
    <card-section concepttitle="Examinations available in Dentrist's database :" style="max-width: 500px; margin:auto; margin-top:25px;">

      <a href="http://dentrist.com/mcq/">
      <div id="" class="brick" >
          <span style="font-size:18px; font-weight:bold; display:block; width:100%;padding-left: 12px; padding-top:5px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.32);">
              <br />
              All Examinations' Questions
              <br />
              <br />
            </span>
            <paper-ripple recenters></paper-ripple>
        </div>
      </a>

    <?php
          // Order number
          $x = 1;
          // loop through the rows of data
          while ($data['main']['queryObject']->have_posts()) : $data['main']['queryObject']->the_post();
          include( \SZN\App::getFileDirectoryPath('variables','variables.php') );

              ?>

              <reference-listitem
                      referencetitle="<?php echo '' . $title; ?>"
                      referencelink=" <?php echo $permalink; ?>"
                  ></reference-listitem>

              <?php
                  $x ++; // increase order num
          endwhile;

    ?>
    </card-section>
<!-- END Examinations -->
