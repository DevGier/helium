<?php

/**
 * Using the class Router as a static class for stateful and global usage
 */
class Router {

   /**
    * Url
    * @var string $url
    */
   public static string $url;

   /**
    * The route
    * @var string $route
    */
   public static string $route;

   /**
    * Parameters
    * @var array $params
    */
   public static array $params = [];

   /**
    * All routes stored in here
    * @var array $routes
    */
   public static array $routes = [];

   /**
    * Is used
    * @var bool
    */
   public static bool $used = false;

   /**
    * Get a route from get method
    * @param  string   $route
    * @param  callable $callback
    */
   public static function get(string $route, callable $callback){

     $url = filter_input(INPUT_GET, 'url');

     self::$routes[] = $route;

     if($url == ''){

       self::$url = '';

     } else {

       self::$url = $url;

     }

     if(self::$url === $route){

       self::$used = true;

       if(is_callable($callback)){

         $callback();

       }

     }

   }

   /**
    * Get a route from post method
    * @param  string $route
    * @param  callable $callback
    */
   public static function post(string $route, callable $callback){

     self::$url = filter_input(INPUT_POST, 'url');

     if(self::$url == $route){

       self::$used = true;

       if(is_callable($callback)){

         $callback();

       }

     }

   }

   /**
    * Redirection
    * @param  string $from
    * @param  string $to
    */
   public function redirect(string $from, string $to){

     if(self::$url === $from){

       header('location:' . $to);

     }

   }

   /**
    * Destructor
    */
   public static function destruct(){

     $render = new Render;

     if(!self::$used){

       http_response_code(404);

       if(!CUSTOM_404_ENABLED){

         $render->view('../app/errors/pages/404.error');

       } else {

         require __DIR__ . '/../../resources/' .CUSTOM_404_PATH;

       }

     }

   }

 }

 ?>
