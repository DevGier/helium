<?php renderComponent('../app/content/pages/components/header', $data) ?>

<form method="post">
  <div class="row">
    <div class="col-12">
      <?php if(!empty($data['error'])): ?>
        <div class="alert alert-danger">
          <?= $data['error'] ?>
        </div>
      <?php endif; ?>

      <div class="input-group">
        <input type="text" name="slug" class="form-control me-3" placeholder="Slug">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit" name="add">Publish</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-md-9 mb-3">
      <textarea id="editor" name="content"></textarea>
    </div>

    <div class="col-md-3">
      <label class="mb-2"><b>Title</b></label>
      <input type="text" name="title" placeholder="Title" class="form-control mb-3">

      <label class="mb-2"><b>Description</b></label>
      <textarea type="text" rows="5" name="description" placeholder="Description" class="form-control mb-3"></textarea>

      <label class="mb-2"><b>Template</b></label>
      <select class="form-select mb-3" name="template">
        <?php foreach ($data['templates'] as $template): ?>
          <option value="<?= 'templates/' . $template ?>"><?= $template ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</form>

<?php Render::component('../app/content/pages/components/footer', $data) ?>
