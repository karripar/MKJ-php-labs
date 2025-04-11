<?php
// dbConnect.php

require __DIR__ . '/../../dbconfig.php';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

try {
  $DBH = new PDO($dsn, $dbuser, $dbpass);
  $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch(PDOException $e) {
  echo "Could not connect to database.";
  file_put_contents(__DIR__.'/../logs/PDOErrors.txt', 'dbConnect.php - ' . $e->getMessage(), FILE_APPEND);
}
?>