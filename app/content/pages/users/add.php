<?php renderComponent('../app/content/pages/components/header', $data) ?>

  <form method="post">
    <?php if(!empty($data['error'])): ?>
      <div class="alert alert-danger mb-4">
        <?= $data['error'] ?>
      </div>
    <?php endif; ?>

    <h5 class="mb-3">General information</h5>

    <label>Username</label>
    <input type="text" name="username" placeholder="Username" class="form-control rounded-0 mb-3">

    <label>Real name</label>
    <input type="text" name="realname" placeholder="Name" class="form-control rounded-0 mb-3">

    <label>Email</label>
    <input type="email" name="email" placeholder="Email" class="form-control rounded-0 mb-3">

    <h5 class="mb-3 mt-4">Security</h5>

    <label>Password</label>
    <input type="password" name="password" placeholder="Password" class="form-control rounded-0 mb-3">

    <label>Repeat password</label>
    <input type="password" name="password2" placeholder="Confirm password" class="form-control rounded-0">

    <button type="submit" name="add" class="btn btn-dark mt-3">Add user</button>
  </form>

<?php renderComponent('../app/content/pages/components/footer', $data) ?>
