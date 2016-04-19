<?php
// PHP 7 backwards compatibillity
if(!function_exists('mysql_connect')) {
  define("MYSQL_ASSOC", 1);
  
  function mysql_connect($server = false, $username = false, $password = false, $new_link = false, $client_flags = false) {
    if($server === false) $server = ini_get("mysql.default_host");
    if($username === false) $server = ini_get("mysql.default_user");
    if($password === false) $server = ini_get("mysql.default_password");
    if($new_link === false) $new_link = false;
    if($client_flags === false) $client_flags = 0;
    
    try {
      $db = new PDO("mysql:host=$server;dbname=;charset=utf8", $username, $password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      
      return $db;
    } catch(PDOException $err) {
      echo $err->getMessage();
      die();
    }
  }
}

if(!function_exists('mysql_select_db')) {
  function mysql_select_db($database_name = false, $link_identifier = null) {
    global $mysql;
    
    $mysql->exec("USE $database_name");
    
    return true;
  }
}

if(!function_exists('mysql_query')) {
  function mysql_query($query = false, $link_identifier = null) {
    global $mysql;

    try {
      $stmt = $mysql->query($query);
      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $err) {
      echo $err->getMessage();
      die();
    }

    return $data;
  }
}

if(!function_exists('mysql_fetch_array')) {
  function mysql_fetch_array($result = false, $result_type = false) {
    if(count($result) == 1) $result = reset($result);

    return $result;
  }
}