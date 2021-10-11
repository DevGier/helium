<?php

/**
 * Class for retrieving content from cms
 */
class ContentRouter {

  /**
   * Router
   */
  public static function router(){

    Database::query('SELECT * FROM he_posts');

    $results = Database::fetchAll();

    foreach ($results as $route) {

      if(isset($_GET['url'])){

        $url = filter_input(INPUT_GET, 'url');

      } else {

        $url = '';

      }

      if($route['slug'] === $url){

        Router::$used = true;

        render()->view($route['template'], $route);

      }

    }

  }

}

?>
