<div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-bookDemo">

    <div class="formPanel">

      <h2 class="formPanel_heading">
        <?php 
          $form = GFAPI::get_form( 1 );
          echo $form['title'];
        ?>
      </h2><!-- /.formPanel_heading -->

      <div class="formPanel_body">
        <?php gravity_form( 1, false, false, false, null, true, 20 ); ?>
      </div><!-- /.formPanel_body -->

    </div><!-- /.formPanel -->

  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

