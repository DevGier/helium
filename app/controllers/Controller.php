<?php

/**
 * Controller class
 */
class Controller {

  public function model(string $model){

    $file = __dir__ . '/../../models/' . $model . '.php';

    if(file_exists($file)){

      require_once($model);

      return new $model;

    }

  }

}

?>
