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
      <div class="col-md-6 mb-2">
        <div class="block">
          <h5 class="mb-3">Application/website details</h5>

          <input class="form-control mb-3" type="text" name="APP_NAME" value="<?= APP_NAME ?>" placeholder="Website name">
          <input class="form-control mb-3" type="text" name="APP_AUTHOR" value="<?= APP_AUTHOR ?>" placeholder="Website author">
          <input class="form-control mb-3" type="text" name="APP_VERSION" value="<?= APP_VERSION ?>" placeholder="Website version">
          <input class="form-control mb-3" type="text" name="APP_DESCRIPTION" value="<?= APP_DESCRIPTION ?>" placeholder="Website description">
        </div>
      </div>

      <div class="col-md-12 mb-2">
        <div class="block">
          <h5 class="mb-3">Installed themes</h5>

          <div class="row">
            <?php foreach ($data['themeFiles'] as $theme): ?>
              <div class="col-3">
                <div class="border bg-light rounded p-3">
                  <img src="<?= $theme['image'] ?>" class="w-100">
                  <div class="my-3">
                    <b><?= $theme['title'] ?></b>
                  </div>
                  <input type="radio" class="btn-check" name="THEME_NAME"  id="theme<?= $theme['key'] ?>" value="<?= $theme['dirname'] ?>" <?php if($theme['dirname'] == THEME_NAME){ echo 'checked'; } ?>>
                  <label class="btn btn-primary" for="theme<?= $theme['key'] ?>"><?php if($theme['dirname'] == THEME_NAME){ echo 'Active'; }else{ echo 'Select'; } ?></label>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-2">
        <div class="block">
          <h5 class="mb-3">Passwords</h5>
          <input class="form-control mb-3" type="text" name="SALT" value="<?= SALT ?>" placeholder="Password salt">
          <input class="form-control mb-3" type="text" name="HASH" value="<?= HASH ?>" placeholder="Password hash type">
        </div>

      </div>

      <div class="col-md-6 mb-2">
        <div class="block">
          <h5 class="mb-3">Custom 404</h5>
          <input class="mb-3" type="checkbox" name="CUSTOM_404_ENABLED" <?php echo (CUSTOM_404_ENABLED===true) ? 'checked' : ''; ?> id="custom-404"> <label for="custom-404">Custom 404</label>
          <input class="form-control mb-3" type="text" name="CUSTOM_404_PATH" value="<?= CUSTOM_404_PATH ?>" placeholder="Path to 404">
        </div>
      </div>

      <div class="col-md-6 mb-2">
        <div class="block">
          <h5 class="mb-3">Maintenance mode</h5>
          <input class="mb-3" type="checkbox" name="CUSTOM_404_ENABLED" <?php echo (MAINTENANCE===true) ? 'checked' : ''; ?> id="maintenance"> <label for="maintenance">Maintenance mode</label>
        </div>
      </div>

      <div class="col-md-6 mb-2">
        <div class="block">
          <h5 class="mb-3">Helium CMS</h5>
          <input class="mb-3" type="checkbox" name="CMS" <?php echo (CMS===true) ? 'checked' : ''; ?> id="cms"> <label for="cms">Content Management System</label><br>
          <small style="font-size: 12px;">DO NOT CHANGE THIS VALUE IF YOU WANT TO CONTINUE TO USE THE CMS</small>
        </div>
      </div>

      <div class="col-md-12">
        <button type="submit" name="submitConfig" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>


<?php renderComponent('../app/content/pages/components/footer', $data) ?>
