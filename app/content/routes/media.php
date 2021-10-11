<?php

class Route {

  public $render;
  public $parameters;

  public function __construct(){

    $this->render = new Render;
    $this->parameters = new Parameters;
    $this->media();

  }

  public function media(){

    if(isset($this->parameters->get()[1])){

      $subPage = $this->parameters->get()[1];

      if($subPage == 'add'){
        $this->add();
      }

      if($subPage == 'delete'){
        $this->delete();
      }

    } else {

      $imageDirectory = __DIR__ . '/../../../public/' . THEME_NAME . '/img/*';
      $images = glob($imageDirectory);
      $returnImages = [];

      foreach ($images as $image) {
        $returnImages[] = getThemeURI() . '/img/' . basename($image);
      }

      $this->render->view('../app/content/pages/media/media', ['images' => $returnImages]);

    }

  }

  public function add(){

    $error = '';

    if(isset($_POST['add'])){

      $fileName = $_FILES['file']['name'];
      $fileTmp = $_FILES['file']['tmp_name'];
      $uploadDir = __DIR__ . '/../../../public/' . THEME_NAME . '/img/' . $fileName;

      if(!file_exists($uploadDir)){

        move_uploaded_file($fileTmp, $uploadDir);

      } else {

        $error = 'File already exists';

      }

    }

    $this->render->view('../app/content/pages/media/add', ['error' => $error]);

  }

  public function delete(){

    $media = $this->parameters->get()[2];
    $extension = $this->parameters->get()[3];

    $mediaFile = __DIR__ . '/../../../public/' . THEME_NAME . '/img/' . $media . '.' . $extension;

    unlink($mediaFile);

    contentRedirect('media');

  }

}

?>
