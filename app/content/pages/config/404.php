<?php renderComponent('../app/content/pages/components/header', $data) ?>

<div class="page-title">
  <div class="row">
    <div class="col-12 mb-3">
      <h1 class="d-inline-block">Config</h1>
    </div>
  </div>
</div>


  <form method="post">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h5 class="mb-3">Custom 404</h5>
          <input type="hidden" name="CUSTOM_404_ENABLED" value="off">
          <input class="mb-3" type="checkbox" name="CUSTOM_404_ENABLED" <?php echo (CUSTOM_404_ENABLED===true) ? 'checked' : ''; ?> id="custom-404"> <label for="custom-404">Check to enable custom 404</label><br>
          <label>404 page path (relative)</label>
          <input class="form-control mb-3" type="text" name="CUSTOM_404_PATH" value="<?= CUSTOM_404_PATH ?>" placeholder="Path to 404">

          <button type="submit" name="submitConfig" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </form>


<?php renderComponent('../app/content/pages/components/footer', $data) ?>
