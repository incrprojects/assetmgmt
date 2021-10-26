<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
  header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  //If required
  header('Access-Control-Allow-Credentials: true');
  header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");

  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

  exit(0);
}
// Connect to database
include_once('../../config/db.php');
include_once('user.php');
$request_method = $_SERVER["REQUEST_METHOD"];
$data = json_decode(file_get_contents("php://input"));
$user = new User;
switch ($request_method) {
  case 'GET':
    if (isset($_GET["userid"])) {
      $userid = intval($_GET["userid"]);
      $user->getUserById($userid);
    } else {
      $user->getUser();
    }
    break;
  case 'POST':
    $user->saveUser($data);
    break;
  case 'PUT':
    $user->updateUser($data);
    break;
  case 'DELETE':
	if (isset($_GET["userid"])) {
      $userid = intval($_GET["userid"]);
	    $user->deleteUser($userid);
	}
    break;
  default:
    header("HTTP/1.0 405 Method Not Allowed");
    break;
}
