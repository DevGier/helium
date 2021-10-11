<?php

class Notification {

  public function new(string $message){

    $time = date('d-m-Y H:i');

    Database::prepare('INSERT INTO he_notifications(message, time, isread) VALUES (:message, :time, 0)');
    Database::bind(':message', $message);
    Database::bind(':time', $time);
    Database::execute();

  }

}

?>
