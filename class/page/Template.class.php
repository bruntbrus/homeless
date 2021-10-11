<?php
namespace home\page;

/**
 * Template class.
 * @author Tomas
 */
class Template {

  protected $name;
  protected $page;
  protected $data;
  protected $capture;

  /**
   * Init.
   */
  public static function init() {}

  /**
   * Constructor.
   * @param string $name
   */
  public function __construct($name) {
    $this->name    = $name;
    $this->capture = array();
  }

  /**
   * Insert.
   * @param string $name
   * @return Template
   */
  public function insert($name) {
    $template = new Template('include'.DS.$name);
    $template->display($this->page, $this->data);
    return $template;
  }

  /**
   * Capture.
   * @param string $key
   */
  public function capture($key) {
    $this->capture[] = $key;
    ob_start();
  }

  /**
   * End capture.
   */
  public function endCapture() {
    $key = array_pop($this->capture);
    if ($key !== null) {
      $this->data[$key] = ob_get_clean();
    }
  }

  /**
   * Build and display.
   * @param Page $page
   * @param array $data
   */
  public function display(Page $page, array $data = array()) {
    $this->page = $page;
    $this->data = $data;
    $template   = $this;
    $user       = \home\User::getActiveUser();
    $require = function($file) use($template, $page, $data, $user) {
      require $file;
    };
    $require(\home\TEMPLATE_DIR.DS.$this->name.\home\TEMPLATE_EXT);
  }
}
