<?php

/**
 * Database class, using as static for stateful/global purposes
 */
class Database {

  /**
   * Database host
   * @var string $host
   */
  private static string $host = DB_HOST;

  /**
   * Database user
   * @var string $user
   */
  private static string $user = DB_USER;

  /**
   * Database password
   * @var string $pass
   */
  private static string $pass = DB_PASS;

  /**
   * Database name
   * @var string $name
   */
  private static string $name = DB_NAME;

  /**
   * Database connection
   * @var object $database
   */
  private static $database;

  /**
   * Database handler
   * @var $hanlder
   */
  private static $handler;

  /**
   * Setter
   */
  public static function set(){

    if(!isset(self::$database)){

      self::$database = new \PDO('mysql:host='.self::$host.';dbname='.self::$name, self::$user, self::$pass);

    }

  }

  /**
   * Prepare statement
   * @param  string $query
   */
  public static function prepare(string $query){

    self::set();

    self::$handler = self::$database->prepare($query);

  }

  /**
   * Preparebind statement
   * @param  string $query
   * @param  array  $params
   */
  public static function prepareBind(string $query, $params = []){

    self::set();

    self::$handler = self::$database->prepare($query);

    foreach ($params as $key => $value){
      self::$handler->bindParam($key, $value);
    }

  }

  /**
   * Query
   * @param  string $query
   * @return bool
   */
  public static function query(string $query){

    self::set();

    self::$handler = self::$database->prepare($query);

    return self::$handler->execute();

  }

  /**
   * Query with bind
   * Example Database::queryBind('SELECT * FROM users WHERE user=:user', ['user' => 'tim']);
   * @param  string $query
   * @param  array  $params
   * @return bool
   */
  public static function queryBind(string $query, $params = []){

    self::set();

    self::$handler = self::$database->prepare($query);

    foreach ($params as $key => $value){
      if(is_int($key)){
        self::$handler->bindParam($key+1, $value);
      } else {
        self::$handler->bindParam($key, $value);
      }
    }

    return self::$handler->execute();

  }

  public static function bind($key, $value){
    self::$handler->bindParam($key, $value);
  }

  /**
   * Execute prepared statement
   * @return bool
   */
  public static function execute(){

    return self::$handler->execute();

  }

  /**
   * Fetch row
   * @return object/array
   */
  public static function fetch(){

    return self::$handler->fetch();

  }

  /**
   * Fetch all rows
   * @return object/array
   */
  public static function fetchAll(){

    return self::$handler->fetchAll();

  }

  /**
   * Row count
   * @return int
   */
  public static function rowCount(){

    return self::$handler->rowCount();

  }


}

?>
