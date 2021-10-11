<?php

/**
 * Content management system
 */
class Content {

  public string $page;

  public bool $routeActive = false;

  /**
   * Constructor
   */
  public function __construct(){

    $parameters = new Parameters;
    $render = new Render;

    if(isset($parameters->get()[0])){
      $page = $parameters->get()[0];
    }

    require __DIR__ . '/functions/content.php';

    $this->page = $page;

    $this->router($page);

  }

  public function route(string $route){

    if($this->routeActive){

      return true;

    }

    if($this->page == $route){

      $file = __dir__ . '/routes/' . $route . '.php';

      require $file;

      $route = new Route;

      $this->routeActive = true;

    } else {

      $this->routeActive = false;

    }

  }

  /**
   * Router for cms
   * @param string $page
   */
  private function router(string $page){

    $render = new Render;
    $parameters = new Parameters;

    /**
     * If no session is set
     */
    if(!isset($_SESSION['helium_user']) && $page !== 'login'){

      $this->redirect('login');

    }

    /**
     * If empty page
     */
    if(empty($page)){

      $this->redirect('home');

    }

    $this->route('login');

    $this->route('home');
    $this->route('pages');
    $this->route('blog');
    $this->route('users');
    $this->route('theme');
    $this->route('media');
    $this->route('templates');
    $this->route('config');

    $this->route('notifications');

    $this->route('logout');


    /**
     * If routes are not active
     */
    if(!$this->routeActive){

      $this->redirect('home');

    }

  }

  /**
   * Redirector for cms
   * @param string $to
   */
  private function redirect(string $to){

    header('location:' . getAdminURI() . '/' . $to);

  }

}

?>
