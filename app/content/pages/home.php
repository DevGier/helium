<?php renderComponent('../app/content/pages/components/header', $data) ?>

<?php if(!isset($_COOKIE['display_banner'])): ?>
  <div class="banner">
    <div class="row py-3">
      <div class="col-md-6 mb-4 mb-md-0">
        <h1>Welcome to Helium</h1>
        <p>Helium is a powerful CMS and framework combined. This combination will make unique features and functions possible for developers and also makes it easy for content managers and website admins to manage their website.</p>
      </div>

      <div class="col-md-3 mb-4 mb-md-0 get-started">
        <h3>Get started!</h3>
        <div><a href="<?= getAdminUrl() ?>/pages/add" class="text-white"><i class="far fa-file"></i> Create a new page</a></div>
        <div><a href="<?= getAdminUrl() ?>/users" class="text-white"><i class="fas fa-user"></i> Manage users</a></div>
        <div><a href="<?= getAdminUrl() ?>/blog/add" class="text-white"><i class="fas fa-book"></i> Add a new post</a></div>
      </div>

      <div class="col-md-3 get-started">
        <h3>Make it yours!</h3>
        <div><a href="<?= getAdminUrl() ?>/theme" class="text-white"><i class="fas fa-pencil"></i> Customize your theme</a></div>
        <div><a href="<?= getAdminUrl() ?>/settings" class="text-white"><i class="fas fa-cog"></i> Manage settings</a></div>
        <div><a href="<?= getAdminUrl() ?>/templates" class="text-white"><i class="fas fa-file"></i> Create templates</a></div>
      </div>
    </div>

    <button class="btn btn-primary" type="button" onclick="document.cookie = 'display_banner=true; path=/; expires=Fri, 31 Dec 9999 23:59:59 GMT';window.location.href='';">Close</button>
  </div>
<?php endif; ?>

<div class="row mb-3">
  <div class="col-md-4">
    <div class="block">
      <h3>Recent posts</h3>
      <?php foreach ($data['posts'] as $post): ?>
        <div class="mt-3 align-middle">
          <div class="d-inline-block">
            <div>
              <?= $post['title'] ?>
            </div>
            <div style="color: #aaa;">
              <small><?= $post['created'] ?></small>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <a href="<?= getAdminUrl() ?>/blog/add" class="d-block mt-2">Create a new post</a>
    </div>

    <div class="block">
      <h3>Recent events</h3>

      <?php $i = 0; ?>
      <?php foreach ($data['notifications'] as $notification): ?>
        <div class="py-2 align-middle <?php echo ($i != 0) ? 'border-top' : '';?>">
          <div class="d-inline-block">
            <div>
              <?= $notification['message'] ?>
            </div>
            <div class="text-muted">
              <small><?= $notification['time'] ?></small>
            </div>
          </div>
        </div>
        <?php $i++; ?>
      <?php endforeach; ?>


    </div>
  </div>

  <div class="col-md-8">
    <div class="block">
      <h3>Short summary</h3>

      <div class="row mt-3">
        <div class="col-md-4 mb-3 mb-md-0">
          <div class="mb-2">
            <i class="far fa-file"></i> <?= $data['nOfPages'] ?> page<?php if($data['nOfPages'] !== 1){echo 's';} ?><br>
          </div>
          <div>
            <a href="<?= getAdminUrl() ?>/pages/add">Create a new page</a>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="mb-2">
            <i class="fas fa-book"></i> <?= $data['nOfPosts'] ?> post<?php if($data['nOfPosts'] !== 1){echo 's';} ?><br>
          </div>
          <div>
            <a href="<?= getAdminUrl() ?>/blog/add">Add a new post</a>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="mb-2">
            <i class="fas fa-user"></i> <?= $data['nOfUsers'] ?> user<?php if($data['nOfUsers'] !== 1){echo 's';} ?><br>
          </div>
          <div>
            <a href="<?= getAdminUrl() ?>/users/add">Create new user</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php renderComponent('../app/content/pages/components/footer', $data) ?>
