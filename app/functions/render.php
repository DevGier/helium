<?php

function render(){

  return new Render;

}

function renderView(string $view, array $data = []){

  $render = new Render;
  $render->view($view, $data);

}

function renderJSON(string $object){

  $render = new Render;
  $render->json($object);

}

function renderComponent(string $component, array $data = []){

  $render = new Render;
  $render->component($component, $data);

}

?>
