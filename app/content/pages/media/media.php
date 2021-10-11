<?php renderComponent('../app/content/pages/components/header', $data) ?>

<div class="page-title">
  <div class="row">
    <div class="col-12 mb-3">
      <h1 class="d-inline-block" style="text-transform: capitalize;">Media</h1>
      <a href="<?= getAdminUrl() ?>/media/add" class="plus-btn float-right">
        <i class="fas fa-plus"></i>
      </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">

    <div class="row">
      <?php foreach ($data['images'] as $image): ?>
        <div class="col-md-2 col-sm-6 col-sx-12 mb-3 align-middle can-copy" data-copy="<?= $image ?>" data-toggle="tooltip" data-placement="bottom" title="Click me to copy the URL">
          <div class="h-100 align-middle block">
            <div class="row h-100">
              <div class="col my-auto">
                <img src="<?= $image ?>" class="w-100" alt="">

                <div class="popdown popdown-media">
                  <i class="fas fa-ellipsis-h"></i>

                  <div class="popdown-menu">
                    <?php
                    $fileName = implode('.', explode('.', basename($image), -1));
                    $fileExtension = explode('.', basename($image));
                    $fileExtension = $fileExtension[count($fileExtension) - 1];
                    ?>

                    <a href="<?= getAdminUrl() ?>/media/delete/<?= $fileName ?>/<?= $fileExtension ?>" class="popdown-item">
                      Delete
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php renderComponent('../app/content/pages/components/footer', $data) ?>
