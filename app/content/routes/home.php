<?php

class Route {

  public $render;
  public $parameters;

  public function __construct(){

    $this->render = new Render;
    $this->parameters = new Parameters;
    $this->home();

  }

  public function home(){

    Database::query('SELECT * FROM he_posts WHERE type = "blog" ORDER BY id DESC LIMIT 3');
    $posts = Database::fetchAll();

    Database::query('SELECT * FROM he_posts WHERE type = "page"');
    $nOfPages = Database::rowCount();

    Database::query('SELECT * FROM he_posts WHERE type = "blog"');
    $nOfPosts = Database::rowCount();

    Database::query('SELECT * FROM he_users');
    $nOfUsers = Database::rowCount();

    Database::query('SELECT * FROM he_notifications ORDER BY id DESC LIMIT 5');
    $notifications = Database::fetchAll();

    $this->render->view('../app/content/pages/home', [
      'posts' => $posts,
      'nOfPages' => $nOfPages,
      'nOfPosts' => $nOfPosts,
      'nOfUsers' => $nOfUsers,
      'notifications' => $notifications
    ]);

  }

}

?>
