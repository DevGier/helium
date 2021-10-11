<?php renderComponent('../app/content/pages/components/header', $data) ?>

<form method="post">
  <div class="row">
    <div class="col-12">
      <?php if(!empty($data['error'])): ?>
        <div class="alert alert-danger">
          <?= $data['error'] ?>
        </div>
      <?php endif; ?>

      <?php if(empty($data['error']) && isset($_POST['edit'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Configuration file updated</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="fas fa-times text-white"></i>
          </button>
        </div>
      <?php endif; ?>

      <div class="input-group">
        <input type="hidden" name="config_name" class="form-control d-none" placeholder="Configuration file name" value="<?= $data['config'] ?>">
        <input type="text" name="config_name" class="form-control" placeholder="Configuration file name" value="<?= $data['config'] ?>" disabled>
        <div class="input-group-append ms-3">
          <button class="btn btn-primary" type="submit" name="edit" id="edit">Save</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12">
      <textarea name="content" class="form-control editor" rows="26"><?= $data['content'] ?></textarea>
    </div>
    </div>
  </div>
</form>

<script type="text/javascript">
  CodeMirror.fromTextArea(document.querySelector('.editor'), {
    lineNumbers: true,
    mode: 'application/x-httpd-php',
  }).setSize('100%', 600);
</script>

<?php Render::component('../app/content/pages/components/footer', $data) ?>
