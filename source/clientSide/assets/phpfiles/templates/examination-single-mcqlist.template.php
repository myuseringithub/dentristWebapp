
<template is="dom-bind">
  <div class="middle">
    <paper-tabs class="bottom self-end" selected="{{selected}}" style=" background-color:#4285f4; color:white; -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.08); -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.08); box-shadow: 0 1px 3px rgba(0,0,0,0.08); border-radius: 3px;" >
      <?php
      while ($data['main']['queryObject']->have_posts()) : $data['main']['queryObject']->the_post();
      include( \SZN\App::getFileDirectoryPath('variables','variables.php') );
      if($examination_id == $id) {
      ?>
        <paper-tab><?php echo $title; ?></paper-tab>
      <?php
      }
      endwhile;
      ?>
    </paper-tabs>
  </div>
  <div class="bottom" style="">
    <iron-pages selected="{{selected}}">
      <?php
      while ($data['main']['queryObject']->have_posts()) : $data['main']['queryObject']->the_post();
      include( \SZN\App::getFileDirectoryPath('variables','variables.php') );
      if($examination_id == $id) {
      ?>
      <div>
        <?php
        \SZN\App::insert($views['pagemcqlist']);
        ?>
      </div>
      <?php
      }
      endwhile;

      ?>


    </iron-pages>
  </div>
</template>
<script>
  document.addEventListener('WebComponentsReady', function () {
    var template = document.querySelector('template[is="dom-bind"]');
    template.selected = 0; // selected is an index by default
  });
</script>
