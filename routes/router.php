<?php

Router::get('',function(){
  renderView('views/home');
});

Router::get('home',function(){
  renderView('views/home');
});

?>
