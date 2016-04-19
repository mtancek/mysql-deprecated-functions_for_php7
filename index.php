<?php
require('functions_mysql_php7.php');

// database settings
$hostname = 'localhost';
$username = 'dev_sajtko5';
$password = 'dev_sajtko5';
$dbname = 'dev_sajtko5';

// mysql connect
$mysql = mysql_connect($hostname, $username, $password) or die("Error while connecting on database.");
$db = mysql_select_db($dbname, $mysql);  	

// mysql_query
$query = "SELECT * FROM stran";
$results = mysql_query($query);

// mysql_fetch_array
$query = "SELECT * FROM stran";
$results = mysql_query($query);
$line = mysql_fetch_array($results, MYSQL_ASSOC);
debug($line);

// mysql_fetch_array while
$query = "SELECT * FROM stran";
$results = mysql_query($query);
while($line = mysql_fetch_array($results, MYSQL_ASSOC)) {
  debug($line);
}

// mysql_fetch_assoc
$query = "SELECT * FROM stran";
$results = mysql_query($query);
$line = mysql_fetch_assoc($results, MYSQL_ASSOC);
debug($line);

// mysql_fetch_assoc while
$query = "SELECT * FROM stran";
$results = mysql_query($query);
while($line = mysql_fetch_assoc($results, MYSQL_ASSOC)) {
  debug($line);
}

// mysql_fetch_row
$query = "SELECT * FROM stran";
$results = mysql_query($query);
$line = mysql_fetch_row($results, MYSQL_ASSOC);
debug($line);

// mysql_fetch_row while
$query = "SELECT * FROM stran";
$results = mysql_query($query);
while($line = mysql_fetch_row($results, MYSQL_ASSOC)) {
  debug($line);
}

// mysql_num_rows
$query = "SELECT * FROM stran";
$results = mysql_query($query);
$line = mysql_num_rows($results);
debug($line);

// mysql_insert_id
//mysql_query("INSERT INTO stran SET naslov = '".date("Y-m-d H:i:s")."', keywords = '', description = ''");
//$id = mysql_insert_id();

// mysql_query:update
mysql_query("UPDATE stran SET naslov = '".date("Y-m-d H:i:s")."' WHERE stranid = 1");

// functions
function debug($data) {
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}
?>