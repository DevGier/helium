<?php

class Route {

  public $render;
  public $parameters;

  public function __construct(){

    $this->render = new Render;
    $this->parameters = new Parameters;
    $this->notification = new Notification;
    $this->config();

  }

  public function config(){

    if(isset($this->parameters->get()[1])){

      $this->edit();

      $subPage = $this->parameters->get()[1];

      if($subPage === 'details'){
        $this->details();
      }

      if($subPage === 'themes'){
        $this->themes();
      }

      if($subPage === 'security'){
        $this->security();
      }

      if($subPage === '404'){
        $this->error404();
      }

      if($subPage === 'maintenance'){
        $this->maintenance();
      }

    } else {

      contentRedirect('config/details');

    }

  }

  public function details(){

    $this->render->view('../app/content/pages/config/details');

  }

  public function themes(){

    $success = '';
    $error = '';

    if(isset($_POST['uploadTheme'])){

      $fileName = $_FILES['theme']['name'];

      $ext = pathinfo($fileName, PATHINFO_EXTENSION);

      if($ext === 'zip'){
        $fileTmp = $_FILES['theme']['tmp_name'];
        $uploadDir = __DIR__ . '/../../../public/';

        $zip = new ZipArchive;
        $res = $zip->open($fileTmp);
        if ($res === TRUE) {
          $zip->extractTo($uploadDir);
          $zip->close();
          $success = 'Uploaded theme';
        } else {
          $error = 'Something went wrong';
        }
      } else {
        $error = 'Incorrect extension type, please use zip files';
      }
    }



    $themesDir = __DIR__ . '/../../../public/*';
    $themes = glob($themesDir);
    $returnThemes = [];

    $i = 0;
    foreach ($themes as $theme) {
      if(is_dir($theme)){
        if(basename($theme) != 'helium'){
          $descriptionFile = $theme . '/description.txt';

          $returnThemes[$i]['path'] = $descriptionFile;

          $title = '';
          $description = '';
          $author = '';
          $version = '';

          if(file_exists($descriptionFile)){
            $file = fopen($descriptionFile, 'r');

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
          }

          $returnThemes[$i]['key'] = $i;
          $returnThemes[$i]['dirname'] = basename($theme);
          $returnThemes[$i]['title'] = $title;
          $returnThemes[$i]['description'] = $description;
          $returnThemes[$i]['author'] = $author;
          $returnThemes[$i]['version'] = $version;
          $returnThemes[$i]['image'] = getSiteUrl() . '/' . basename($theme) . '/theme.png';
        }
      }
      $i++;
    }

    $this->render->view('../app/content/pages/config/themes', [
      'themeFiles' => $returnThemes,
      'success' => $success,
      'error' => $error
    ]);

  }

  public function security(){

    $this->render->view('../app/content/pages/config/security');

  }

  public function error404(){

    $this->render->view('../app/content/pages/config/404');

  }

  public function maintenance(){

    $this->render->view('../app/content/pages/config/maintenance');

  }

  public function edit(){
    if(isset($_POST['submitConfig'])){

      $configFile = __DIR__ . '/../../../config/global.config.php';
      $configFileContents = file_get_contents($configFile);

      $this->notification->new('User <b>' . $_SESSION['helium_user'] . '</b> has edited a setting/configuration');

      $newFile = '';

      if(file_exists($configFile)){
        $file = fopen($configFile, 'r');

        $ruleNumber = 0;
        while(!feof($file)) {
          $ruleNumber++;
          $str = fgets($file);

          $subPage = $this->parameters->get()[1];

          $str = $this->replace('APP_NAME', $str);
          $str = $this->replace('APP_DESCRIPTION', $str);
          $str = $this->replace('APP_AUTHOR', $str);
          $str = $this->replace('APP_VERSION', $str);

          $str = $this->replace('SITE_URL', $str);

          $str = $this->replace('THEME_NAME', $str);

          $str = $this->replace('SALT', $str);
          $str = $this->replace('HASH', $str);

          $str = ($subPage == '404') ? $this->replaceBool('CUSTOM_404_ENABLED', $str) : $str;
          $str = $this->replace('CUSTOM_404_PATH', $str);

          $str = ($subPage == 'maintenance') ? $this->replaceBool('MAINTENANCE', $str) : $str;

          $newFile .= $str;
        }

        fclose($file);

      }

      file_put_contents($configFile, $newFile);

      contentRedirect('config/' . $this->parameters->get()[1]);

    }

  }

  public function replace(string $constant, string $string){
    if(isset($_POST[$constant])){
      if(constant($constant) !== null){
        if(strpos($string, $constant) !== false){
          return preg_replace("#\'".constant($constant)."\'#", "'".$_POST[$constant]."'", $string);
        }
      }
    }
    return $string;
  }

  public function replaceBool(string $constant, string $string){
    if(isset($_POST[$constant])){
      if($_POST[$constant] == 'on'){
        if(strpos($string, $constant) !== false){
          return preg_replace("#false#", "true", $string);
        }
      } else {
        if(strpos($string, $constant) !== false){
          return preg_replace("#true#", "false", $string);
        }
      }
    }

    return $string;
  }

}

?>
