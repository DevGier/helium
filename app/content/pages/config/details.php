<?php renderComponent('../app/content/pages/components/header', $data) ?>

<div class="page-title">
  <div class="row">
    <div class="col-12 mb-3">
      <h1 class="d-inline-block">Details</h1>
    </div>
  </div>
</div>


  <form method="post">

    <div class="row">
      <div class="col-md-6">
        <div class="block">
          <h5 class="mb-3">General</h5>

          <label>Name</label>
          <input class="form-control mb-3" type="text" name="APP_NAME" value="<?= APP_NAME ?>" placeholder="Website name">
          <label>Description</label>
          <input class="form-control mb-3" type="text" name="APP_DESCRIPTION" value="<?= APP_DESCRIPTION ?>" placeholder="Website description">
          <label>Author</label>
          <input class="form-control mb-3" type="text" name="APP_AUTHOR" value="<?= APP_AUTHOR ?>" placeholder="Website author">
          <label>Version</label>
          <input class="form-control mb-3" type="text" name="APP_VERSION" value="<?= APP_VERSION ?>" placeholder="Website version">

          <button type="submit" name="submitConfig" class="btn btn-primary">Submit</button>
        </div>
      </div>

      <div class="col-md-6">
        <div class="block">
          <h5 class="mb-3">Site</h5>

          <label>Url</label>
          <input class="form-control mb-3" type="text" name="SITE_URL" value="<?= SITE_URL ?>" placeholder="Website URL">

          <button type="submit" name="submitConfig" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </form>


<?php renderComponent('../app/content/pages/components/footer', $data) ?>
