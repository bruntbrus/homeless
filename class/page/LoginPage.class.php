<?php
namespace home\page;

/**
 * Login page class.
 * @author Tomas
 */
class LoginPage extends Page {

  public $message;

  /**
   * Init.
   */
  public static function init() {}

  /**
   * Constructor.
   */
  public function __construct() {
    parent::__construct('login', 'Login');
    $error = $_SESSION['error'];
    if (isset($error)) {
      $this->message = $error;
      unset($_SESSION['error']);
    } else {
      $this->message = '';
    }
    $this->styles[]  = 'style/login.css';
    $this->scripts[] = 'script/login.js';
  }
}
