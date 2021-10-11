<?php

class Route {

  public $render;
  public $parameters;

  public function __construct(){

    $this->render = new Render;
    $this->parameters = new Parameters;
    $this->users();

  }

  public function users(){

    if(isset($this->parameters->get()[1])){

      $subPage = $this->parameters->get()[1];

      if($subPage === 'add'){

        $this->add();

      }

      if($subPage === 'edit'){

        $this->edit();

      }

      if($subPage === 'delete'){

        $this->delete();

      }

    } else {

      Database::query('SELECT * FROM he_users');
      $users = Database::fetchAll();

      $this->render->view('../app/content/pages/users/users', ['users' => $users]);

    }

  }

  public function add(){

    $error = '';

    if(isset($_POST['add'])){

      if(!empty(filter_input(INPUT_POST, 'username')) || !empty(filter_input(INPUT_POST, 'password')) || !empty(filter_input(INPUT_POST, 'password2'))){

        if(pwhash(filter_input(INPUT_POST, 'password')) !== pwhash(filter_input(INPUT_POST, 'password2'))){

          $error = 'Passwords do not match';

        } else {

          $id = $this->parameters->get()[1];
          $username = filter_input(INPUT_POST, 'username');
          $password = pwhash(filter_input(INPUT_POST, 'password'));
          $email = filter_input(INPUT_POST, 'email');
          $created = date('d-m-Y H:i');
          $realname = filter_input(INPUT_POST, 'realname');

          Database::prepare('INSERT INTO he_users(username, password, email, created, realname) VALUES(:username, :password, :email, :created, :realname)');
          Database::bind(':username', $username);
          Database::bind(':password', $password);
          Database::bind(':email', $email);
          Database::bind(':created', $created);
          Database::bind(':realname', $realname);
          Database::execute();

        }
      } else {

        $error = 'Please fill in all fields';

      }

    }

    $this->render->view('../app/content/pages/users/add', ['error' => $error]);

  }

  public function edit(){

    $error = '';
    $id = $this->parameters->get()[2];

    if(isset($_POST['edit'])){

      if(isset($_POST['password']) && !empty($_POST['password'])){

        if(pwhash(filter_input(INPUT_POST, 'password')) !== pwhash(filter_input(INPUT_POST, 'password2'))){

          $error = 'Password does not match';

        } else {

          $username = filter_input(INPUT_POST, 'username');
          $password = pwhash(filter_input(INPUT_POST, 'password'));
          $email = filter_input(INPUT_POST, 'email');
          $realname = filter_input(INPUT_POST, 'realname');

          Database::prepare('UPDATE he_users SET username=:username, password=:password, email=:email, realname=:realname WHERE id=:id');
          Database::bind(':username', $username);
          Database::bind(':password', $password);
          Database::bind(':email', $email);
          Database::bind(':realname', $realname);
          Database::bind(':id', $id);
          Database::execute();

        }

      } else{

        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email');
        $realname = filter_input(INPUT_POST, 'realname');

        Database::prepare('UPDATE he_users SET username=:username, email=:email, realname=:realname WHERE id=:id');
        Database::bind(':username', $username);
        Database::bind(':email', $email);
        Database::bind(':realname', $realname);
        Database::bind(':id', $id);
        Database::execute();

      }
    }

    Database::prepare('SELECT * FROM he_users WHERE id = :id');
    Database::bind(':id', $id);
    Database::execute();

    $user = Database::fetch();

    $this->render->view('../app/content/pages/users/edit', ['user' => $user, 'error' => $error]);

  }

  public function delete(){

    $id = $this->parameters->get()[2];

    Database::prepare('DELETE FROM he_users WHERE id = :id');
    Database::bind(':id', $id);
    Database::execute();

    contentRedirect('users');

  }

}

?>
