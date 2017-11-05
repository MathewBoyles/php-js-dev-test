<?php
  if(!file_exists(dirname(__FILE__) . '/config.php')) die('ERROR: Please configure MySQL info by renaming <strong>example.config.php</strong> to <strong>config.php</strong> and entering applicable info. Ensure to also install the database from <strong>users.sql</strong>.');
  require_once('config.php');

  $link = mysqli_connect(MYSQL_HOSTNAME, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
  if (!$link) die('ERROR: Unable to connect to MySQL database.');

  mysqli_set_charset($link, 'utf8');
?>
