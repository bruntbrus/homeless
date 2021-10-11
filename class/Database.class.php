<?php
namespace home;
use PDO;

/**
 * Database class.
 * @author Tomas
 */
final class Database {

  private static $pdo = null;

  /**
   * Init.
   */
  public static function init() {}

  /**
   * Connect.
   * @return PDO
   */
  public static function connect() {
    if (!self::$pdo) {
      self::$pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    }
    return self::$pdo;
  }

  /**
   * Construct.
   */
  private function __construct() {}
}
