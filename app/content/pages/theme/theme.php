<?php renderComponent('../app/content/pages/components/header', $data) ?>

<div class="row">
  <div class="col-md-12">
    <div class="block">
      <div class="row">
        <div class="col-md-4">
          <img src="<?= getThemeURI() ?>/theme.png" class="w-100 border">
        </div>

        <div class="col-md-8">
          <div class="p-md-2 pl-0">
            <h1><?= $data['title'] ?></h1>
            <div>
              <?= $data['description']  ?>
            </div>
            <div class="text-muted pt-2">
              <?php if (!empty($data['author'])): ?>
                <small>By <?= $data['author'] ?></small><br>
              <?php endif; ?>
              <?php if (!empty($data['version'])): ?>
                <small>Version <?= $data['version'] ?></small>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="block">
      <div class="p-4 pt-0">
        <h3>Scripting</h3>
      </div>

      <?php if (!empty($data['script'])): ?>
        <form method="post">
          <textarea name="script" class="jsEditor form-control mb-3" rows="16" cols="80"><?= $data['script']; ?></textarea>
          <input type="submit" name="editScript" value="Edit" class="btn btn-primary mt-3">
        </form>
      <?php else: ?>
        <div class="alert alert-warning">
          This theme does not have a main.js javascript file, it's empty, not found or it could have another name.
        </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="col-md-6">
    <div class="block">
      <div class="p-4 pt-0">
        <h3>Stylesheet</h3>
      </div>

      <?php if(!empty($data['style'])): ?>
        <form method="post">
          <textarea name="stylesheet" class="cssEditor form-control mb-3" rows="16" cols="80"><?= $data['style']; ?></textarea>
          <input type="submit" name="editStyle" value="Edit" class="btn btn-primary mt-3">
        </form>
      <?php else: ?>
        <div class="alert alert-warning">
          This theme does not have a style.css stylesheet file, it's empty, not found or it could have another name.
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<script type="text/javascript">
  CodeMirror.fromTextArea(document.querySelector('.cssEditor'), {
      lineNumbers: true,
      mode: 'css',
  }).setSize('100%', 300);

  CodeMirror.fromTextArea(document.querySelector('.jsEditor'), {
      lineNumbers: true,
      mode: 'javascript',
  }).setSize('100%', 300);
</script>

<?php renderComponent('../app/content/pages/components/footer', $data) ?>
