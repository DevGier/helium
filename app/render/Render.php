<?php

/**
 * Render class
 */
class Render {

  /**
   * Require a view
   * @param string $page
   * @param array $data
   * @return string
   */
  public function view(string $page, array $data = []){

    $file = __dir__ . '/../../resources/' . $page . '.php';

    if(file_exists($file)){

      require $file;

    } else {

      die( sprintf('Could not find view %s', $page) );

    }

  }

  /**
   * Get a json format
   * @param  object $object [description]
   * @return object json format
   */
  public function json(object $object){

    if(is_object($object)){

      return json_decode($object);

    } else {

      die( sprintf('Could not create json out of object %s', $object) );

    }

  }

  /**
   * Get a component
   * Is set as a static function for simplicity and easy global usage
   * @param  string $component [description]
   * @param  array  $data      [description]
   * @return [type]            [description]
   */
  public function component(string $component, $data = []){

    $file = __dir__ . '/../../resources/' . $component . '.php';

    if(file_exists($file)){

      ob_start();

      include $file;

      echo ob_get_clean();

    } else {

      die( sprintf('Could not find component %s', $component) );

    }

  }


  public function template(string $template, $data = []){

    $file = __dir__ . '/../../resources/templates/' . $template . '.php';

    if(file_exists($file)){

      ob_start();

      include $file;

      echo ob_get_clean();

    } else {

      die( sprintf('Could not find template %s', $template) );

    }

  }

  public function return(string $input, $data = []){

    $file = __dir__ . '/../../resources/' . $input . '.php';

    if(file_exists($file)){

      ob_start();

      include $file;

      return ob_get_clean();

    } else {

      die( sprintf('Could not find component %s', $component) );

    }

  }

}

?>
