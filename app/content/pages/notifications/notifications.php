<?php

Database::query('SELECT * FROM he_notifications WHERE isread = 0');
$results = Database::fetchAll();

foreach ($results as $result) {
  echo $result['message'] . '-;;;-';

  Database::prepare('UPDATE he_notifications SET isread = 1 WHERE id = :id');
  Database::bind(':id', $result['id']);
  Database::execute();
}

?>
