<?php
  define('PAGE_ID', 'ajax.user-info');
  require_once('../core/require.php');

  header("Content-Type: text/json");

  $return_data = array(
    "status" => "error",
    "message" => "",
    "data" => array()
  );

  if(!isset($_GET['id'])) {
    $return_data["message"] = "Missing user ID";
  } else if(!is_numeric($_GET['id'])) {
    $return_data["message"] = "Invalid user ID";
  } else {
    if($user = $link->query("SELECT * FROM `users` WHERE `id` = '".$_GET['id']."' LIMIT 1")) {
      $return_data["data"] = $user->fetch_array(MYSQLI_ASSOC);
      $return_data["status"] = "success";
      $user->free();
    } else {
      $return_data["message"] = "User does not exist";
    }
  }

  die(json_encode($return_data, JSON_UNESCAPED_UNICODE));
?>
