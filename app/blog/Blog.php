<?php

class Blog {

  public function getAll(){

    Database::query('SELECT * FROM posts WHERE type = "blog"');

    $results = Database::fetchAll();

    return $results;

  }

  public function get(string $slug){

    Database::prepare('SELECT * FROM posts WHERE slug = :slug AND type = `blog`');
    Database::bind(':slug', $slug);
    Database::execute();

    $results = Database::fetchAll();

    return $results;

  }

}

?>
