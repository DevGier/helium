<?php

/**
 * Autoload
 */
function autoload($directory){

  if(is_dir($directory)){

    /**
     * Scan dir
     */
    $scan = scandir($directory);

    /**
     * Unset . and ..
     */
    unset($scan[0], $scan[1]);

    /**
     * Foreach found item
     */
    foreach($scan as $file) {

      /**
       * If scanned item is directory then repeat
       * @var [type]
       */
      if(is_dir($directory.'/'.$file)){

        autoload($directory.'/'.$file);

      } else {

        /**
         * Ignore autloader (itself)
         */
        if(strpos($file, 'autoload.php') !== false){
          continue;
        }

        /**
         * Ignore all error files
         */
        if(strpos($file, '.error.php') !== false){
          continue;
        }

        /**
         * Exclude all pages from content (cms)
         */
        if(strpos($directory, 'content/pages') !== false ||
           strpos($directory, 'content/functions') !== false ||
           strpos($directory, 'content/routes') !== false){
          continue;
        }

        /**
         * Include but not create a new object of Content
         */
        if(strpos($directory, 'content') !== false){
          require($directory.'/'.$file);
          continue;
        }

        /**
         * Include router and configs
         * @var [type]
         */
        if(
          strpos($directory, 'routes/') !== false ||
          strpos($directory, 'configs/') !== false ||
          strpos($directory, 'controllers/') !== false ||
          strpos($directory, 'functions/') !== false
        ){
          require($directory.'/'.$file);
          continue;
        }

        /**
         * All app files
         */
        if(strpos($file, '.php') !== false){
          require_once($directory.'/'.$file);
          $class = preg_replace('/.php/', '', $file);

          if(class_exists($class)){
            ${$class} = new $class;
          }
        }
      }
    }
  }
}

/**
 * Session start
 */
session_start();

/**
 * Output buffering
 */
ob_start();

/**
 * Require vendor autoload
 */
if(file_exists(__DIR__ . '/../vendor/autoload.php')){

  require_once(__DIR__ . '/../vendor/autoload.php');

}

/**
 * Autoload configs
 */
autoload(__DIR__ . '/../config/');

/**
 * Autload functions
 */
autoload(__DIR__ . '/../functions/');

/**
 * Autload app
 */
autoload(__DIR__);

/**
 * Autload controllers
 */
autoload(__DIR__ . '/../controllers/');

/**
 * Autload routes
 */
autoload(__DIR__ . '/../routes/');

/**
 * Add content router for cms
 */
if(class_exists('ContentRouter')){

  ContentRouter::router();

}

/**
 * Router destructor
 */
Router::destruct();

?>
