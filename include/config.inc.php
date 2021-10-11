<?php
/**
 * Configuration.
 * @author Tomas
 */
namespace home;

// Global.
define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);

// Location.
const BASE_URL = '/home/';
define(__NAMESPACE__.'\ROOT_DIR', dirname(__DIR__));

// Class.
const CLASS_DIR  = 'class';
const CLASS_EXT  = '.class.php';
const CLASS_INIT = 'init';

// Database.
const DB_DSN      = 'mysql:host=localhost;dbname=home';
const DB_USERNAME = 'user';
const DB_PASSWORD = 'pass';

// Template.
const TEMPLATE_DIR = 'template';
const TEMPLATE_EXT = '.tpl.php';

// Directives.
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);
