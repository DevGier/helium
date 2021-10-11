<?php

render()->template('header', $data);

echo $data['content'];

render()->template('footer');

?>
