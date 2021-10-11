<?php

class Route {

  public $render;
  public $parameters;

  public function __construct(){

    $this->render = new Render;
    $this->parameters = new Parameters;
    $this->notifications();

  }

  public function notifications(){

    $this->render->view('../app/content/pages/notifications/notifications');

  }

}


?>
