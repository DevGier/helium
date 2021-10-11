<?php

class Maintenance {

  public function __construct(){

    if(MAINTENANCE !== null){

      if(MAINTENANCE){

        ob_end_clean();

        require __DIR__ . '/../render/Render.php';
        require __DIR__ . '/../router/Router.php';

        $render = new Render;

        if(isset($_GET['url'])){

          if($_GET['url'] !== 'he-admin'){

            $render->view('../app/errors/pages/maintenance.error');

            exit();

          }

        } else {

          $render->view('../app/errors/pages/maintenance.error');

          exit();

        }

      }

    }

  }

}

?>
