<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">

    <!-- Custom css -->
    <link rel="stylesheet" href="<?= getSiteUrl() ?>/helium/css/helium-dark.css">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="<?= getSiteUrl() ?>/helium/img/helium_icon_50x50.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/codemirror.css" integrity="sha512-i6uhMRznt6t0XApwqkS0VPhc/RLML0igcNKhiEa2a4yf6uyrRiK1CLa4FxEwBGtQoOYJIPOAnaqRuI5/Ex5New==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/codemirror.js" integrity="sha512-SHHnT2xKoEqAehT3RMuC+f3OkZcU9bTNkFVaX+Jr8b5TQZf1NIiRY5xlzyeypSL0PArd8UsdnyebQ8dARYGgaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/mode/javascript/javascript.js" integrity="sha512-u4NVkg0e7EuaYbvCqc4ReGdbSMEOB1ptwlXWfo3JtXvhi7WxloRYJp+3xyDDkuFEv0c7KPTxDmdWfsfOZE89uw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/mode/htmlmixed/htmlmixed.js" integrity="sha512-NtgFGEIL89gOYM/86h6XcqkM40Tb/+cnsDW6f2jOGpwkcMcRhDNwOOEc8CmUWBr3YJakzCG9YUbIUTV2PN1Yiw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/mode/xml/xml.js" integrity="sha512-LSFoXmSWhsTijG/oPGK+/oUAi3fOF5+x91XQy2H9dXJmfARUWz61xhFZUfW8hcFsIz5bjLPHum3Z7dmSlFHzJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/mode/css/css.js" integrity="sha512-/H6cDa49JW4NcIk09zSK6HXaCRQiNqLWmKIsC2R5pPs4guH70nmeq9s96bieqn96IECW0B0SEn/DRfjjLnR2dQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/mode/php/php.js" integrity="sha512-yMch2XRpxbF2HgJh2oVStP7jfM0IF+ETZjFkAtoQ/yTy66LnnMVzY9Ro6vUgZgqEUcbrt87BvQaGrQ27BO2Zkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.3/mode/clike/clike.js" integrity="sha512-OuW7mzZEXr65k/8qebTV5jtiT6MCLbmkCFSUm5GsHGXopTkpKUSwmThJ8/aCw2tQIU3JtIECndL/1trtGII0ew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Helium - Admin</title>
  </head>
  <body>
    <div class="menu">
      <div class="menu-nav">

        <div class="menu-nav-logo text-center">
          <img src="<?= getSiteURI() ?>/helium/img/helium_icon_70x70.png" height="70" alt="">
        </div>

        <div class="menu-nav-section pt-3">

          <a class="menu-nav-item <?= ifSubpage('home') ?>" href="<?= getAdminUrl() ?>/home">
            <i class="far fa-home"></i> Home
          </a>

          <a class="menu-nav-item menu-nav-dropdown-item <?= ifSubpage('pages') ?><?= ifSubpage('blog') ?>" data-id="posts">
            <i class="far fa-copy"></i> Posts <i class="fas fa-chevron-down"></i>
          </a>

          <div class="menu-nav-dropdown" id="posts">
            <a class="menu-nav-sub-item <?= ifSubpage('pages') ?>" href="<?= getAdminUrl() ?>/pages">
              Pages
            </a>
            <a class="menu-nav-sub-item <?= ifSubpage('blog') ?>" href="<?= getAdminUrl() ?>/blog">
              Blog
            </a>
          </div>

          <a class="menu-nav-item <?= ifSubpage('users') ?>" href="<?= getAdminUrl() ?>/users">
            <i class="far fa-user"></i> Users
          </a>

          <a class="menu-nav-item <?= ifSubpage('media') ?>" href="<?= getAdminUrl() ?>/media">
            <i class="far fa-camera"></i> Media
          </a>

          <a class="menu-nav-item <?= ifSubpage('theme') ?>" href="<?= getAdminUrl() ?>/theme">
            <i class="far fa-brush"></i> Theme
          </a>

          <a class="menu-nav-item <?= ifSubpage('templates') ?>" href="<?= getAdminUrl() ?>/templates">
            <i class="far fa-file"></i> Templates
          </a>

          <a class="menu-nav-item menu-nav-dropdown-item <?= ifSubpage('config') ?> ?>" data-id="config">
            <i class="far fa-cog"></i> Config <i class="fas fa-chevron-down"></i>
          </a>

          <div class="menu-nav-dropdown" id="config">
            <a class="menu-nav-sub-item <?= ifSubSubpage('details') ?>" href="<?= getAdminUrl() ?>/config/details">
              Details
            </a>
            <a class="menu-nav-sub-item <?= ifSubSubpage('themes') ?>" href="<?= getAdminUrl() ?>/config/themes">
              Themes
            </a>
            <a class="menu-nav-sub-item <?= ifSubSubpage('security') ?>" href="<?= getAdminUrl() ?>/config/security">
              Security
            </a>
            <a class="menu-nav-sub-item <?= ifSubSubpage('404') ?>" href="<?= getAdminUrl() ?>/config/404">
              404
            </a>
            <a class="menu-nav-sub-item <?= ifSubSubpage('maintenance') ?>" href="<?= getAdminUrl() ?>/config/maintenance">
              Maintenance
            </a>
          </div>
        </div>

        <div class="menu-nav-info">
          Helium version 0.03
        </div>
      </div>
    </div>

    <div class="content">
      <div class="content-nav">

        <div class="content-nav-profile">
          <div class="content-nav-profile-picture">
            <?= $_SESSION['helium_user'][0] ?>
          </div>
          <div class="content-nav-username my-auto">
            <div><?= $_SESSION['helium_user'] ?></div>
            <div class="text-muted">Welcome back!</div>
          </div>
        </div>

        <div class="content-nav-controls">
          <div class="d-none me-3 menu-toggler">
            <a href="#">
              <i class="fas fa-bars"></i>
            </a>
          </div>

          <div class="d-inline-block me-3" title="View website">
            <a href="<?= getSiteUrl() ?>" target="_child">
              <i class="far fa-eye"></i>
            </a>
          </div>

          <div class="d-inline-block me-3" title="Notifications">
            <a href="#" id="notify-bell">
              <i class="far fa-bell"></i>
            </a>

            <div class="notification-container">
              <div class="notifications"></div>
            </div>
          </div>
          <div class="d-inline-block" title="Logout">
            <a class="logout" href="<?= getAdminUrl() ?>/logout">
              <i class="far fa-sign-out-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="content-container">
        <script type="text/javascript">
          setInterval(function(){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
              var notificationBell = document.getElementById('notify-bell');
              if(this.responseText != ''){
                var notifications = this.responseText.split('-;;;-');
                console.log(notifications);
                notifications.forEach((notification, i) => {
                  if(notification != ''){
                    var notificationContainer = document.querySelector('.notifications');
                    notificationBell.classList.add('bell-ring');
                    notificationContainer.innerHTML = '<div class="notfication">'+notification+'</div>' + notificationContainer.innerHTML;
                  }
                });
              } else {
                notificationBell.classList.remove('bell-ring');
              }
            }
            xhttp.open("GET", '<?= getAdminUrl() ?>/notifications');
            xhttp.send();
          },1000)

        </script>
