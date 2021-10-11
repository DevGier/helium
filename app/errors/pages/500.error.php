<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>404 - Page not found</title>
  </head>

  <style media="screen">
    body {
      font-family: 'Raleway', arial;
      background-color: #E9F7FF;
    }

    .error-container {
      max-width: 1000px;
      margin: 100px auto;
    }

    h1 {
      font-size: 84px;
      margin: 0 0 25px 0;
      border-bottom: 2px solid #EB3A82;
      width: fit-content;
      padding-bottom: 15px;
    }

    a {
      background: #111;
      border: 1px solid #111;
      font-weight: bold;
      color: #fff;
      text-decoration: none;
      padding: 10px 15px;
      margin-top: 15px;
      display: inline-block;
      border-radius: 10px;
      font-size: 18px;
    }

    .msg {
      margin: 10px 0;
      font-size: 30px;
    }

    .row {
      width: 100%;
    }

    .col {
      display: inline-block;
      float: left;
      width: 50%;
      height: 100%;
      vertical-align: middle;
      word-wrap: break-word;
    }

    .stack-trace {
      margin-top: 30px;
    }

    .content-title {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
    }

    .content {
      background-color: #fff;
      padding: 10px 20px;
    }

    .content-file {
      padding: 10px 20px;
      background-color: #EB3A82;
      color: #fff;
    }

    @media(max-width: 1000px){
      .error-container {
        width: calc(100% - 120px);
      }

      .col {
        width: 100%;
      }

      .d-none {
        display: none;
      }
    }
  </style>

  <body>
    <div class="error-container">
      <h1>500</h1>
      <div class="msg"><?= $data['message'] ?> in <?= $data['file'] ?> on line <?= $data['line'] ?></div>
      <a href="<?= SITE_URL ?>">Go back</a>

      <div class="stack-trace">
        <div class="content-title">
          Stack trace
        </div>
        <div class="content-file">
          <?= $data['file'] ?>
        </div>
        <div class="content">
          <?php foreach ($data['lines'] as $line): ?>
            <?= $line; ?><br>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </body>
</html>
