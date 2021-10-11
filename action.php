<?php
/**
 * Action handler.
 * @author Tomas
 */
namespace home;
use Exception;

require_once 'include/common.inc.php';

// Get action.
$action = $_GET['action'];
// Run action if it exists.
$function = __NAMESPACE__.'\action_'.$action;
if (!function_exists($function)) {
  throw new Exception("Unknown action: $action");
}
$url = $function();
// Optional redirect.
$redirect = $_POST['action_redirect'];
if (!isset($redirect) || $redirect == 'yes') {
  redirect($url);
}

/**
 * Validate action.
 */
function validate_action() {
  // Check if action is not allowed.
  $allowed = $_POST['action_allowed'];
  if (!isset($allowed) || $allowed != 'yes') {
    throw new Exception('Forbidden action');
  }
}

/**
 * Action: Login.
 * @return string URL.
 */
function action_login() {
  validate_action();
  $username = $_POST['username'];
  $password = $_POST['password'];
  if (!isset($username) || !isset($password) || $username == '' || $password == '') {
    $_SESSION['error'] = 'Missing required input';
    $url = 'login';
  } else {
    $user = User::getUser($username);
    if ($user && $user->password == $password) {
      User::login($user);
      $url = './';
    } else {
      $_SESSION['error'] = 'Invalid username or password';
      $url = 'login';
    }
  }
  return $url;
}

/**
 * Action: Logout.
 * @return string URL.
 */
function action_logout() {
  User::logout();
  return 'login';
}

/**
 * Action: Read note.
 * @return string URL.
 */
function action_read_note() {
  validate_action();
  $id = $_POST['note_id'];
  if (isset($id) && $id != '') {
    $user = User::getActiveUser();
    echo $user->readNote($id);
  } else {
    echo 'Invalid ID';
  }
  return -1;
}

/**
 * Action: Save note.
 * @return string URL.
 */
function action_save_note() {
  validate_action();
  $id = $_POST['note_id'];
  if (isset($id) && $id != '') {
    $note = $_POST['note_text'];
    if (isset($note)) {
      $user = User::getActiveUser();
      $user->saveNote($id, $note);
      echo 'Note saved';
    } else {
      echo 'Note undefined';
    }
  } else {
    echo 'Invalid ID';
  }
  return -1;
}
