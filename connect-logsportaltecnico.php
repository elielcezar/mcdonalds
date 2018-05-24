<?php

try {
    $hostname = "000.000.000.00";
    $port = 3061;
    $dbname = "db_name";
    $username = "user_name";
    $pw = "password";
    $pdo = new PDO ("mysql:host=$hostname;port=$port;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage();
    exit;
  }


?>
