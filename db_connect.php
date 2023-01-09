<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "casio";
$link = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $link -> connect_error;
  exit();
}

?>