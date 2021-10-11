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
          <strong>Post updated</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="fas fa-times text-white"></i>
          </button>
        </div>
      <?php endif; ?>

      <div class="input-group">
        <input type="text" name="slug" class="form-control" placeholder="Page slug" value="<?= $data['post']['slug'] ?>">
        <div class="input-group-append ms-3">
          <!-- <a class="btn btn-secondary" href="<?= getAdminUrl() . '/pages/preview/' . $data['post']['id'] ?>" target="child">Preview</a> -->
          <a class="btn btn-secondary viewBtn" data-url="<?= getAdminUrl() . '/pages/preview/' . $data['post']['id'] ?>">View</a>
        </div>
        <div class="input-group-append ms-3">
          <button class="btn btn-primary" type="submit" name="edit" id="edit">Save</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-md-9 mb-3">
      <textarea id="editor" name="content">
        <?= $data['post']['content'] ?>
      </textarea>
    </div>

    <div class="col-md-3">
      <label class=""><b>Author</b></label>
      <div class="created-by w-100 mb-3">
        <div class="created-by-profile-picture">
          <?= $data['post']['author'][0] ?>
        </div>
        <div class="created-by-username my-auto">
          <div><?= $data['post']['author'] ?></div>
        </div>
      </div>

      <label><b>Created on</b></label>
      <div class="mb-3 text-muted">
        <?= $data['post']['created'] ?>
      </div>

      <label class="mb-2"><b>Title</b></label>
      <input type="text" name="title" placeholder="Title" class="form-control mb-3" value="<?= $data['post']['title'] ?>">

      <label class="mb-2"><b>Description</b></label>
      <textarea type="text" rows="5" name="description" placeholder="Description" class="form-control mb-3"><?= $data['post']['description'] ?></textarea>

      <label class="mb-2"><b>Template</b></label>
      <select class="form-select mb-3" name="template">
        <?php foreach ($data['templates'] as $template): ?>
          <option value="<?= 'templates/' . $template ?>" <?php if($data['post']['template'] == ('templates/' . $template)){ echo 'selected'; } ?>><?= $template ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
</form>

<?php Render::component('../app/content/pages/components/footer', $data) ?>
