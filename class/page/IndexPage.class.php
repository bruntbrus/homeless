<?php
namespace home\page;
use PDO;

/**
 * Index page class.
 * @author Tomas
 */
class IndexPage extends Page {

  /**
   * Init.
   */
  public static function init() {}

  /**
   * Constructor.
   */
  public function  __construct() {
    parent::__construct('index', 'Index');
    $this->styles[]  = 'style/index.css';
    $this->scripts[] = 'script/browser.js';
    $this->scripts[] = 'script/index.js';
  }

  /**
   * Get links.
   * @return array
   */
  public function getLinks() {
    $user = \home\User::getActiveUser();
    $user = (int) $user->id;
    $pdo  = \home\Database::connect();
    $sql  = "SELECT * FROM `link` WHERE `user` = $user ORDER BY `title`";
    $pst  = $pdo->query($sql);
    return $pst->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
   * Read note.
   * @param int $id
   * @return string
   */
  public function readNote($id) {
    $user = \home\User::getActiveUser();
    return $user->readNote($id);
  }
}
