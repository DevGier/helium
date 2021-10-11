<?php renderComponent('../app/content/pages/components/header', $data) ?>

<div class="page-title">
  <div class="row">
    <div class="col-12 mb-3">
      <h1 class="d-inline-block">Users</h1>

      <a href="<?= getAdminUrl() ?>/users/add" class="plus-btn float-right">
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
          Username
        </div>
        <div class="col-4">
          Email
        </div>
      </div>
    </div>

    <?php foreach ($data['users'] as $user): ?>
      <div class="list-item">
        <div class="row">
          <div class="col-4">
            <?= $user['username'] ?>
          </div>

          <div class="col-4">
            <?= $user['email'] ?>
          </div>

          <div class="col-4">
            <div class="popdown">
              <i class="fas fa-ellipsis-h"></i>

              <div class="popdown-menu">
                <a href="<?= getAdminUrl() ?>/users/edit/<?= $user['id'] ?>" class="popdown-item">
                  Edit
                </a>
                <a href="<?= getAdminUrl() ?>/users/delete/<?= $user['id'] ?>" class="popdown-item">
                  Delete
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php renderComponent('../app/content/pages/components/footer', $data) ?>
