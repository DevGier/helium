<?php renderComponent('../app/content/pages/components/header', $data) ?>

<div class="page-title">
  <div class="row">
    <div class="col-12 mb-3">
      <?php $params = new Parameters; ?>
      <h1 class="d-inline-block" style="text-transform: capitalize;"><?= $params->get()[0] ?></h1>
      <a href="<?= getAdminUrl() ?>/<?= $params->get()[0] ?>/add" class="plus-btn float-right">
        <i class="fas fa-plus"></i>
      </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="list-item-header">
      <div class="row">
        <div class="col-4">
          Name
        </div>

        <div class="col-4">
          Created
        </div>

        <div class="col-3">
          Author
        </div>
      </div>
    </div>

    <?php $i = 0; ?>
    <?php foreach ($data['posts'] as $post): ?>
      <?php $i++; ?>
      <div class="list-item">
        <div class="row">
          <div class="col-4">
            <?= $post['slug'] ?>
          </div>

          <div class="col-4">
            <?= $post['created'] ?>
          </div>

          <div class="col-3">
            <?= $post['author'] ?>
          </div>

          <div class="col">
            <div class="popdown">
              <i class="fas fa-ellipsis-h"></i>

              <div class="popdown-menu">
                <a href="<?= getAdminUrl() ?>/<?= $params->get()[0] ?>/edit/<?= $post['id'] ?>" class="popdown-item">
                  Edit
                </a>
                <a href="<?= getSiteURI() . '/' . $post['slug'] ?>" class="popdown-item">
                  View
                </a>
                <a href="<?= getAdminUrl() ?>/<?= $params->get()[0] ?>/delete/<?= $post['id'] ?>" class="popdown-item">
                  Delete
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

    <?php if (isset($params->get()['page'])): ?>
      <a class="btn btn-primary" href="<?= getAdminUrl() ?>/<?= $params->get()[0] ?>/page=<?php if(isset($params->get()['page'])){echo $params->get()['page'] - 1;} ?>">Previous</a>
    <?php endif; ?>

    <?php if ($i > 9): ?>
      <a class="btn btn-primary" href="<?= getAdminUrl() ?>/<?= $params->get()[0] ?>/page=<?php if(isset($params->get()['page'])){echo $params->get()['page'] + 1;}else{echo '2';} ?>">Next</a>
    <?php endif; ?>
  </div>
</div>

<?php renderComponent('../app/content/pages/components/footer', $data) ?>
