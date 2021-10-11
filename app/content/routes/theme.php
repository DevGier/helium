<?php

class Route {

  public $render;
  public $parameters;

  public function __construct(){

    $this->render = new Render;
    $this->parameters = new Parameters;
    $this->theme();

  }

  public function theme(){

    $this->edit();

    if(!is_dir(__DIR__ . '/../../../public/' . THEME_NAME)){
      contentRedirect('home');
      return;
    }

    /**
     * Check for stylesheets
     */
    $style = '';
    $styleFile = __DIR__ . '/../../../public/' . THEME_NAME .'/style.css';

    if(file_exists($styleFile)){
      $style = file_get_contents($styleFile);
    }

    $styleFile = __DIR__ . '/../../../public/' . THEME_NAME .'/css/style.css';

    if(file_exists($styleFile)){
      $style = file_get_contents($styleFile);
    }

    /**
     * Check for script files
     */
    $script = '';
    $scriptFile = __DIR__ . '/../../../public/' . THEME_NAME .'/js/main.js';

    if(file_exists($scriptFile)){
      $script = file_get_contents($scriptFile);
    }

    $scriptFile = __DIR__ . '/../../../public/' . THEME_NAME .'/main.js';

    if(file_exists($scriptFile)){
      $script = file_get_contents($scriptFile);
    }

    //$descriptionFile = file_get_contents(__DIR__ . '/../../../public/' . THEME_NAME . '/description.txt');
    $descriptionFile = __DIR__ . '/../../../public/' . THEME_NAME . '/description.txt';
    //$description = preg_replace('/[\n]/', '<br>', $descriptionFile);

    $file = fopen($descriptionFile, 'r');
    $description = '';

    $ruleNumber = 0;
    while(!feof($file)) {
      $ruleNumber++;
      $str = fgets($file);
      if(strpos($str, 'title=') !== false){
        $title = preg_replace('/title=/', '', $str);
      }
      if(strpos($str, 'description=') !== false){
        $description = preg_replace('/description=/', '', $str);
      }
      if(strpos($str, 'author=') !== false){
        $author = preg_replace('/author=/', '', $str);
      }
      if(strpos($str, 'version=') !== false){
        $version = preg_replace('/version=/', '', $str);
      }
    }
    fclose($file);

    /**
     * Retrieve all scripts
     */

    $this->render->view('../app/content/pages/theme/theme', [
      'style' => $style,
      'script' => $script,
      'title' => $title,
      'description' => $description,
      'author' => $author,
      'version' => $version
    ]);

  }

  public function edit(){

    if(isset($_POST['editScript'])){

      $content = $_POST['script'];

      $scriptFile = __DIR__ . '/../../../public/' . THEME_NAME .'/js/main.js';
      $scriptFile2 = __DIR__ . '/../../../public/' . THEME_NAME .'/main.js';

      if(file_exists($scriptFile)){
        file_put_contents($scriptFile, $content);
      }

      if(file_exists($scriptFile2)){
        file_put_contents($scriptFile2, $content);
      }

    }

    if(isset($_POST['editStyle'])){

      $content = $_POST['stylesheet'];

      $styleFile = __DIR__ . '/../../../public/' . THEME_NAME .'/css/style.css';
      $styleFile2 = __DIR__ . '/../../../public/' . THEME_NAME .'/style.css';

      if(file_exists($styleFile)){
        file_put_contents($styleFile, $content);
      }

      if(file_exists($styleFile2)){
        file_put_contents($styleFile2, $content);
      }

    }

  }

}

?>
