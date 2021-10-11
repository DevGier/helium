<?php renderComponent('../app/content/pages/components/header', $data) ?>

<div class="page-title">
  <div class="row">
    <div class="col-12 mb-3">
      <h1 class="d-inline-block">Themes</h1>
    </div>
  </div>
</div>

<?php if(!empty($data['error'])): ?>
  <div class="alert alert-danger">
    <?= $data['error'] ?>
  </div>
<?php endif; ?>

<?php if(!empty($data['success'])): ?>
  <div class="alert alert-success">
    <?= $data['success'] ?>
  </div>
<?php endif; ?>

  <div class="row">
    <div class="col-md-12">
      <div class="block">
        <h5 class="mb-3">Upload theme</h5>

        <form method="post" enctype="multipart/form-data">
          <div class="custom-file">
            <input type="file" name="theme" class="custom-file-input" accept=".zip" id="customFile">
          </div>

          <button type="submit" name="uploadTheme" class="btn btn-dark mt-3">Upload theme</button>
        </form>
      </div>
    </div>
  </div>

  <form method="post">

    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h5 class="mb-3">Installed themes</h5>

          <div class="row mb-3">
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

          <button type="submit" name="submitConfig" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </form>


<?php renderComponent('../app/content/pages/components/footer', $data) ?>
