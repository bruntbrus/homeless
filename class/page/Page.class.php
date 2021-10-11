<?php
namespace home\page;

/**
 * Page class.
 * @author Tomas
 */
class Page {

  public $name;
  public $title;
  public $template;
  public $styles;
  public $scripts;

  /**
   * Init.
   */
  public static function init() {}

  /**
   * Constructor.
   * @param string $name
   * @param string $title
   */
  public function __construct($name, $title) {
    $this->name     = $name;
    $this->title    = $title;
    $this->template = new Template('default');
    $this->styles = array(
      'style/style.css'
    );
    $this->scripts = array(
      'script/jquery-1.6.1.min.js',
      'script/common.js'
    );
  }

  /**
   * Build from template and display.
   * @param array $data
   */
  public function display(array $data = array()) {
    ob_start(function($output) {
      return preg_replace('/^\s+/m', '', $output);
    });
    $this->template->display($this, $data);
    ob_end_flush();
  }
}
