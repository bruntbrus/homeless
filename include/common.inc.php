<?php
/**
 * Common include file.
 * @author Tomas
 */
namespace home;

require_once 'config.inc.php';

/**
 * Redirect to another page.
 * @param mixed $url
 */
function redirect($url) {
  if ($url === -1) {
    $url = $_SERVER['HTTP_REFERER'];
  }
  header("Location: $url");
}

/*
 * Register autoloader.
 */
spl_autoload_register(function($class) {
  $parts = explode('\\', $class, 2);
  if ($parts[0] == __NAMESPACE__) {
    $class = $parts[1];
    require_once CLASS_DIR.DS.str_replace('\\', DS, $class).CLASS_EXT;
    if (method_exists($class, CLASS_INIT)) {
      call_user_func(array($class, CLASS_INIT));
    }
  }
});

/*
 * Output buffering.
 */
ob_start(function($output) {
  return preg_replace('/^\s+/m', '', $output);
});

// Begin session.
session_start();
