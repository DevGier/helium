<?php

/**
 * Parameters
 */
class Parameters {

  /**
   * Get parameters after first slash in url
   * @return array
   */
  public function get(){

    $params = filter_input(INPUT_GET, 'params');
    $params = explode('/',$params);

    $return = [];

    foreach ($params as $value) {

      if(strpos($value, '=') > 0){

        $key = explode('=', $value)[0];
        $value = explode('=', $value)[1];

        $return[$key] = $value;

      } else {

        $return[] = $value;

      }

    }

    return $return;

  }

  /**
   * Get the post parameters filtered
   * @param  string $param
   * @param  string $filter
   * @return $post
   */
  public function post($param, $filter = ''){

    if(!empty($filter)){
      return filter_input(INPUT_POST, $param, $filter);
    }

    return filter_input(INPUT_POST, $param);

  }

}

?>
