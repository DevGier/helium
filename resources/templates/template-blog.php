<?php

render()->template('header', $data);

foreach(blog()->getAll() as $blogPost){
?>

<div class="col-md-3">
  <?= $blogPost['title'] ?><br>
  <a href="<?= getSiteURI() ?>/<?= $blogPost['slug'] ?>">Visit</a>
</div>

<?php
}

render()->template('footer');

?>
