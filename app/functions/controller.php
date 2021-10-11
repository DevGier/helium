<?php

function controller(string $controller){
  return new $controller;
}

?>
