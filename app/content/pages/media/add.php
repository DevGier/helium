<?php renderComponent('../app/content/pages/components/header', $data) ?>

  <form method="post" enctype="multipart/form-data">
    <?php if(!empty($data['error'])): ?>
      <div class="alert alert-danger">
        <?= $data['error'] ?>
      </div>
    <?php endif; ?>

    <div class="custom-file">
      <input type="file" name="file" class="custom-file-input" id="customFile">
    </div>

    <button type="submit" name="add" class="btn btn-dark mt-3">Add</button>
  </form>

<?php renderComponent('../app/content/pages/components/footer', $data) ?>
