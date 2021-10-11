<?php

function pwhash(string $input){

  $salt = SALT;
  $type = HASH;

  $unhashed = $salt . $input;

  return hash($type, $unhashed);

}

?>
