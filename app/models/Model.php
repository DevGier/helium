<?php

/**
 * Model
 */
class Model {

  /**
   * Get a model
   * @param  string $model
   * @return object $model
   */
  public function get(string $model){

    $file = __dir__ . '/../../models/' . $model . '.php';

    if(file_exists($file)){

      require $file;

    } else {

      die( sprintf('Could not find file %s', $file) );

    }

    if(class_exists($model)){

      return new $model;

    } else {

      die( sprintf('Could not find class %s', $model) );

    }

  }

}

?>
