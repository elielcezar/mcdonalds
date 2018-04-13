<?php

try {
    $hostname = "131.255.239.38";
    $port = 3061;
    $dbname = "logs_portaltecnico";
    $username = "usr_portaltec";
    $pw = "portal@mega2017";
    $dbh = new PDO ("mysql:host=$hostname;port=$port;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage();
    exit;
  }

  $stmt = $dbh->prepare('SELECT * FROM users');
  $stmt->execute();
  echo "<pre>";
  while ($row = $stmt->fetch()) {
    print_r($row);
  }
  echo "</pre>";


  unset($dbh); 
  unset($stmt);



?>