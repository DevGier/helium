<?php

class Route {

  public $render;
  public $notification;

  public function __construct(){

    $this->render = new Render;
    $this->notification = new Notification;
    $this->login();

  }

  public function login(){

    $error = '';

    if(isset($_COOKIE['remember_me'])){
      $_SESSION['helium_user'] = $_COOKIE['remember_me_user'];
      contentRedirect('home');
    }

    if(!isset($_SESSION['login_attempts'])){
      $_SESSION['login_attempts'] = 0;
    }

    if(isset($_POST['login'])){

      if($_SESSION['login_attempts'] < 5){
        $_SESSION['login_attempts']++;
      } else {
        $error = 'Login blocked, too many attempts';
      }

      if(empty($error)){

        $username = filter_input(INPUT_POST, 'username');
        $password = pwhash(filter_input(INPUT_POST, 'password'));

        if(isset($_POST['remember_me'])){
          setcookie('remember_me', 'true');
          setcookie('remember_me_user', $username);
        }

        Database::prepare('SELECT * FROM he_users WHERE username = :username AND password = :password');
        Database::bind(':username', $username);
        Database::bind(':password', $password);
        Database::execute();

        if(Database::rowCount() > 0){

          $_SESSION['helium_user'] = $username;

          $this->notification->new('User <b>' . $_SESSION['helium_user'] . '</b> has logged in');

          contentRedirect('home');

        } else {

          $error = 'Invalid login';

        }

      }

    }

    $this->render->view('../app/content/pages/login', ['error' => $error]);

  }

}

?>
