<script>
// Scroling dialog
  function clickHandler(e) {
    var button = e.target;
    while (!button.hasAttribute('data-dialog') && button !== document.body) {
      button = button.parentElement;
    }

    if (!button.hasAttribute('data-dialog')) {
      return;
    }

    var id = button.getAttribute('data-dialog');
    var dialog = document.getElementById(id);
    if (dialog) {
      dialog.open();
    }
  }
</script>
<script>
// iron-collapse open toggle
  function clickHandlerCollapse(e) {
    var button = e.target;
    while (!button.hasAttribute('data-collapse') && button !== document.body) {
      button = button.parentElement;
    }

    if (!button.hasAttribute('data-collapse')) {
      return;
    }

    var id = button.getAttribute('data-collapse'); // ironcollapse
    var els = document.querySelectorAll('iron-collapse');

    for (var i=0; i < els.length; i++) {
        els[i].hasAttribute("opened")  ? els[i].removeAttribute("opened") : els[i].setAttribute("opened", "true");
    }
  }
</script>
<!-- <script src="<?= \SZN\App::$locations['app']['url'] . '/' . 'javascripts' . '/' . 'service-worker-registration.js'; ?>"></script> -->
