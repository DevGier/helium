<?php

function getThemeURI(){

  return SITE_URL . '/' . THEME_NAME;

}

function getThemeUrl(){

  return SITE_URL . '/' . THEME_NAME;

}

function stylesheet(){

  if(file_exists(__DIR__ . '/../../../public/main.js')){

    return SITE_URL . '/' . THEME_NAME . '/main.js';

  }

  if(file_exists(__DIR__ . '/../../../public/js/main.js')){

    return SITE_URL . '/' . THEME_NAME . '/js/main.js';

  }

}

function javascript(){

  if(file_exists(__DIR__ . '/../../../public/style.css')){

    return SITE_URL . '/' . THEME_NAME . '/style.css';

  }

  if(file_exists(__DIR__ . '/../../../public/css/style.css')){

    return SITE_URL . '/' . THEME_NAME . '/css/style.css';

  }

}

?>
