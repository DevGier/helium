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
    <link rel="stylesheet" href="<?= getSiteURI() ?>/helium/css/helium.css">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="<?= getSiteUrl() ?>/helium/img/helium_icon_50x50.png">

    <title>Helium - login</title>
  </head>
  <body>
    <div class="login">
      <div class="row">
        <div class="login-items">

          <img src="<?= getSiteUrl() ?>/helium/img/helium_icon_100x100.png" height="80" class="d-block mx-auto my-5" alt="">

          <?php if(!empty($data['error'])): ?>
            <div class="alert alert-danger">
              <?= $data['error'] ?>
            </div>
          <?php endif; ?>

          <div class="block">
            <?php if($_SESSION['login_attempts'] >= 5): ?>
              <h3 class="text-center">Login blocked</h3>
              <p class="text-center">Please contact the administrator</p>
            <?php else: ?>
              <form method="post">
                <label>Username</label>
                <input type="text" name="username" placeholder="username" class="form-control mb-3">
                <label>Password</label>
                <input type="password" name="password" placeholder="password" class="form-control mb-4">

                <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" name="remember_me" id="remember_me">
                  <label class="form-check-label" for="remember_me">Remember me</label>
                </div>

                <button type="submit" name="login" class="btn btn-primary">Login</button> <a href="<?= getSiteUrl() ?>" class="float-end pt-2">Lost? Go back</a>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <script src="main.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  </body>
</html>
