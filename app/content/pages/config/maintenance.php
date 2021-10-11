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
          <h5 class="mb-3">Maintenance mode</h5>
          <input type="hidden" name="MAINTENANCE" value="off">
          <div><input type="checkbox" name="MAINTENANCE" <?php echo (MAINTENANCE===true) ? 'checked' : ''; ?> id="maintenance"> <label for="maintenance">Maintenance mode</label></div>

          <button type="submit" name="submitConfig" class="btn btn-primary mt-3">Submit</button>
        </div>
      </div>
    </div>
  </form>


<?php renderComponent('../app/content/pages/components/footer', $data) ?>
