<?php

function contentRedirect(string $to){

  header('location:' . getAdminURI() . '/' . $to);

}

function ifSubpage(string $subpage){

  $params = new Parameters;

  if(isset($params->get()[0])){
    if($params->get()[0] === $subpage){
      return 'active';
    }
  }

}

function ifSubSubpage(string $subSubpage){

  $params = new Parameters;

  if(isset($params->get()[1])){
    if($params->get()[1] === $subSubpage){
      return 'active';
    }
  }

}

function getAdminURI(){

  return SITE_URL . '/he-admin';

}

function getAdminUrl(){

  return SITE_URL . '/he-admin';

}

?>
