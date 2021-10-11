<?php
namespace home;
use PDO;

/**
 * User class.
 * @author Tomas
 */
class User {

  protected static $activeUser = null;

  public $id;
  public $name;
  public $password;
  public $email;

  /**
   * Init.
   */
  public static function init() {}

  /**
   * Get active user.
   * @return User
   */
  public static function getActiveUser() {
    if (!self::$activeUser) {
      self::$activeUser = $_SESSION['user'];
    }
    return self::$activeUser;
  }

  /**
   * Get user.
   * @param string $username
   */
  public static function getUser($username) {
    $pdo = Database::connect();
    $sql = "SELECT `id`,`password`,`email` FROM `account` WHERE `username` = ?";
    $pst = $pdo->prepare($sql);
    $pst->execute(array($username));
    $record = $pst->fetch(PDO::FETCH_ASSOC);
    if ($record) {
      return new User($record['id'], $username, $record['password'], $record['email']);
    }
    return null;
  }

  /**
   * Login.
   * @param User $user
   */
  public static function login(User $user) {
    self::$activeUser = $user;
    $_SESSION['user'] = $user;
  }

  /**
   * Logout.
   */
  public static function logout() {
    self::$activeUser = null;
    unset($_SESSION['user']);
  }

  /**
   * Construct.
   * @param int $id
   * @param string $name
   * @param string $password
   * @param string $email
   */
  public function __construct($id, $name, $password, $email = '') {
    $this->id       = $id;
    $this->name     = $name;
    $this->password = $password;
    $this->email    = $email;
  }

  /**
   * Read note.
   * @param int $id
   * @return string
   */
  public function readNote($id) {
    $id   = (int) $id;
    $user = (int) $this->id;
    $pdo  = Database::connect();
    $sql  = "SELECT `text` FROM `note` WHERE `id` = $id AND `user` = $user";
    $pst  = $pdo->query($sql);
    $note = $pst->fetchColumn();
    $pst->closeCursor();
    return $note;
  }

  /**
   * Save note.
   * @param int $id
   * @param string $note
   */
  public function saveNote($id, $note) {
    $id   = (int) $id;
    $user = (int) $this->id;
    $pdo  = Database::connect();
    $sql  = "UPDATE `note` SET `text` = ? WHERE `id` = $id AND `user` = $user";
    $pst  = $pdo->prepare($sql);
    $pst->execute(array($note));
  }
}
