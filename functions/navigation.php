<?php

function ifActive($route){

  if($route === '' && !isset($_GET['url'])){
    return 'active';
  }

  if(isset($_GET['url'])){

    $url = $_GET['url'];

    if($route == $url){

      return 'active';

    }

  }

}

?>
