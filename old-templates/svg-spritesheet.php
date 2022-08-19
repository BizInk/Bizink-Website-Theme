<script>
  // SVG spritesheet include
  var ajax = new XMLHttpRequest();
  ajax.open("GET", "<?php echo get_template_directory_uri(); ?>/dist/images/svg-sprites.svg", true);
  ajax.send();
  ajax.onload = function(e) {
    if (ajax.status !== 200) {
      return;
    }
    var div = document.createElement("div");
    div.style.display = "none";
    div.innerHTML = ajax.responseText;
    document.body.insertBefore(div, document.body.childNodes[0]);
  }
</script>
