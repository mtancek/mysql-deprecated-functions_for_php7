<?php
require('php7_mysql-connect.php');

// database settings
$host = 'localhost';
$user = 'dev_sajtko5';
$pass = 'dev_sajtko5';
$dbname = 'dev_sajtko5';

// mysql connect
$mysql = mysql_connect($host,$user,$pass) or die('Out of cheese error!');
$db = mysql_select_db($dbname,$mysql);  	

// mysql_query
$query = "SELECT * FROM stran";
$results = mysql_query($query);
$line = mysql_fetch_array($results, MYSQL_ASSOC);
debug($line);

// functions
function debug($data) {
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}
?>