<?php

class Route {

  public function __construct(){

    setcookie('remember_me', null, -1);
    setcookie('remember_me_user', null, -1);
    unset($_SESSION['helium_user']);
    $_SESSION['login_attempts'] = 0;
    contentRedirect('login');

  }

}



?>
