<?php renderComponent('../app/content/pages/components/header', $data) ?>

<div class="page-title">
  <div class="row">
    <div class="col-12 mb-3">
      <h1 class="d-inline-block">Security</h1>
    </div>
  </div>
</div>


  <form method="post">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h5 class="mb-3">Passwords</h5>
          <small class="d-block mb-3">DO NOT CHANGE ANYTHING UNLESS YOU KNOW WHAT YOU'RE DOING. CHANGING SECURITY ITEMS WILL NOT CHANGE USER INFORMATION SUCH AS PASSWORDS.</small>
          <label>Salt</label>
          <input class="form-control mb-3" type="text" name="SALT" value="<?= SALT ?>" placeholder="Password salt">
          <label>Hash type</label>
          <input class="form-control mb-3" type="text" name="HASH" value="<?= HASH ?>" placeholder="Password hash type">

          <button type="submit" name="submitConfig" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </form>


<?php renderComponent('../app/content/pages/components/footer', $data) ?>
