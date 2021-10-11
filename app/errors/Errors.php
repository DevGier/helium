<?php

/**
 * Errors
 */
class Errors {

  /**
   * Constructor, sets up error handling
   */
  public function __construct(){

    set_error_handler(array($this, 'handleError'));
    register_shutdown_function(array($this, 'handleFatal'));

  }

  /**
   * Handle all errors
   * @param $code
   * @param $msg
   * @param $file
   * @param $line
   */
  public function handleError($code, $msg, $file, $line){

    ob_end_clean();

    $render = new Render;

    $lines = $this->render($file, $line);

    $render->view('../app/errors/pages/500.error', [
      'code' => $code,
      'message' => $msg,
      'file' => $file,
      'line' => $line,
      'lines' => $lines
    ]);

    exit();

  }

  /**
   * Handle fatal errors
   */
  public function handleFatal(){

    $error = error_get_last();

    if (is_array($error)) {

      $errorCode = $error['type'] ?? 0;
      $errorMsg = $error['message'] ?? '';
      $file = $error['file'] ?? '';
      $line = $error['line'] ?? null;

      if ($errorCode > 0) {

        $lines = $this->render($file, $line);

        $this->handleError($errorCode, $errorMsg, $file, $line);

      }

    }

  }

  /**
   * Render the errrors
   * @param $file
   * @param $line
   * @return array
   */
  public function render($file, $line){

    $file = file($file, FILE_IGNORE_NEW_LINES);
    $return = [];

    for ($i=0; $i < count($file); $i++){

      if($i > 1){
        if($line == ($i - 1) || $line == $i || $line == ($i + 1)){

          $return[] = ($i) . ' | ' . htmlspecialchars($file[$i - 1]);

        }
      } else {
        if($line == ($i) || $line == ($i + 1) || $line == ($i + 2)){

          $return[] = ($i) . ' | ' . htmlspecialchars($file[$i]);

        }
      }



    }

    return $return;
  }

}

?>
