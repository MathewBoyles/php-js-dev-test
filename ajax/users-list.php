<?php
  define('PAGE_ID', 'ajax.user-info');
  require_once('../core/require.php');

  header("Content-Type: text/json");

  $page = 1;
  if(isset($_GET['page'])) {
    if(is_numeric($_GET['page']) && $_GET['page'] > 0) $page = floor($_GET['page']);
  }

  $return_data = array(
    "status" => "error",
    "message" => "",
    "page_count" => 0,
    "page" => (int) $page,
    "data" => array()
  );

  $return_data["status"] = "success";
  $users = $link->query("SELECT `id`, `first_name`, `last_name`, `gender` FROM `users` LIMIT ".(($page - 1) * 25).", 25");
  while($user = $users->fetch_array(MYSQLI_ASSOC)) {
    array_push($return_data["data"], $user);
  }
  $users->free();

  $return_data["page_count"] = ceil($link->query("SELECT `id` FROM `users`")->num_rows / 25);

  die(json_encode($return_data));
?>
