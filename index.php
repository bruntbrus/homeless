<?php
/**
 * Index page.
 * @author Tomas
 */
namespace home;

// Include.
require_once 'include/common.inc.php';

// Get page from path info.
switch ($_SERVER['PATH_INFO']) {
  case '/':
  case '/index':
    if (!User::getActiveUser()) {
      redirect('login');
      exit;
    }
    $page = new page\IndexPage();
    break;
  case '/login': $page = new page\LoginPage(); break;
  default: throw new Exception('Page not found');
}

// Display page.
$page->display();
