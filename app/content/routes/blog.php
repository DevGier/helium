<?php

class Route {

  public $render;
  public $parameters;

  public function __construct(){

    $this->render = new Render;
    $this->parameters = new Parameters;
    $this->blog();

  }

  public function blog(){

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

      if(isset($this->parameters->get()['page'])){

        if($this->parameters->get()['page'] < 2){

          contentRedirect($this->parameters->get()[0]);

        } else {

          $limit = $this->parameters->get()['page'] * 10;
          $offset = $limit - 10;

          Database::query('SELECT * FROM he_posts WHERE type = "blog" ORDER BY slug LIMIT 10, ' . $offset);
          $posts = Database::fetchAll();

          $this->render->view('../app/content/pages/posts/posts', ['posts' => $posts]);

        }

      } else {

        Database::query('SELECT * FROM he_posts WHERE type = "blog" ORDER BY slug LIMIT 10');
        $posts = Database::fetchAll();

        $this->render->view('../app/content/pages/posts/posts', ['posts' => $posts]);

      }

    }

  }

  public function add(){

    $error = '';

    if(isset($_POST['add'])){

      $slug = filter_input(INPUT_POST, 'slug');
      $title = filter_input(INPUT_POST, 'title');
      $description = filter_input(INPUT_POST, 'description');
      $content = filter_input(INPUT_POST, 'content');
      $template = filter_input(INPUT_POST, 'template');
      $type = 'blog';
      $created = date('d-m-Y H:i');
      $author = $_SESSION['helium_user'];

      $slug = preg_replace('/ /', '-', $slug);
      $slug = preg_replace('/[^a-zA-Z0-9\-]/', '', $slug);
      $slug = strtolower($slug);

      if(empty($slug)){
        $error = 'Slug can\'t be empty';
      }

      if(empty($error)){
        Database::prepare('INSERT INTO he_posts(slug, title, description, content, template, type, created, author) VALUES (:slug, :title, :description, :content, :template, :type, :created, :author)');
        Database::bind(':slug', $slug);
        Database::bind(':title', $title);
        Database::bind(':description', $description);
        Database::bind(':content', $content);
        Database::bind(':template', $template);
        Database::bind(':type', $type);
        Database::bind(':created', $created);
        Database::bind(':author', $author);
        Database::execute();

        Database::prepare('SELECT id FROM he_posts WHERE slug = :slug');
        Database::bind(':slug', $slug);
        Database::execute();

        $result = Database::fetch();
        contentRedirect('blog/edit/' . $result['id']);
      }

    }

    $templates = glob(__DIR__ . '/../../../resources/templates/*.php');
    $returnTemplates = array();

    foreach ($templates as $template) {
      $returnTemplates[] = preg_replace('/.php/', '', basename($template));
    }

    $this->render->view('../app/content/pages/posts/add', ['error' => $error, 'templates' => $returnTemplates]);

  }

  public function edit(){

    $id = $this->parameters->get()[2];

    if(isset($_POST['edit'])){

      $slug = filter_input(INPUT_POST, 'slug');
      $content = filter_input(INPUT_POST, 'content');
      $title = filter_input(INPUT_POST, 'title');
      $description = filter_input(INPUT_POST, 'description');
      $template = filter_input(INPUT_POST, 'template');

      $slug = preg_replace('/ /', '-', $slug);
      $slug = preg_replace('/[^a-zA-Z0-9\-]/', '', $slug);
      $slug = strtolower($slug);

      Database::prepare('UPDATE he_posts SET slug=:slug, content=:content, title=:title, description=:description, template=:template WHERE id=:id');
      Database::bind(':slug', $slug);
      Database::bind(':content', $content);
      Database::bind(':title', $title);
      Database::bind(':description', $description);
      Database::bind(':template', $template);
      Database::bind(':id', $id);
      Database::execute();

    }

    Database::prepare('SELECT * FROM he_posts WHERE id = :id');
    Database::bind(':id', $id);
    Database::execute();

    $post = Database::fetch();

    $templates = glob(__DIR__ . '/../../../resources/templates/*.php');
    $returnTemplates = array();

    foreach ($templates as $template) {
      $returnTemplates[] = preg_replace('/.php/', '', basename($template));
    }

    $this->render->view('../app/content/pages/posts/edit', ['post' => $post, 'templates' => $returnTemplates]);

  }

  public function delete(){

    $id = $this->parameters->get()[2];

    Database::prepare('DELETE FROM he_posts WHERE id = :id');
    Database::bind(':id', $id);
    Database::execute();

    contentRedirect('blog');

  }

}


?>
