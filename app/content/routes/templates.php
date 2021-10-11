<?php

class Route {

  public $render;
  public $parameters;

  public function __construct(){

    $this->render = new Render;
    $this->parameters = new Parameters;
    $this->templates();

  }

  public function templates(){

    if(isset($this->parameters->get()[1])){

      $subPage = $this->parameters->get()[1];

      if($subPage === 'add'){
        $this->add();
      }

      if($subPage === 'preview'){
        $this->preview();
      }

      if($subPage === 'edit'){
        $this->edit();
      }

      if($subPage === 'delete'){
        $this->delete();
      }

    } else {

      $templateDir = __DIR__ . '/../../../resources/templates/*.php';
      $templates = glob($templateDir);
      $returnTemplates = [];

      foreach ($templates as $template) {
        $returnTemplates[] = preg_replace('/.php/', '', basename($template));
      }

      $this->render->view('../app/content/pages/templates/templates', ['templates' => $returnTemplates]);

    }

  }

  public function add(){

    if(isset($_POST['add'])){

      $templateName = preg_replace('/ /', '-', $_POST['template_name']);
      $templateName = preg_replace('/[^a-zA-Z0-9\-]/', '', $templateName);
      $templateName = strtolower($templateName);

      $templateFile = __DIR__ . '/../../../resources/templates/' . $templateName . '.php';
      $templateContent = $_POST['content'];

      if(!empty($templateName) && !empty($templateContent)){
        file_put_contents($templateFile, $templateContent);
      }

      contentRedirect('templates/edit/' . $templateName);

    }

    $this->render->view('../app/content/pages/templates/add');

  }

  public function edit(){

    if(isset($_POST['edit'])){

      $templateName = preg_replace('/ /', '-', $_POST['template_name']);
      $templateName = preg_replace('/[^a-zA-Z0-9\-]/', '', $templateName);
      $templateName = strtolower($templateName);

      $templateFile = __DIR__ . '/../../../resources/templates/' . $templateName . '.php';
      $templateContent = $_POST['content'];

      if(!empty($templateName) && !empty($templateContent)){
        file_put_contents($templateFile, $templateContent);
      }

    }

    $template = $this->parameters->get()[2];

    $templateDir = __DIR__ . '/../../../resources/templates/' . $template .'.php';
    $content = file_get_contents($templateDir);

    $this->render->view('../app/content/pages/templates/edit', [
      'template' => $template,
      'content' => $content
    ]);

  }

  public function delete(){

    $template = $this->parameters->get()[2];

    $templateFile = __DIR__ . '/../../../resources/templates/' . $template . '.php';

    unlink($templateFile);

    contentRedirect('templates');

  }

}


?>
