<?php
try {
  $conn = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS, DBUTF8);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>