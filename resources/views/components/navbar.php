<div class="topbar py-2">
  <div class="container text-muted">
    <div class="row">
      <div class="col font-weight-bold">
          It's me Helium!
      </div>

      <div class="col">
        <div class="float-right">
          <a href="/helium-admin/login" class="text-dark">Login</a>
        </div>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="<?= getSiteURI() ?>/helium/img/helium_icon.png" height="50" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link <?= ifActive('') ?><?= ifActive('home') ?>" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ifActive('templates') ?>" href="/templates/">Templates</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ifActive('blog') ?>" href="/blog/">Blog</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
